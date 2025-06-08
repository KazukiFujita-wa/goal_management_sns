<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;


class PitController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $goals = Goal::where('user_id', $user->id)->get();
        $totalGoals = $goals->count();
        $completedGoals = $goals->where('is_completed', true)->count();

        return view('pit', compact('user', 'goals', 'totalGoals', 'completedGoals'));
    }

    public function create()
    {
        // ピットの作成ページを表示
        return view('pit');
    }

    public function store(Request $request)
    {
        // ピットのデータを保存する処理
        // バリデーションや保存ロジックをここに追加
        return redirect()->route('pit.index')->with('success', 'ピットが作成されました！');
    }
}
