<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if($request->hasFile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('post-images', $name, 'public');
        }

        $post = Post::create([
            'title' => $request->get('title'),
            'short_content' => $request->get('short_content'),
            'content' => $request->get('content'),
            'image' => $path ?? null,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if($request->hasFile('image')){

            if(isset($post->image)){
                Storage::disk('public')->delete($post->image);
            }

            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('post-images', $name, 'public');
        }

        $post->update([
            'title' => $request->get('title'),
            'short_content' => $request->get('short_content'),
            'content' => $request->get('content'),
            'image' => $path ?? $post->image,
        ]);
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
