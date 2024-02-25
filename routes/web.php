<?php

use App\Http\Controllers\{Auth\Github\CallbackController,
    Auth\Github\RedirectController,
    DashboardController,
    ProfileController,
    Question,
    QuestionController};

Route::get('/', function () {
    return view('welcome');
});
Route::get('/github/login', RedirectController::class)
    ->name('github.login');
Route::get('/github/callback', CallbackController::class)
    ->name('github.callback');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name(
        'dashboard'
    );
    #region Question Routes
    Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
    Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/question/{question}/edit', [QuestionController::class, 'edit'])->name('question.edit');
    Route::put('/question/{question}', [QuestionController::class, 'update'])->name('question.update');
    Route::patch('/question/{question}/archive', [QuestionController::class, 'archive'])->name('question.archive');
    Route::patch('/question/{question}/restore', [QuestionController::class, 'restore'])->name('question.restore');
    Route::delete('/question/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');
    Route::post('/question/like/{question}', Question\LikeController::class)->name('question.like');
    Route::post('/question/unlike/{question}', Question\UnlikeController::class)->name('question.unlike');
    Route::put('/question/publish/{question}', Question\PublishController::class)->name('question.publish');
    #endregion

    #region Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    #endregion
});

require __DIR__ . '/auth.php';
