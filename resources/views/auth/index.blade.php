@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    <div class="col-md-6">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('Error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <main class="form-signin w-100 m-auto">
        <form action="/login" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <input type="email" name="email"
              class="form-control
              @error('email')
                is-invalid
              @enderror
            "
              id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}"
              autocomplete="off">
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating mt-5">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-check text-start my-3">
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
        <small class="d-block text-center mt-3">Not registered?<a href="/register">Register Now!</a></small>
      </main>
    </div>
  </div>
@endsection
