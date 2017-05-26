<?php

Route::group(['middleware' => 'guest'], function() {
	Route::get('primeiro-acesso', 'InstalacaoController@inicioForm');
	Route::post('primeiro-acesso', 'InstalacaoController@registroPrimeiroAcesso');

	Route::get('', 'AuthController@panelLogin');
	Route::post('login', 'AuthController@login');
});

Route::get('erro', function() {
	return view('erro');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('exit', 'AuthController@exit');

	Route::get('panel', 'PanelController@start');

	Route::group(['prefix' => 'admin'], function() {
		Route::get('/', 'AdminController@index');
		Route::get('/new', 'AdminController@new');
		Route::post('/save', 'AdminController@store');
		Route::get('{id}/delete', 'AdminController@destroy');
		Route::put('{id}/edit', 'AdminController@update');
		Route::get('{id}/edit', 'AdminController@edit');
	});

	Route::get('/course/new', 'CourseController@index');
	Route::post('/course/new', 'CourseController@store');
	Route::get('/course/{id}/edit', 'CourseController@edit');
	Route::post('/course/{id}/edit/update', 'CourseController@update');
	Route::get('/course/{id}/delete', 'CourseController@delete');


	Route::get('/discipline/new', 'DisciplineController@index');
	Route::post('/discipline/new', 'DisciplineController@store');
	Route::get('/discipline/{id}/edit', 'DisciplineController@edit');
	Route::post('/discipline/{id}/edit/update', 'DisciplineController@update');
	Route::get('/discipline/{id}/delete', 'DisciplineController@delete');
});