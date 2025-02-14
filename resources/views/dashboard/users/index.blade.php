@extends('dashboard.layouts.app')

@section('title', $title)

@section('content')
  <div class="container">
    <h1 class="mb-4">{{ $title }}</h1>
    @if ($users->count())
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Terdaftar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->created_at->format('d M Y') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada user.</p>
  </div>
  @endif
@endsection
