@extends('layouts.app')

@section('title')

@section('content')

  {{-- Hero Section --}}
  <div class="container mt-3 mb-5">
    <div class="row">
      <div class="col-md-6 custom-margin" style="margin-top:100px">
        <h1 class="display-4">Selamat Datang Di Blog Sederhana Saya</h1>

        <p class="lead">Blog ini dibuat menggunakan Framework PHP yaitu laravel dan Library CSS yaitu Bootstrap 5.Anda
          juga bisa menambahkan komentar ke Postingan Blog Ini.UI Website ini Sederhana Karena Pembuat Pusing Dengan
          Laravel
        </p>

        <div class="mt-4">

          <a href="https://github.com/ChristLuis07" class="btn btn-primary"><i class="bi bi-github"></i> MY
            GitHub</a>

          <a href="https://www.linkedin.com/in/christian-luis-paskalis-ginting-85abbb2a2/" class="btn btn-secondary ml-2">
            <i class="bi bi-linkedin"></i> MY LinkedIn</a>

        </div>

      </div>

      <div class="col-md-6">

        <img src="{{ asset('images/hero.png') }}" class="img-fluid" alt="Building Digital Products & Brands Illustration">

      </div>

    </div>

  </div>
  {{-- Hero  Section End --}}

  {{-- Post Section --}}
  <h2 class="text-center mt-5 mb-5">🔥 Artikel Terbaru</h2>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
      @foreach ($posts as $index => $post)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}  mt-5">
          <div class="d-flex justify-content-center">
            <img src="{{ asset('storage/' . $post->image) }}" class="d-block rounded" alt="{{ $post->title }}"
              style="width: 80%; height: 300px; object-fit: cover;">
          </div>
          <div class="text-center mt-3">
            <h5 class="fw-bold">{{ $post->title }}</h5>
            <p class="text-secondary">{{ Str::limit(strip_tags(html_entity_decode($post->excerpt)), 100) }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Baca Selengkapnya</a>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Tombol Navigasi -->
    <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#carouselExampleCaptions"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#carouselExampleCaptions"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="text-center mt-4">
    <a href="/posts" class="btn btn-outline-primary">Lihat Semua Artikel</a>
  </div>
  {{-- Post Section  End --}}

  {{-- Category Section  --}}
  <div class="container mt-5">
    <h2 class="text-center">🗂 Kategori Artikel</h2>
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-4 mb-3">
          <div class="card text-center p-3">
            <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top mx-auto" alt="{{ $category->name }}"
              style="width: 80px; height: 80px;">
            <div class="card-body">
              <h5 class="card-title">{{ $category->name }}</h5>
              <a href="/posts?category={{ $category->slug }}" class="btn btn-primary">Lihat Artikel</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  {{-- Category Section End --}}





@endsection
