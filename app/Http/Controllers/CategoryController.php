<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = ['title' => $request->input('title')];
        Category::create($category);
        
        return redirect()->route('category.index')->with('success', "Created new category");
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }
    
    public function update(CategoryRequest $request, int $id)
    {
        $category_data = ['title' => $request->input('title')];

        $category = Category::findOrFail($id);
        $category->update($category_data);
        
        return redirect()->route('category.index')->with('success', "Updated category $category->title");
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Deleted category');
    }
}
