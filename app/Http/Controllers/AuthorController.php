<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors', [
            'title' => 'Penulis',
            'authors' => User::has('posts')->get(),
        ]);
    }

    public function show(User $author)
    {
        return view('author', [
            'title' => "Artikel oleh $author->name",
            'author' => $author,
            'posts' => $author->posts->load('category', 'author'),
        ]);
    }
}
