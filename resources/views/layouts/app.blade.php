<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Page | {{ $title }}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script>
    window.autocompleteUrl = "{{ route('posts.autocomplete') }}";
  </script>
</head>

<body>
  {{-- Ini Untuk Include Navbar  --}}
  @include('partials.navbar')

  <div class="container-fluid px-0">
    @yield('content')
  </div>

  {{-- Ini Untuk Include Footer --}}
  @include('partials.footer')
  <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
