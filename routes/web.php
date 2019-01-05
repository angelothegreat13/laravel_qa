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

