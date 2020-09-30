<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Http\Requests\Post\StorePost;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with(["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StorePost $request)
    {
        if (!$request->authorize()) {
            return redirect(route('posts.create'))->withErrors('Not Authorized');
        }
        $validated = $request->validated();

        $slug = Str::slug(date('Ymd') . '-' . substr($request->title, 0, 22), '-');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'slug' => $slug,
            'published' => $request->published ? true : false
        ]);

        return redirect(route('posts.show', $post->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id == Auth::id() || Auth::user()->role == "admin") {
            $slug = Str::slug(date('Ymd') . '-' . substr($request->title, 0, 22), '-');

            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id = Auth::id();
            $post->slug = $slug;
            $post->published = $request->published ? true : false;
            $post->save();

            return redirect(route('posts.show', $post->slug));
        } else {
            // Could Flash Error like this
            // $request->session()->flash('error', 'Storing Failed');
            // But who does this
            return redirect(route('posts.show', $post->slug));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::id() || Auth::user()->role == "admin") {
            $post->delete();
            return redirect(route('posts.index'));
        } else {
            return redirect(route('posts.show', $post->slug));
        }
    }
}
