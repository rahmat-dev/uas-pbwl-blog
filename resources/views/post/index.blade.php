<?php
$no = 1;
?>

@extends('layouts.index')

@section('content')
<div class="my-5">
  <a class="btn btn-sm btn-primary float-right mb-2" href="{{route('post.create')}}">Tambah</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Judul Post</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($posts as $post)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$post->category->text}}</td>
        <td>{{$post->title}}</td>
        <td class="d-flex">
          <a href="{{route('post.edit', $post)}}" class="btn btn-sm btn-warning mr-1">Edit</a>
          <form action="{{route('post.destroy', $post)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"
              onclick="return confirm('Yakin ingin menghapus post {{$post->title}}?');">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="text-center">Data kosong.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection