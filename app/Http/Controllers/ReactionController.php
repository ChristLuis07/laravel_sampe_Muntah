<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function react(Request $request, $postId)
    {
        $request->validate([
            'type' => 'required|in:like,dislike,love'
        ]);

        // Simpan atau update reaksi pengguna
        Reaction::updateOrCreate(
            ['post_id' => $postId, 'user_id' => Auth::id()],
            ['type' => $request->type],
        );

        // Ambil jumlah total reaksi per jenis
        $reactionsCount = [
            'like' => Reaction::where('post_id', $postId)->where('type', 'like')->count(),
            'dislike' => Reaction::where('post_id', $postId)->where('type', 'dislike')->count(),
            'love' => Reaction::where('post_id', $postId)->where('type', 'love')->count(),
        ];

        return response()->json([
            'success' => true,
            'reactions' => $reactionsCount
        ]);
    }
}
