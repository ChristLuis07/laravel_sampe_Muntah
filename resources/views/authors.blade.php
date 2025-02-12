@extends('layouts.app')

@section('title', 'Daftar Menulis')

@section('content')
  <h1 class="mb-5 text-center">Daftar Penulis</h1>

  <div class="container">
    <div class="row">
      @foreach ($authors as $author)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">
                <a href="{{ route('author.show', $author->username) }}" class="text-decoration-none">
                  {{ $author->name }}
                </a>
              </h5>
              <p class="text-muted">{{ $author->posts->count() }} Artikel</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
