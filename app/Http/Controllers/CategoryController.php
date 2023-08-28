<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());
        
        return redirect()->route('category.index')->with('success', "Created new category");
    }

    public function show(string $category_title)
    {
        $category = Category::where('title', $category_title)->firstOrFail();

        return view('category.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }
    
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        
        return redirect()->route('category.index')->with('success', "Updated category $category->title");
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // delete category_lot record
        $category->lots()->detach();
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Deleted category');
    }
}
