@extends('dashboard.layouts.app')

@section('content')
  <div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
        <a href="/dashboard/categories" class="btn btn-success"><i data-feather="arrow-left"></i>Back to all Category</a>
        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning"><i
            data-feather="edit"></i>Edit</a>
        <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus')"><i
              data-feather="x-circle"></i>Delete</button>
        </form>
        <h1 class="mb-3">{{ $category->name }}</h1>

        @if ($category->image)
          <div style="max-height: 430px; overflow hidden">
            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid mt-3">
          </div>
        @else
          <img src="{{ \App\Helpers\PexelsHelper::getGambarUrl($category->name) }}" alt="{{ $category->name }}"
            class="img-fluid mt-3">
        @endif

      </div>
    </div>
  </div>
@endsection
