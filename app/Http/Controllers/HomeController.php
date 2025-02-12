<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->limit(3)->get();
        $categories = Category::all();

        return view('home', [
            'title' => 'Home',
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
