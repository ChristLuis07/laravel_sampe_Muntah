@extends('dashboard.layouts.app')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf

      <!-- Input Title -->
      <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
          autofocus value="{{ old('name', $category->name) }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <!-- Input Slug -->
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
          value="{{ old('slug', $category->slug) }}">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      {{-- Image --}}
      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <input type="hidden" name="oldImage" value="{{ $category->image }}">
        @if ($category->image)
          <img src="{{ asset('storage/' . $category->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
        @else
          <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif

        <input onchange="previewImage()" class="form-control @error('image') is-invalid @enderror" type="file"
          id="image" name="image">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Update Post</button>
    </form>


    <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug);
      });

      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      });

      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      });

      function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
  @endsection
