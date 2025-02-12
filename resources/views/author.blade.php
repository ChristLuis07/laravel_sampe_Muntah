@extends('layouts.app')

@section('title', "Artikel oleh $author->name")

@section('content')
  <h1 class="mb-5 text-center">Artikel oleh {{ $author->name }}</h1>
  @if ($posts->count())
    <div class="container">
      <div class="row">
        @foreach ($posts as $post)
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                    {{ $post->title }}
                  </a>
                </h5>
                <p class="text-muted">{{ $post->created_at->format('d M Y') }}</p>
                <p>{{ Str::limit(strip_tags(html_entity_decode($post->excerpt))) }}</p>
                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <p class="text-center">Belum ada artikel dari penulis ini.</p>
  @endif
@endsection
