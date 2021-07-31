<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $photos = Photo::all();
    return view('photo.index', compact('photos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $posts = Post::all();
    return view('photo.create', compact('posts'));
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
      'photo' => 'required|mimes:jpg,png,jpeg',
      'post_id' => 'required',
      'text' => 'required'
    ], [
      'photo.required' => 'Foto harus diisi',
      'photo.mimes' => 'Format harus .jpg, .jpeg atau .png',
      'post_id.required' => 'Pilih salah satu post',
      'text.required' => 'Keterangan harus diisi',
    ]);

    $path = $request->file('photo')->store('photos');
    $filename = explode('/', $path)[1];

    $photo = new Photo;
    $photo->post_id = $validatedData['post_id'];
    $photo->title = $filename;
    $photo->text = $validatedData['text'];
    $photo->save();

    return redirect()->route('photo.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Photo  $photo
   * @return \Illuminate\Http\Response
   */
  public function show(Photo $photo)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Photo  $photo
   * @return \Illuminate\Http\Response
   */
  public function edit(Photo $photo)
  {
    $posts = Post::all();
    return view('photo.edit', compact(['posts', 'photo']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Photo  $photo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Photo $photo)
  {
    $validatedData = $request->validate([
      'photo' => 'mimes:jpg,png,jpeg',
      'post_id' => 'required',
      'text' => 'required'
    ], [
      'photo.mimes' => 'Format harus .jpg, .jpeg atau .png',
      'post_id.required' => 'Pilih salah satu post',
      'text.required' => 'Keterangan harus diisi',
    ]);

    $path = $request->file('photo')->store('photos');
    $filename = explode('/', $path)[1];

    $photo->post_id = $validatedData['post_id'];
    $photo->title = $filename;
    $photo->text = $validatedData['text'];
    $photo->save();

    return redirect()->route('photo.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Photo  $photo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Photo $photo)
  {
    $photo->delete();
    return redirect()->route('photo.index');
  }
}
