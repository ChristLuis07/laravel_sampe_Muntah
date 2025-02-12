@extends('layouts.app')

@section('title')

@section('content')
    @foreach ($posts as $post)
        <h1 class="mb-5">Post Categories in {{ $post->category->name }}</h1>
        <article>
            <h2 class="mb-3"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach

@endsection
