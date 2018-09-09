<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	if (request('query')) {
    		$categories = Category::where('name', 'like', '%'.request('query').'%')
    		->paginate(10)->appends(request()->except('page'));
    	} else {
    		$categories = Category::orderBy('created_at', 'desc')->paginate(10);
    	}

    	return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|unique:categories,name'
    	]);

    	Category::create([
    		'name' => $request->name,
    		'slug' => str_slug($request->name)
    	]);

    	return back()->with('status', 'Kategori baru berhasil dibuat.');
    }

    public function destroy(Category $category)
    {
    	$category->delete();
    	return back()->with('status', 'Kategori berhasil dihapus');
    }
}
