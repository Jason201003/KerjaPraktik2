<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Method to load all categories
    public function loadAllCategories() 
    {
        $all_categories = Category::all();
        return view('admin.manage-categories.index', compact('all_categories'));
    }

    // Method to load the form for adding a new category
    public function loadAddCategoryForm()
    {
        return view('admin.manage-categories.add-category');
    }

    // Method to add a new category
    public function AddCategory(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|unique:categories|max:255',
        ]);

        try {
            // Create a new category
            $new_category = new Category;
            $new_category->name = $request->name;
            $new_category->slug = Str::slug($request->name);
            $new_category->save();

            return redirect('admin/manage-categories')->with('success', 'Category Added Successfully');
        } catch (\Exception $e) {
            return redirect('admin/manage-categories')->with('fail', $e->getMessage());
        }
    }

    // Method to load the form for editing a category
    public function loadEditForm($id)
    {
        $category = Category::find($id);
        return view('admin.manage-categories.edit-category', compact('category'));
    }

    // Method to edit category data
    public function EditCategory(Request $request)
    {
        // Validate user input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'nullable|string|unique:categories,name,' . $request->category_id . '|max:255',
        ]);

        try {
            // Update the category based on the ID
            Category::where('id', $request->category_id)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return redirect('/admin/manage-categories')->with('success', 'Category Updated Successfully');
        } catch (\Exception $e) {
            return redirect('admin/manage-categories' . $request->category_id)->with('fail', $e->getMessage());
        }
    }

    // Method to delete a category
    public function DeleteCategory($id)
    {
        try {
            Category::where('id', $id)->delete();
            return redirect('admin/manage-categories')->with('success', 'Category Deleted Successfully');
        } catch (\Exception $e) {
            return redirect('admin/manage-categories')->with('fail', $e->getMessage());
        }
    }

    // Method to search categories
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search categories by name or slug
        $all_categories = Category::where('name', 'like', "%$query%")
            ->orWhere('slug', 'like', "%$query%")
            ->get();

        // Return view with search results
        return view('admin.manage-categories.index', compact('all_categories'));
    }
}
