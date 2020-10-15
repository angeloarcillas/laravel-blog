<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// [ QUESTION ]
Route::resource('questions', QuestionController::class);
// Route::post('questions/{question}/answer', AnswerQuestionController::class)->name('answer.store');

// [ ANSWER ]
Route::resource('answers', AnswerController::class)->except('index', 'show', 'create');
Route::post('answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');

// [ FAVORITE ]
Route::post('questions/{question}/favorite', [QuestionFavoriteController::class,'store'])->name('questions.favotite');
Route::delete('questions/{question}/favorite', [QuestionFavoriteController::class,'destroy'])->name('questions.unfavotite');

// [ VOTE ]
Route::post('questions/{question}/vote', QuestionVoteController::class);
Route::post('answers/{answer}/vote', AnswerVoteController::class);