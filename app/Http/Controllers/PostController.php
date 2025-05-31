<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // 投稿一覧を取得
        $posts = Post::latest()->get();
        //ユーザー名の取得
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
    
        // ビューに渡す
        return view('home', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = new Post();
        $post->user_id = auth()->id();
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index')->with('success', '投稿が完了しました！');
    }
}
