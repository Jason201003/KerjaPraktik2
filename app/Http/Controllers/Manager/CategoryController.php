<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('manager.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        try {
            // Create a new category
            $new_category = new Category;
            $new_category->name = $request->name;
            $new_category->slug = Str::slug($request->name);
            $new_category->save();

            return redirect()->route('manager.categories.index')->with('success', 'Category Added Successfully');
        } catch (\Exception $e) {
            return redirect()->route('manager.categories.index')->with('fail', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('manager.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());
        return redirect()->route('manager.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('manager.categories.index')->with('success', 'Category deleted successfully.');
    }
}
