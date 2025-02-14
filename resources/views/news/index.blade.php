@extends('layouts.app')

@section('title', $title)

@section('content')
  <div class="container">
    <h1 class="mb-4">List Artikel Ini Diambil Dari News Api</h1>
    @if (count($articles))
      @foreach ($articles as $article)
        <div class="card mb-3">
          @if ($article['urlToImage'])
            <img src="{{ $article['urlToImage'] }}" alt="{{ $article['title'] }}" class="card-img-top">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $article['title'] }}</h5>
            <p class="card-text">{{ Str::limit($article['description'] ?? '', 150) }}</p>
            <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Read More</a>
          </div>
        </div>
      @endforeach
    @else
      <p>Artikel Tidak Ditemukan</p>
    @endif
  </div>
@endsection
