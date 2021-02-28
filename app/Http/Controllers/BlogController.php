<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index',
            ['blogs' => $blogs]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'author' => 'required|string',
            'genre' => 'required|string'
        ]);

        $blog = new Blog();
        $blog->name = $request->get('title');
        $blog->author = $request->get('author');
        $blog->genre = $request->get('genre');
        $blog->save();

        return (redirect(route('blogs.list')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blog)
    {
//        dd($request->get('id'));
//        dd($request->get('name'));
//        dd($request->get('author'));
//        $id = $request->get('id');
//        $name = $request->get('name');
//        $blog = compact('id', 'name');
//        $blog_send['blog'] = $blog;
//        dd($blog_send);

        $blog_send = new Blog();
        $blog_send->id = $request->get('id');
        $blog_send->name = $request->get('name');
        $blog_send->author = $request->get('author');
        $blog_send->genre = $request->get('genre');
//        dd($blog_send);
        return view('blog.edit', ['blog' => $blog_send]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'author' => 'required|string',
            'genre' => 'required|string'
        ]);

//        dd($request->get('title'));
//        dd($request->get('id'));

//        $blog_new = new Blog();
//        $blog_new->name = $request->get('title');
//        dd($blog_new);
        //        $blog->save();

        $blog = Blog::find($request->get('id'));
        $blog->name = $request->get('title');
        $blog->author = $request->get('author');
        $blog->genre = $request->get('genre');
        $blog->save();
//        $this->validate($request, [
//            'title' => 'required|string'
//        ]);
//
//        $blog_new = new Blog();
//        $blog_new->name = $request->get('title');
//        $blog
//
        return (redirect(route('blogs.list')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return void
     */
    public function destroy(Request $request, Blog $blog)
    {
        $blog = Blog::find($request->get('id'));
        $blog->delete();

        return redirect(route('blogs.list'));
    }
}
