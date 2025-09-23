<?php

use App\Http\Controllers\PostCategoryController;
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


        Route::get('category', [PostCategoryController::class, 'index'])->name('category');
        Route::post('category', [PostCategoryController::class, 'store'])->name('storeCategory');
        Route::put('category/{category}', [PostCategoryController::class, 'update'])->name('updateCategory');
        Route::delete('category/{category}', [PostCategoryController::class, 'destroy'])->name('deleteCategory');

    });

    Route::prefix('quiz')->name('quiz.')->group(function () {
        Route::get('/', [\App\Http\Controllers\QuizController::class, 'list'])->name('list');
        Route::get('/add', [\App\Http\Controllers\QuizController::class, 'add'])->name('add');
        Route::post('/add', [\App\Http\Controllers\QuizController::class, 'store'])->name('store');
        Route::get('/delete/{quiz}', [\App\Http\Controllers\QuizController::class, 'deleteQuiz'])->name('delete');
        Route::get('/question/{quiz}', [\App\Http\Controllers\QuizController::class, 'question'])->name('question');
        Route::get('/question/{quiz}/add', [\App\Http\Controllers\QuizController::class, 'addQuestion'])->name('addQuestion');
        Route::post('/question/{quiz}/add', [\App\Http\Controllers\QuizController::class, 'storeQuestion'])->name('storeQuestion');

        Route::get('/question/{quiz}/edit/{question}', [\App\Http\Controllers\QuizController::class, 'editQuestion'])->name('editQuestion');
        Route::post('/question/{quiz}/edit/{question}', [\App\Http\Controllers\QuizController::class, 'updateQuestion'])->name('updateQuestion');

        Route::get('/question/{quiz}/delete/{question}', [\App\Http\Controllers\QuizController::class, 'deleteQuestion'])->name('deleteQuestion');
        Route::get('/question/{quiz}/option/{question}', [\App\Http\Controllers\QuizController::class, 'option'])->name('option');
        Route::get('/question/{quiz}/option/{question}/delete/{option}', [\App\Http\Controllers\QuizController::class, 'deleteOption'])->name('deleteOption');
        Route::get('/result', [\App\Http\Controllers\QuizController::class, 'result'])->name('result');
    });


});

Route::get('/login', function () {
    return view('panel.login');
})->name('login');

Route::get('/panel/admin', function () {
    return view('panel.posts');
})->name('admin');


Route::get('/test', function () {
    return view('test');
})->name('test');
