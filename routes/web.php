<?php

Route::group(['middleware' => 'web'], function() {

	Route::get('primeiro-acesso', 'InstalacaoController@inicioForm');
	Route::post('primeiro-acesso', 'InstalacaoController@registroPrimeiroAcesso');

	Route::get('', 'AuthController@panelLogin');
	Route::post('login', 'AuthController@login');
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

	Route::get('erro', function() {
		return view('erro');
	});
});