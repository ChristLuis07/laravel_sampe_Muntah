@extends('layouts.app')

@section('title')

@section('content')
  <h1 class="mb-5 text-center">Post Categories</h1>

  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-4 mb-5">
          <a href="/posts?category={{ $category->slug }}">
            <div class="card bg-dark text-white">
              @if ($category->image)
                <div style="max-width: 100%; max-height: 350px; overflow: hidden">
                  <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid"
                    style="width: 100%; height: auto; object-fit: cover;">
                </div>
              @else
                <img src="{{ \App\Helpers\PexelsHelper::getGambarUrl($category->name) }}" class="w-auto h-25 img-fluid"
                  alt="{{ $category->name }}">
              @endif
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">
                  {{ $category->name }}</h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>


@endsection
