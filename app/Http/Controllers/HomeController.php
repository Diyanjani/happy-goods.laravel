<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the application homepage.
     */
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('stock_quantity', '>', 0)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        $categories = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->limit(6)
            ->get();

        return view('home', compact('featuredProducts', 'categories'));
    }

    /**
     * Display the shop page with all products.
     */
    public function shop(Request $request)
    {
        $query = Product::with('category');

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Search by name or description
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Filter by price range
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sort products
        $sortBy = $request->get('sort', 'name');
        $sortOrder = $request->get('order', 'asc');

        switch ($sortBy) {
            case 'price':
                $query->orderBy('price', $sortOrder);
                break;
            case 'name':
                $query->orderBy('name', $sortOrder);
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'stock':
                $query->orderBy('stock_quantity', $sortOrder);
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('shop', compact('products', 'categories'));
    }

    /**
     * Display about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display contact page.
     */
    public function contact()
    {
        return view('contact');
    }
}
