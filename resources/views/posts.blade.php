@extends('layouts.app')

@section('title')

@section('content')
  <h1 class="fs-3 text-decoration-none text-center">{{ $title }}</h1>

  {{-- search --}}
  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form id="search-form">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" name="query" id="search-input" placeholder="Search..." class="form-control"
            value="{{ request('query') }}">
          <button type="submit" class="btn btn-danger">Search</button>
        </div>
      </form>
    </div>
  </div>

  <div id="search-results">
    @if ($posts->count())
      <div class="card mb-3">
        @if ($posts[0]->image)
          <div style="max-width: 100%; max-height: 350px; overflow: hidden">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid"
              style="width: 100%; height: auto; object-fit: cover;">
          </div>
        @else
          <img src="{{ \App\Helpers\PexelsHelper::getGambarUrl($posts[0]->category->name) }} "
            class="w-auto h-25 img-fluid" alt="{{ $posts[0]->category->name }}">
        @endif
        <div class="card-body text-center">
          <h3 class="card-title">{{ $posts[0]->title }}</h3>
          <small class="text-muted">
            <h3>By. <a href="/posts?author={{ $posts[0]->author->username }}"
                class="text-decoration-none">{{ $posts[0]->author->name }}</a>
              in
              <a href="/posts?category={{ $posts[0]->category->slug }}"
                class="text-decoration-none fs-5">{{ $posts[0]->category->name }}</a>
            </h3>
            {{ $posts[0]->created_at->diffForHumans() }}
          </small>
          <p class="card-text">{{ Str::limit(strip_tags(html_entity_decode($posts[0]->excerpt))) }}</p>
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        {{ $posts->links() }}
      </div>

      <div class="container">
        <div class="row">
          @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
              <div class="card h-100 d-flex flex-column">
                <div class="position-absolute bg-dark px-3 py-2 text-white">
                  <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">
                    {{ $post->category->name }}
                  </a>
                </div>
                @if ($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                    class="img-fluid mt-3">
                @else
                  <img src="{{ \App\Helpers\PexelsHelper::getGambarUrl($post->category->name) }}" class="card-img-top"
                    alt="{{ $post->category->name }}">
                @endif

                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <h3>By. <a href="/posts?author={{ $post->author->username }}"
                      class="text-decoration-none">{{ $post->author->name }}</a>
                  </h3>
                  {{ $post->created_at->diffForHumans() }}
                  <p class="card-text flex-grow-1">{{ Str::limit(strip_tags(html_entity_decode($post->excerpt))) }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary mt-auto">Read More</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @else
      <p class="text-center fs-4">Artikel tidak
        ditemukan{{ request('category') ? ' di kategori ' . request('category') : '' }}.</p>

      @if (!empty($otherPosts) && $otherPosts->count())
        <p class="text-center fs-5">Coba lihat di kategori lain:</p>
        <ul class="list-group">
          @foreach ($otherPosts as $post)
            <li class="list-group-item">
              <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a> -
              <small>Kategori: <a
                  href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></small>
            </li>
          @endforeach
        </ul>
      @endif
    @endif
  </div>
@endsection
