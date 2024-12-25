<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Retrieve the authenticated user
            $user = $request->user();

            // Retrieve posts belonging to the authenticated user
            $posts = $user->posts()->with('user')->get();


            return response()->json([
                'success' => true,
                'user' => $user,
                'posts' => $posts
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching posts.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display paginated list of posts.
     *
     * @return \Illuminate\View\View
     */
    public function getPosts()
    {
        try {
            // Paginate posts (5 per page)
            $posts = Post::with('user')->paginate(5);

            // Pass paginated posts to the view
            return view('posts.index', compact('posts'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching posts.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
