<?php
$no = 1;
?>

@extends('layouts.index')

@section('content')
<div class="my-5">
  <a class="btn btn-sm btn-primary float-right mb-2" href="{{route('photo.create')}}">Tambah</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Postingan</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($photos as $photo)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$photo->post->title}}</td>
        <td>
          <img src="/photos/{{$photo->title}}" style="width: 120px; max-width: 100%;" />
        </td>
        <td class="d-flex">
          <a href="{{route('photo.edit', $photo)}}" class="btn btn-sm btn-warning mr-1">Edit</a>
          <form action="{{route('photo.destroy', $photo)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"
              onclick="return confirm('Yakin ingin menghapus foto pada postingan\n{{$photo->post->title}}?');">Hapus</button>
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