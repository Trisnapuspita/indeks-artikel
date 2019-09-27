<?php

Route::group(['middleware' => 'auth'], function() {

    Route::resource('types', 'TypeController', ['except' => ['index', 'show']]);
    Route::resource('times', 'TimeController', ['except' => ['index', 'show']]);
    Route::resource('languages', 'LanguageController', ['except' => ['index', 'show']]);
    Route::resource('formats', 'FormatController', ['except' => ['index', 'show']]);
    Route::resource('statuses', 'StatusController', ['except' => ['index', 'show']]);
    Route::resource('titles', 'TitleController', ['except' => ['index', 'show']]);
    Route::post('/titles/import_excel', 'TitleController@import_excel');
    Route::get('/titles/export_excel', 'TitleController@export_excel');
    Route::get('/editions', 'EditionTitleController@index');
    Route::get('/editions/create', 'EditionTitleController@create');
    Route::post('/editions/{id}', 'EditionTitleController@store');
    Route::put('/editions/{id}', 'EditionTitleController@update');
    Route::get('/editions/{id}', 'EditionTitleController@show');
    Route::get('/editions/{id}/edit', 'EditionTitleController@edit');
    Route::delete('/editions/{id}', 'EditionTitleController@destroy');
    Route::get('/editions/export_excel/{id}', 'EditionTitleController@export_excel');
    Route::post('/editions/import_excel/{id}', 'EditionTitleController@import_excel');
    Route::get('/articles', 'ArticleEditionController@index');
    Route::get('/articles/create', 'ArticleEditionController@create');
    Route::post('/articles/{id}', 'ArticleEditionController@store');
    Route::put('/articles/{id}', 'ArticleEditionController@update');
    Route::get('/articles/{id}/edit', 'ArticleEditionController@edit');
    Route::get('/articles/{id}/verif', 'ArticleEditionController@verif');
    Route::delete('/articles/{id}', 'ArticleEditionController@destroy');
    Route::get('/articles/export_excel', 'ArticleEditionController@export_excel');
    Route::post('/articles/import_excel/{id}', 'ArticleEditionController@import_excel');
    Route::get('/reports','ReportController@index')->name('reportsIndex');
    Route::post('/reports/searchByDay','ReportController@searchByDay');
    Route::post('/reports/searchByMonth','ReportController@searchByMonth');
    Route::post('/reports/searchByYear','ReportController@searchByYear');
    Route::get('/reports/export', 'ReportController@export_excel');
    Route::get('/displays/etalase', 'TitleController@etalase_in');
    Route::get('/displays/etalase/{id}', 'TitleController@etalase_show_in');
    Route::get('/displays/catalog/{id}', 'TitleController@catalog_show_in');
    Route::get('/displays/articlelog/{id}', 'TitleController@articlelog_show_in');
    Route::get('/displays/hierarki/{id}', 'TitleController@hierarki_show_in');
    Route::get('/displays/hierarkilog/{id}', 'TitleController@hierarkilog_show_in');
    Route::get('/home', 'HomeController1@index')->name('home');
    Route::post('/home', 'HomeController1@indexPost')->name('homePost');
    
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/',"HomeController1@indexPost");


Auth::routes();
Route::resource('types', 'TypeController', ['only' => ['index', 'show']]);
Route::resource('times', 'TimeController', ['only' => ['index', 'show']]);
Route::resource('languages', 'LanguageController', ['only' => ['index', 'show']]);
Route::resource('formats', 'FormatController', ['only' => ['index', 'show']]);
Route::resource('statuses', 'StatusController', ['only' => ['index', 'show']]);
Route::resource('titles', 'TitleController', ['only' => ['index', 'show']]);
Route::get('/etalase', 'TitleController@etalase');
Route::get('/etalase/{id}', 'TitleController@etalase_show');
Route::get('/catalog/{id}', 'TitleController@catalog_show');
Route::get('/articlelog/{id}', 'TitleController@articlelog_show');
Route::get('/hierarki/{id}', 'TitleController@hierarki_show');
Route::get('/hierarkilog/{id}', 'TitleController@hierarkilog_show');
Route::get('/welcome', 'HomeController@index')->name('home');
Route::post('/welcome', 'HomeController@indexPost')->name('homePost');
Route::get('/etalase', 'TitleController@etalase');
Route::get('/etalase/{id}', 'TitleController@etalase_show');
Route::get('/catalog/{id}', 'TitleController@catalog_show');
Route::get('/articlelog/{id}', 'TitleController@articlelog_show');
Route::get('/hierarki/{id}', 'TitleController@hierarki_show');
Route::get('/hierarkilog/{id}', 'TitleController@hierarkilog_show');

