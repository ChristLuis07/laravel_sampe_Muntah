<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Navbar</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


  {{-- Favicon --}}
  <link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
</head>
<nav id="navbarUtama" class="navbar navbar-expand-lg navbar-dark text-light sticky-top font-weight-bold"
  style="color: #102032; transition: background-color 0.3s; background-color: #343131;">
  <div class="container-fluid">
    <a class="navbar-brand me-5" href="/">
      ChristianBlogPage
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
        <li class="nav-item">
          <a class="nav-link {{ $title === 'Home' ? 'active font-weight-bold' : '' }}"
            href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title === 'About' ? 'active font-weight-bold' : '' }}"
            href="{{ url('/about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title === 'posts' ? 'active font-weight-bold' : '' }}"
            href="{{ url('/posts') }}">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title === 'Categories' ? 'active font-weight-bold' : '' }}"
            href="{{ url('/categories') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title === 'Contact' ? 'active font-weight-bold' : '' }}"
            href="{{ url('/contact') }}">Contact</a>
        </li>
      </ul>

      {{-- Login --}}
      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  Logout
                </button>
              </form>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a href="/login"
              class="nav-link {{ $title === 'login' ? 'active font-weight-bold' : '' }} btn btn-dark">Login</a>
          </li>
        @endauth
      </ul>

      {{-- Dark Mode --}}
      <button id="dark-mode-toggle" class="btn btn-dark">Dark Mode</button>

    </div>
  </div>
</nav>



<body>
