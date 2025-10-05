<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PostController
{
    public function index()
    {
        $posts = Post::with('category', 'author')->orderBy('created_at', 'desc')->paginate(10);

        return view('panel.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = PostCategory::all();
        return view('panel.post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug|max:255',
            'post_category_id' => 'required|exists:post_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = $request->file('image')->store('posts', 'public');

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'post_category_id' => $validated['post_category_id'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'image' => $imagePath,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('post.list')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('panel.post', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug,' . $post->id . '|max:255',
            'post_category_id' => 'required|exists:post_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete($post->image);
            // Store new image
            $imagePath = $request->file('image')->store('public/posts');
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'post_category_id' => $validated['post_category_id'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'image' => $imagePath,
        ]);

        return redirect()->route('post.list')->with('success', 'مقاله با موفقیت به‌روزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('post.list')->with('success', 'مقاله با موفقیت حذف شد.');
    }
    public function toggle(Post $post)
    {
        if($post->status === 'published')
        {
            $post->status = 'draft';
            $post->published_at = null;
        }
        else
        {
            $post->status = 'published';
            $post->published_at = now();
        }
        $post->save();

        // بازگرداندن به صفحه قبلی با یک پیام موفقیت
        return Redirect::back()->with('success', 'وضعیت مقاله با موفقیت تغییر کرد.');
    }
}
