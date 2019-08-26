<?php

Route::group(['middleware' => 'auth'], function() {

    Route::resource('types', 'TypeController', ['except' => ['index', 'show']]);
    Route::resource('times', 'TimeController', ['except' => ['index', 'show']]);
    Route::resource('languages', 'LanguageController', ['except' => ['index', 'show']]);
    Route::resource('formats', 'FormatController', ['except' => ['index', 'show']]);
    Route::resource('statuses', 'StatusController', ['except' => ['index', 'show']]);
    Route::resource('titles', 'TitleController', ['except' => ['index', 'show']]);
    Route::post('/editions/{id}', 'EditionTitleController@store');
    Route::put('/editions/{id}', 'EditionTitleController@update');
    Route::get('/editions/{slug}', 'EditionTitleController@show');
    Route::get('/editions/{id}/edit', 'EditionTitleController@edit');
    Route::delete('/editions/{id}', 'EditionTitleController@destroy');
    Route::post('/articles/{id}', 'ArticleEditionController@store');
    Route::put('/articles/{id}', 'ArticleEditionController@update');
    Route::get('/articles/{id}/edit', 'ArticleEditionController@edit');
    Route::delete('/articles/{id}', 'ArticleEditionController@destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/report', function () {
    return view('report');
});

Auth::routes();
Route::resource('types', 'TypeController', ['only' => ['index', 'show']]);
Route::resource('times', 'TimeController', ['only' => ['index', 'show']]);
Route::resource('languages', 'LanguageController', ['only' => ['index', 'show']]);
Route::resource('formats', 'FormatController', ['only' => ['index', 'show']]);
Route::resource('statuses', 'StatusController', ['only' => ['index', 'show']]);
Route::resource('titles', 'TitleController', ['only' => ['index', 'show']]);
Route::get('/home', 'HomeController@index')->name('home');
