<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categories = \App\Models\Category::all();

        // Start query with eager loading
        $postsQuery = \App\Models\Post::with('category');

        // Filter by category if requested
        if ($request->has('category') && $request->category != '') {
            $postsQuery->where('category_id', $request->category);
        }

        // Get the posts and ensure each post is unique
        $posts = $postsQuery->get()->unique('id');

        return view('posts.index', compact('posts', 'categories'));
    }

}
