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
  <a href="{{route('category.index')}}" class="d-block mb-3">&larr; Kembali</a>
  <form method="POST" action="{{route('category.store')}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    </div>
    <div class="mb-3">
      <label for="text" class="form-label">Keterangan</label>
      <input type="text" class="form-control" id="text" name="text" value="{{old('text')}}">
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
  </form>
</div>
@endsection