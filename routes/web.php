<?php

Route::get('/', function () { 
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('questions','QuestionsController')->except('show'); //removing show in route resource
// Route::post('/questions/{question}/answers','AnswersController@store')->name('answers.store');
Route::resource('questions.answers','AnswersController')->except(['index', 'create', 'show']);
Route::get('/questions/{slug}','QuestionsController@show')->name('questions.show'); //custom route for show
Route::post('/answers/{answer}/accept','AcceptAnswerController')->name('answers.accept'); //this means laravel will called the __invoker method automatically because there is no method name

Route::post('/questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');

