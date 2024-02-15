<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::select('id')->get();
        return view('posts.create',['users'=>$users]); 
       }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
            'published_at' => 'required|date_format:Y-m-d',
            'user_id' => 'required | exists:users,id'
        ]);
        Post::create(
            ['title' => $request->title, 'slug' => $request->slug, 'body' => $request->body, 'user_id' => $request->user_id, 'published_at' => $request->published_at]
        );
        return redirect(url('/posts'));
    }
        
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findorfail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findorfail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::findorfail($id);
        $post->update(
            ['title' => $request->title, 'body' => $request->body]
        );
        return redirect(url('/posts/'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect(url('/posts'));
    }
}
