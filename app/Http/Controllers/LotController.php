<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\LotRequest;
use App\Services\GetLotsService;

class LotController extends Controller
{
    public function index(Request $request, GetLotsService $getLotsService)
    {
        $lots = $getLotsService->getLots($request);

        $categories = Category::withCount('lots')->get();
        $lots_without_cat_count = Lot::doesntHave('categories')->count();

        return view('lot.index', compact('lots', 'categories', 'lots_without_cat_count'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('lot.create', compact('categories'));
    }


    public function store(LotRequest $request)
    {
        $lot = Lot::create($request->safe()->only(['name', 'description']));
        $lot->categories()->attach($request->input('categories'));

        return redirect()->route('lot.index')->with('success', "Lot $lot->name created successful");
    }


    public function show(string $id)
    {
        $lot = Lot::find($id);
        $categories = $lot->categories;

        return view('lot.show', compact('lot', 'categories'));
    }


    public function edit(string $id)
    {
        $lot = Lot::findOrFail($id);
        $categories_select = $lot->categories;
        $categories = Category::all();

        return view('lot.edit', compact('lot', 'categories_select', 'categories'));
    }


    public function update(LotRequest $request, string $id)
    {
        $lot = Lot::findOrFail($id);
        $lot->update($request->safe()->only(['name', 'description']));
        $lot->categories()->sync($request->categories);

        return redirect()->route('lot.index')->with('success', "Lot $lot->name updated successful");
    }


    public function destroy(string $id)
    {
        $lot = Lot::findOrFail($id);

        // delete category_lot record
        $lot->categories()->detach();
        $lot->delete();

        return redirect()->route('lot.index')->with('success', 'Lot deleted successful');
    }
}