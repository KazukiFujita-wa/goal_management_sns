<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Goal;


class GoalController extends Controller
{
  public function index() 
  {
    // 投稿一覧を取得
    $user = Auth::user();
    $goals = Goal::where('user_id', $user->id)->get();
    $totalGoals = $goals->count();
    $completedGoals = $goals->where('is_completed', true)->count();

    // ビューに渡す
    return view('pit', compact('user', 'goals', 'totalGoals', 'completedGoals'));
    
  }
  public function create() {}
  public function store(Request $request) 
  {
      $request->validate([
          'goal_title' => 'required|string|max:20',
          'goal_content' => 'required|string|max:100',
      ]);

      $goal = new Goal();
      //id()がVSCodeではエラー表示されるが、実行時には問題ない
      $goal->user_id = auth()->id();
      $goal->goal_title = $request->input('goal_title');
      $goal->goal_content = $request->input('goal_content');
      $goal->save();
      
      return redirect()->route('goals.index')->with('success', '目標を設定しました！');

  }
  public function show($id) {}
  public function edit($id) 
  {
    $goal = Goal::findOrFail($id);

    //自分の目標か確認
    if ($goal->user_id !== Auth::id()) {
      abort(403, 'Unauthorized action.');
    }

    return view('edit', compact('goal'));

  }
  public function update(Request $request, $id) 
  {
    $request->validate([
        'goal_title' => 'required|string|max:20',
        'goal_content' => 'required|string|max:100',
    ]);

    $goal = Goal::findOrFail($id);

    //自分の目標か確認
    if ($goal->user_id !== Auth::id()) {
      abort(403, 'Unauthorized action.');
    }

    $goal->goal_title = $request->input('goal_title');
    $goal->goal_content = $request->input('goal_content');
    $goal->save();

    return redirect()->route('pit')->with('success', '目標を更新しました！');
  }
  public function destroy($id) 
  {

    $goal = Goal::findOrFail($id);
    //自分の目標か確認
    if ($goal->user_id !== Auth::id()) {
      abort(403, 'Unauthorized action.');
    }

    $goal->delete();

    return redirect()->route('pit')->with('success', '目標を削除しました！');

  }

  public function pit()
  {
    //ユーザーの目標数を取得
    $user = Auth::user();
    $goals = $user->goals;
    $totalGoals = $user->goals->count();
    $completedGoals = $user->goals->where('is_completed', true)->count();

      return view('pit', [
          'user' => $user,
          'goals' => $goals,
          'totalGoals' => $totalGoals,
          'completedGoals' => $completedGoals,
      ]);
  }

  public function complete(Request $request, $id)
  {
      $goal = Goal::findOrFail($id);
      $goal->is_completed = true;
      $goal->save();

      return redirect()->route('pit')->with('success', '目標を達成しました！');
  }
}
