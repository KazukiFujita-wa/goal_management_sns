<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GoalController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//テスト用
Route::get('/test', function () {
    return view('test');
});

//ホーム画面
Route::get('/home', [PostController::class, 'index'])->name('home');

//プロフィール画面
Route::get('/pit', [GoalController::class, 'index'])->name('pit');
Route::get('/goals/{id}/edit', [GoalController::class, 'edit'])->name('goals.edit');
Route::patch('/goals/{id}', [GoalController::class, 'update'])->name('goals.update');
Route::patch('/goals/{id}', [GoalController::class, 'destroy'])->name('goals.destroy');
Route::patch('/goals/{id}/complete', [GoalController::class, 'complete'])->name('goals.complete');




//投稿画面
Route::get('/post', function () {
    return view('post');
});
//目標設定画面

Route::get('/goal_set', function () {
    return view('goal_set');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pit', [GoalController::class, 'pit'])->name('pit');
});

Route::resource('posts', PostController::class)
    ->middleware(['auth'])
    ->only(['store', 'index', 'show', 'edit', 'update', 'destroy']);

Route::resource('goals', GoalController::class)
    ->middleware(['auth'])
    ->only(['store', 'index', 'show', 'edit', 'update', 'destroy']);

require __DIR__.'/auth.php';
