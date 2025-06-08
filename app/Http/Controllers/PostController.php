<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        //フォロー中ユーザーの投稿を取得
        $followings = Auth::user()->followings()->pluck('users.id')->toArray();
        //自分の投稿を含める
        $followings[] = Auth::id();
        //自分の投稿を含める
//        $followings->push(Auth::id());
        // 投稿一覧を取得
        $posts = Post::whereIn('user_id', $followings)
        ->with('user') // 投稿者の情報も一緒に取得
        ->orderBy('created_at', 'desc')
        ->get();    
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

    public function create()
    {
        // 投稿作成ページを表示
        return view('post');
    }
}
