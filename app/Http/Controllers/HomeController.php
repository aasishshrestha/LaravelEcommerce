<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::take(6)->latest()->get();

        $popularProducts = Product::withCount('order')
            ->orderByDesc('order_count')
            ->take(2)
            ->get();



            // return $popularProducts;
        return view('user.pages.home', compact('products', 'categories', 'popularProducts'));
    }
    public function contact()
    {
        return view('user.pages.contact');
    }
    public function shop()
    {
        $products = Product::with('category')->paginate(6);
        return view('user.pages.shop', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request['search'] ?? "";
        // return $search;

        if ($search != "") {
            $products = Product::where('title', 'LIKE', "%$search%")->paginate(6);
        } else {
            $products = Product::with('category')->paginate(6);
        }
        return view('user.pages.shop', compact('products', 'search'));
    }

    public function show($id)
    {
        $product = Product::with('category')->where('id', $id)->first();
        // dd($product);die;
        return view('user.pages.product', compact('product'));
    }
    public function cart()
    {
        return view('user.pages.cart');
    }
    public function checkout($pid)
    {
        $product = Product::with('category')->where('id', $pid)->first();
        return view('user.pages.checkout', compact('product'));
    }
}
