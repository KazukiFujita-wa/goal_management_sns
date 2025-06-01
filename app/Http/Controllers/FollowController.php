<?php

// app/Http/Controllers/FollowController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    // ユーザー一覧を表示
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $authUser = Auth::user();

        return view('follow', compact('users', 'authUser'));
    }

    // フォロー処理
    public function follow(User $user)
    {
        //followings()がVSCodeではエラー表示されるが、実行時には問題ない
        Auth::user()->followings()->attach($user->id);
        return back()->with('success', 'フォローしました');
    }

    // アンフォロー処理
    public function unfollow(User $user)
    {
        //followings()がVSCodeではエラー表示されるが、実行時には問題ない
        Auth::user()->followings()->detach($user->id);
        return back()->with('success', 'フォローを解除しました');
    }
}
