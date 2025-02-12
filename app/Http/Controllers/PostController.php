<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString();


        $otherPosts = collect();
        if ($posts->isEmpty() && request('search')) {
            $otherPosts = Post::latest()
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
                ->limit(5)
                ->get();
        }

        return view('/posts', [
            'title' => 'Posts' . $title,
            'posts' => $posts,
            'otherPosts' => $otherPosts, // Kirim rekomendasi ke tampilan
        ]);
    }

    public function tampilkan(Post $post)
    {
        return view('/post', [
            'title' => 'Single Post',
            'post' => $post
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        $posts = Post::query();

        if (!empty($category)) {
            $posts->whereHas('category', function ($qc) use ($category) {
                $qc->where('slug', $category);
            });
        }

        if (!empty($query)) {
            $posts->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('body', 'like', '%' . $query . '%');
            });
        }

        $posts = $posts->latest()->get();

        return response()->json($posts);
    }
}
