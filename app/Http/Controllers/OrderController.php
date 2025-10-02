<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderDetail;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the user's orders.
     */
    public function index()
    {
        $orders = Order::with(['orderItems.product', 'orderDetail'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the checkout form.
     */
    public function create()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('orders.create', compact('cartItems', 'total'));
    }

    /**
     * Store a newly created order.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500'
        ]);

        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Calculate total
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        DB::transaction(function () use ($request, $cartItems, $total) {
            // Create order
            $order = Order::create([
                'full_name' => $request->full_name,
                'user_id' => Auth::id(),
                'status' => 'pending',
                'total_amount' => $total
            ]);

            // Create order details
            OrderDetail::create([
                'order_id' => $order->id,
                'name' => $request->full_name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone
            ]);

            // Create order items and update stock
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price_at_order' => $cartItem->product->price
                ]);

                // Update product stock
                $cartItem->product->decrement('stock_quantity', $cartItem->quantity);
            }

            // Clear cart
            CartItem::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);
        
        $order->load(['orderItems.product', 'orderDetail']);
        return view('orders.show', compact('order'));
    }

    /**
     * Cancel an order (only if status is pending).
     */
    public function cancel(Order $order)
    {
        $this->authorize('update', $order);

        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Cannot cancel this order!');
        }

        DB::transaction(function () use ($order) {
            // Restore product stock
            foreach ($order->orderItems as $orderItem) {
                $orderItem->product->increment('stock_quantity', $orderItem->quantity);
            }

            // Update order status
            $order->update(['status' => 'cancelled']);
        });

        return redirect()->back()->with('success', 'Order cancelled successfully!');
    }

    /**
     * Update order status (admin only).
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
