<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::all();
    return view('post.index', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('post.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'cat_id' => 'required',
      'title' => 'required',
      'text' => 'required',
    ], [
      'cat_id.required' => 'Silahkan pilih kategori',
      'title.required' => 'Judul post harus diisi',
      'text.required' => 'Isi post harus diisi',
    ]);

    $slug = Str::slug(Str::substr($validatedData['title'], 0, 25), '-');
    Post::create(array_merge($validatedData, array('slug' => $slug)));
    return redirect()->route('post.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    $categories = Category::all();
    return view('post.edit', compact('categories', 'post'));
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
    $validatedData = $request->validate([
      'cat_id' => 'required',
      'title' => 'required',
      'text' => 'required',
    ], [
      'cat_id.required' => 'Silahkan pilih kategori',
      'title.required' => 'Judul post harus diisi',
      'text.required' => 'Isi post harus diisi',
    ]);

    $slug = Str::slug(Str::substr($validatedData['title'], 0, 25), '-');
    $post->update(array_merge($validatedData, array('slug' => $slug)));
    return redirect()->route('post.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route('post.index');
  }
}
