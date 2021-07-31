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
  <a href="{{route('photo.index')}}" class="d-block mb-3">&larr; Kembali</a>
  <form method="post" action="{{route('photo.update', $photo)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="post_id" class="form-label">Postingan</label>
      <select class="form-control" id="post_id" name="post_id">
        <option selected value="" disabled>- Pilih Postingan -</option>
        @foreach ($posts as $post)
        <option {{$photo->post_id == $post->id ? 'selected' : null}} value="{{$post->id}}">
          {{$post->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="post_photo" class="form-label">Gambar Postingan</label>
      <div class="custom-file">
        <input accept=".jpg,.jpeg,.png" type="file" class="custom-file-input" id="post_photo" name="photo">
        <label class="custom-file-label" for="post_photo" data-browse="Telusuri">Pilih gambar</label>
      </div>
      <img class="mt-2" src="/photos/{{$photo->title}}" id="photo_preview" style="width: 120px; max-width: 100%" />
    </div>
    <div class="mb-3">
      <label for="text" class="form-label">Keterangan</label>
      <textarea type="text" class="form-control" id="text" name="text">{{$photo->text}}</textarea>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
  </form>
</div>
@endsection

@section('scripts')
<script>
  const photoInput = document.querySelector('#post_photo');
  const photoPreviewImg = document.querySelector('#photo_preview');
  photoInput.onchange = (e) => {
    const [file] = photoInput.files;
    if (file) {
      photoPreviewImg.src = URL.createObjectURL(file);
      photoPreviewImg.onload = function() {
        URL.revokeObjectURL(output.src);
      }
    }
  };
</script>
@endsection