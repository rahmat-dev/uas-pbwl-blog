<?php
$selectedCatId = old('cat_id') ?? $post->cat_id;
?>

@extends('layouts.index')

@section('content')
<div class="my-5">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <a href="{{route('post.index')}}" class="d-block mb-3">&larr; Kembali</a>
  <form method="POST" action="{{route('post.update', $post)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="cat_id" class="form-label">Kategori</label>
      <select class="form-control" id="cat_id" name="cat_id">
        <option selected value="" disabled>- Pilih Kategori -</option>
        @foreach ($categories as $category)
        <option {{$selectedCatId == $category->id ? 'selected' : null}} value="{{$category->id}}">
          {{$category->text}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Judul Post</label>
      <input type="text" class="form-control" id="title" name="title" value="{{old('title') ?? $post->title}}">
    </div>
    <div class="mb-3">
      <label for="text" class="form-label">Isi Post</label>
      <textarea type="text" class="form-control" id="text" name="text">{{$post->text}}</textarea>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Update</button>
    <a href="{{route('post.index')}}" class="btn btn-sm btn-secondary">Batal</a>
  </form>
</div>
@endsection