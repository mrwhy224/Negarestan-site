<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/quiz', function () {
    return view('quiz');
});

Route::prefix('panel')->group(function () {
    Route::get('/', [\App\Http\Controllers\PanelController::class, 'index'])->name('dashboards');

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [\App\Http\Controllers\PostController::class, 'list'])->name('list');
        Route::get('/add', [\App\Http\Controllers\PostController::class, 'add'])->name('add');
        Route::get('/category', [\App\Http\Controllers\PostController::class, 'category'])->name('category');
        Route::get('/comment', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
    });

    Route::prefix('quiz')->name('quiz.')->group(function () {
        Route::get('/', [\App\Http\Controllers\QuizController::class, 'list'])->name('list');
        Route::get('/add', [\App\Http\Controllers\QuizController::class, 'add'])->name('add');
        Route::get('/result', [\App\Http\Controllers\QuizController::class, 'result'])->name('result');
    });

    
});

Route::get('/login', function () {
    return view('panel.login');
})->name('login');

Route::get('/panel/admin', function () {
    return view('panel.posts');
})->name('admin');
