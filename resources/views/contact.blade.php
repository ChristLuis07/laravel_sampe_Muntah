@extends('layouts.app')

@section('title', 'Halaman - Contact')

@section('content')
  <div class="container mt-5">
    <h2>Contact Me</h2>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Pesan</label>
        <textarea name="message" class="form-control" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary mb-5">Kirim Pesan</button>
    </form>
    <h3>Halaman Contact Ini Berfungsi 100% Kirimkan Pesan Pesan Anda Terkait Website Ini</h3>
  </div>
@endsection
