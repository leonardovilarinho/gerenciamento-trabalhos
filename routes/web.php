<?php

Route::group(['middleware' => 'web'], function() {

	Route::get('primeiro-acesso', 'InstalacaoController@inicioForm');
	Route::post('primeiro-acesso', 'InstalacaoController@registroPrimeiroAcesso');

	Route::get('', 'AuthController@panelLogin');
	Route::post('into', 'AuthController@into');

	Route::get('panel', 'PanelController@start');

	Route::get('erro', function() {
		return view('erro');
	});
});