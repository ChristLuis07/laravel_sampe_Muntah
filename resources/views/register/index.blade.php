@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
    <div class="col-md-6">
      <main class="form-registration w-100 m-auto">
        <form action="/register" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" value="{{ old('name') }}" name="name"
              class="form-control 
                            @error('name')
                            is-invalid
                            @enderror"
              id="name" placeholder="Name">
            <label for="name">Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" value="{{ old('username') }}" name="username"
              class="form-control
                         @error('username')
                            is-invalid
                            @enderror"
              id="username" placeholder="Username">
            <label for="username">Username</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" value="{{ old('email') }}" name="email"
              class="form-control
              @error('email')
                is-invalid
                @enderror
            "
              id="email" placeholder="Email">
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating mt-3">
            <input type="password" name="password"
              class="form-control
             @error('password')
                is-invalid
                @enderror
            "
              id="password" placeholder="Password">
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
        <small class="d-block text-center mt-3">Already registered?<a href="/login">Login</a></small>
      </main>
    </div>
  </div>
@endsection
