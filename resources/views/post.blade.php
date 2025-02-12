@extends('layouts.app')

@section('title')

@section('content')

  <div class="container">
    {{-- Artikel --}}
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">
        <h1 class="mb-3">{{ $post->title }}</h1>
        <h3>By. <a href="/posts?author={{ $post->author->username }}"
            class="text-decoration-none text-success">{{ $post->author->name }}</a> in <a
            href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
        </h3>
        @if ($post->image)
          <div style="max-height: 450px; overflow hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
          </div>
        @else
          <img src="{{ \App\Helpers\PexelsHelper::getGambarUrl($post->category->name) }}"
            alt="{{ $post->category->name }}" class="img-fluid">
        @endif

        <article class="my-3 fs-5  mt-5">{!! $post->body !!}</article>
        <a href="/posts" class="text-decoration-none">Back to Posts</a>
      </div>
    </div>
  </div>

  {{-- Form Tambah Komentar --}}
  @if (auth()->check())
    <div class="mt-4">
      <h4>Tambahkan Komentar</h4>
      <form action="{{ route('comments.store', $post->slug) }}" method="POST">
        @csrf
        <textarea name="body" cols="10" rows="3" class="form-control" required placeholder="Tulis komentar..."></textarea>
        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
      </form>
    </div>
  @else
    <p class="mt-4">Silahkan <a href="{{ route('login') }}">Login</a> Untuk Menulis Komentar.</p>
  @endif

  {{-- Daftar Komentar --}}
  @if ($post->comments->count() > 0)
    <div class="mt-5">
      <h4>Komentar ({{ $post->comments->count() }})</h4>
      @foreach ($post->comments as $comment)
        <div class="card p-3 mb-2">
          <strong>{{ $comment->user->name }}</strong> Berkomentar:
          <p>{{ $comment->body }}</p>
          <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
      @endforeach
    </div>
  @else
    <p class="mt-4">Belum ada komentar.</p>
  @endif
@endsection
