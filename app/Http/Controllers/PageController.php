<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('page.index', compact('products'));
    }

    public function shop()
    {
    	$categories = Category::all();
    	$products = Product::orderBy('created_at', 'desc')->paginate(12);
    	return view('page.shop', compact('products', 'categories'));
    }

    public function category(Category $category)
    {
    	$products = $category->products()->orderBy('created_at', 'desc')->paginate(12);
    	$categories = Category::all();
    	return view('page.category', compact('products', 'categories', 'category'));
    }

    public function detailProduct(Product $product)
    {
    	return view('page.detail-product', compact('product'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
 
}
