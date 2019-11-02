<?php

Route::group(['middleware' => 'auth'], function() {
    Route::resource('types', 'TypeController');
    Route::resource('times', 'TimeController');
    Route::resource('languages', 'LanguageController');
    Route::resource('formats', 'FormatController');
    Route::resource('statuses', 'StatusController');
    Route::resource('titles', 'TitleController');
    Route::get('download', 'ArticleEditionController@download');
    Route::get('titles/delete/{id}', 'TitleController@destroy');
    Route::get('titles/search', 'TitleController@search')->name('search');
    Route::post('/titles/article/{id}', 'TitleController@store_article');
    Route::get('/titles/article/{id}', 'TitleController@create_article');
    Route::get('/editions', 'EditionTitleController@index')->name('editions.index');
    Route::post('/editions', 'EditionTitleController@store');
    Route::post('/editions/create_edition/{id}', 'TitleController@store_edition');
    Route::post('/editions/create/{id}', 'EditionTitleController@store_article');
    Route::get('/editions/create/{id}', 'EditionTitleController@create_article');
    Route::get('/editions/create', 'EditionTitleController@create');
    Route::post('/editions/{id}', 'EditionTitleController@store');
    Route::put('/editions/{id}', 'EditionTitleController@update');
    Route::get('/editions/{id}', 'EditionTitleController@show');
    Route::get('/editions/{id}/edit', 'EditionTitleController@edit');
    Route::get('/editions/delete/{id}', 'EditionTitleController@destroy');
    Route::get('/articles', 'ArticleEditionController@index')->name('articles.index');
    Route::get('/articles/create', 'ArticleEditionController@create');
    Route::get('/articles/getEdition', 'ArticleEditionController@getEdition');
    Route::get('/articles/getEdisi', 'ArticleEditionController@getEdisi');
    Route::get('/articles/getSumber', 'ArticleEditionController@getSumber');
    Route::post('/articles', 'ArticleEditionController@new_store');
    Route::put('/articles/{id}', 'ArticleEditionController@update');
    Route::get('/articles/{id}/edit', 'ArticleEditionController@edit');
    Route::get('/articles/{id}/verif', 'ArticleEditionController@verif');
    Route::get('/articles/delete/{id}', 'ArticleEditionController@destroy');
    Route::get('/articles/export_excel', 'ArticleEditionController@export_excel');
    Route::post('/articles/import_excel', 'ArticleEditionController@import_excel');
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
    Route::resource('ajax-crud', 'AjaxCrudController');
    Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');
    Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/',"HomeController1@indexPost");


Auth::routes();
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

