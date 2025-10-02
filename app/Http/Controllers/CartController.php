<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the user's cart
     */
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();
            
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    /**
     * Add item to cart
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock_quantity
        ]);

        $existingCartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            $newQuantity = $existingCartItem->quantity + $request->quantity;
            
            if ($newQuantity > $product->stock_quantity) {
                return response()->json([
                    'error' => 'Not enough stock available'
                ], 400);
            }
            
            $existingCartItem->update(['quantity' => $newQuantity]);
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'added_at' => now()
            ]);
        }

        return response()->json([
            'success' => 'Product added to cart successfully!',
            'cart_count' => CartItem::where('user_id', Auth::id())->sum('quantity')
        ]);
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $this->authorize('update', $cartItem);
        
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cartItem->product->stock_quantity
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        $total = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get()
            ->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });

        return response()->json([
            'success' => 'Cart updated successfully!',
            'total' => $total
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem);
        
        $cartItem->delete();

        return response()->json([
            'success' => 'Item removed from cart!',
            'cart_count' => CartItem::where('user_id', Auth::id())->sum('quantity')
        ]);
    }

    /**
     * Clear entire cart
     */
    public function clear()
    {
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }

    /**
     * Get cart count for navbar
     */
    public function count()
    {
        $count = CartItem::where('user_id', Auth::id())->sum('quantity');
        return response()->json(['count' => $count]);
    }
}
