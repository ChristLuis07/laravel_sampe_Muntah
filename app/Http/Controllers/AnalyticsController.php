<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        $totalPosts = Post::count();
        $totalComments = Comment::count();
        $totalReactions = Reaction::count();

        // Ambil Data
        $monthlyPosts = Post::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $postsWithMeta = Post::whereNotNull('meta_description')->count();
        $seoOptimizedPercentage = $totalPosts > 0 ? round(($postsWithMeta / $totalPosts) * 100, 2) : 0;

        return view('dashboard.analytics.index', compact(
            'totalPosts',
            'totalComments',
            'totalReactions',
            'monthlyPosts',
            'seoOptimizedPercentage',
        ));
    }
}
