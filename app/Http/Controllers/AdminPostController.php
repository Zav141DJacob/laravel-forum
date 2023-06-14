<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(10),
        ]);
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }


    public function create()
    {
        return view('admin.posts.create');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', "Post deleted successfully!");
    }

    public function store()
    {
        $post = new Post();
        $attributes = $this->validatePost($post);
        $path = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/');
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost();
        if (isset($attributes['thumbnail'])) {

            $path = request()->file('thumbnail')->store('thumbnails');
            $attributes['thumbnail'] = $path;
        }
//        $attributes['user_id'] = auth()->id();

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }
    //

    /**
     * @param Post $post
     * @return array
     */
    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['image', 'required'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
    }
}
