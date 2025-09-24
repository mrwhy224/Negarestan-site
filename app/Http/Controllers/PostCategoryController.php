<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get all categories for the table
        $categories = PostCategory::all();

        // Check if an existing category is being edited
        $category = null;
        if ($request->has('category')) {
            $category = PostCategory::findOrFail($request->category);
        }

        return view('panel.postCategories', compact('categories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:post_categories,name',
            'slug' => 'required|string|max:255|unique:post_categories,slug',
        ]);
        PostCategory::create($validated);
        Session::flash('success', 'دسته بندی جدید با موفقیت ذخیره شد.');
        return redirect()->route('post.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCategory $category)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('post_categories')->ignore($category->id),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('post_categories')->ignore($category->id),
            ],
        ]);

        $category->update($validated);

        Session::flash('success', 'دسته بندی با موفقیت به روزرسانی شد.');

        return redirect()->route('post.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $category)
    {
        $category->delete();
        Session::flash('success', 'دسته بندی با موفقیت حذف شد.');
        return redirect()->route('post.category');
    }
}
