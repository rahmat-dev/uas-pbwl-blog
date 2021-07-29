<?php
$no = 1;
?>

@extends('layouts.index')

@section('content')
<div class="my-5">
  <a class="btn btn-sm btn-primary float-right mb-2" href="{{route('category.create')}}">Tambah</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($categories as $category)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->text}}</td>
        <td class="d-flex">
          <a href="{{route('category.edit', $category)}}" class="btn btn-sm btn-warning mr-1">Edit</a>
          <form action="{{route('category.destroy', $category)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"
              onclick="return confirm('Yakin ingin menghapus kategori {{$category->name}}?');">Hapus</button>
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