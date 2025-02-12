@extends('layouts.app')

@section('title')

@section('content')
  {{-- Hero Section --}}
  <div class="container-fluid">

    <div class="row">

      <div class="col-md-6">

        <img src="{{ asset('images/about.jpg') }}" alt="Pizza Restaurant" class="img-fluid">

      </div>

      <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">

        <h1 class="display-4 text-dark">Welcome To About Me Page</h1>

        <p class="text-dark lead mt-4">
          Halo! Nama saya Christian Luis Paskalis Ginting. Saya adalah seorang mahasiswa Politeknik Negeri Cilacap, saat
          ini sedang menempuh pendidikan di Program Studi Rekayasa Keamanan Siber (semester 2).

          Saya juga merupakan alumni SMK Negeri 1 Kutalimbaru, dengan jurusan Rekayasa Perangkat Lunak, di mana saya fokus
          pada pengembangan web.
        </p>

      </div>

    </div>

  </div>
  {{-- Hero Section End --}}

  {{-- Content 2  --}}
  <div class="container mt-5">
    <h2 class="text-center text-warning mb-4">Sertifikat</h2>
    <div class="row mb-3">

      <!-- Card 1 -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="{{ asset('images/sertifikat/1.png') }}" class="card-img-top" alt="Sertifikat 1">
          <div class="card-body">
            <h5 class="card-title">Sertifikat Data Visualization</h5>
            <p class="card-text">Sertifikat dari Freecodecamp</p>
            <a href="https://www.freecodecamp.org/certification/ChristianLuis07/front-end-development-libraries"
              target="_blank" class="btn btn-primary">Lihat Sertifikat</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="{{ asset('images/sertifikat/2.png') }}" class="card-img-top" alt="Sertifikat 2">
          <div class="card-body">
            <h5 class="card-title">Sertifikat Front End Development Libraries</h5>
            <p class="card-text mb-4">Sertifikat Freecodecamp</p>
            <a href="https://www.freecodecamp.org/certification/ChristianLuis07/data-visualization" target="_blank"
              class="btn btn-primary">Lihat Sertifikat</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="{{ asset('images/sertifikat/3.png') }}" class="card-img-top" alt="Sertifikat 3">
          <div class="card-body">
            <h5 class="card-title">Javascript Algorithms and Data Structures</h5>
            <p class="card-text">Sertifikat Freecodecamp</p>
            <a href="https://www.freecodecamp.org/certification/ChristianLuis07/javascript-algorithms-and-data-structures-v8"
              target="_blank" class="btn btn-primary">Lihat Sertifikat</a>
          </div>
        </div>
      </div>

    </div>
    <div class="row">

      <!-- Card 4 -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="{{ asset('images/sertifikat/4.png') }}" class="card-img-top" alt="Sertifikat 1">
          <div class="card-body">
            <h5 class="card-title"> Belajar Dasar Pemrograman Javascript</h5>
            <p class="card-text">Sertifikat Dicoding</p>
            <a href="https://www.dicoding.com/certificates/6RPNYOR3QZ2M" target="_blank" class="btn btn-primary">Lihat
              Sertifikat</a>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="{{ asset('images/sertifikat/5.png') }}" class="card-img-top" alt="Sertifikat 2">
          <div class="card-body">
            <h5 class="card-title">Belajar Back-end Pemula dengan Javacsript</h5>
            <p class="card-text mb-4">Sertifikat Dicoding</p>
            <a href="https://www.dicoding.com/certificates/0LZ04E1YNP65" target="_blank" class="btn btn-primary">Lihat
              Sertifikat</a>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="{{ asset('images/sertifikat/6.png') }}" class="card-img-top" alt="Sertifikat 3">
          <div class="card-body">
            <h5 class="card-title">Cloud Practitioner Essentials (Belajar Dasar AWS Cloud)</h5>
            <p class="card-text">Sertifikat Dicoding</p>
            <a href="https://www.dicoding.com/certificates/81P24J16NZOY" target="_blank" class="btn btn-primary">Lihat
              Sertifikat</a>
          </div>
        </div>
      </div>

    </div>
  </div>


  {{-- Content 2 End --}}
@endsection
