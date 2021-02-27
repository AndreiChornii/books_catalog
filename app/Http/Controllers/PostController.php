<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog)
    {
        $posts = $blog->posts()->get();
        $data = compact('blog','posts');
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog)
    {
        return view('posts.create',
        ['blog' => $blog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Blog $blog
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Blog $blog)
    {
       $this->validate($request, [
           'title' => 'required|string',
           'content' => 'required|string'
       ]);

//       /** @var Post $post */
//       $post = Post::create([
//            'title' => $request->get('title'),
//            'content' => $request->get('content')
//            ]
//       );

        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = Auth::user()->id;
        $post->blog_id = $blog->id;
        $post->save();

       $post->blog()->associate($blog);
       $post->user()->associate(Auth::user());

       return redirect(route('blog_posts.list', ['blog' => $blog->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
//        dd($request);
        $post_send = new Post();
        $post_send->id = $request->get('id');
        $post_send->title = $request->get('title');
        $post_send->content = $request->get('content');

        return view('posts.edit', ['post' => $post_send]);
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
//        dd($request);
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $post = Post::find($request->get('id'));
//        dd($post);
//        dd($post->blog_id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
//        $post->blog_id = $request->get('blog_id');
        $post->save();

        return redirect(route('blog_posts.list', ['blog' => $post->blog_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return void
     */
    public function destroy(Request $request, Post $post)
    {
        $post = Post::find($request->get('id'));
        $post->delete();

        return redirect(route('blog_posts.list', ['blog' => $post->blog_id]));
    }
}
