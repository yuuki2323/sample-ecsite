<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $books = $category->books()->where('status', 'in_stock')->get();

        return view('categories.show', compact('category', 'books'));
    }
}
