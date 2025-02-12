<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Categories',
            'categories' => Category::all(),
        ]);
    }

    public function tampilkanDetailCategory(Category $category)
    {
        return view('posts', [
            'title' => "Post by Category : $category->name",
            'posts' => $category->posts->load('author', 'category'),
        ]);
    }

    public function tampilkanDetailAuthor(User $author)
    {
        return view('posts', [
            'title' => "Post By Author : $author->name",
            'posts' => $author->posts->load('category', 'author'),
        ]);
    }
}
