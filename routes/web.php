<?php

Route::get('download/{file}', function($file) {
	$file = str_replace('!!', '/', $file);
	$file = base_path('storage/app/'.$file);

	return response()->make(file_get_contents($file), 200, [
	    'Content-Type' => 'application/pdf',
	    'Content-Disposition' => 'inline; filename="trabalho.pdf"'
	]);
});

Route::group(['middleware' => 'guest'], function() {
	Route::get('primeiro-acesso', 'InstalacaoController@inicioForm');
	Route::post('primeiro-acesso', 'InstalacaoController@registroPrimeiroAcesso');

	Route::get('', 'AuthController@panelLogin');
	Route::post('login', 'AuthController@login');
});

Route::get('error', function() {
	return view('error');
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


	Route::get('/teacher/new', 'TeacherController@index');
	Route::post('/teacher/new/save', 'TeacherController@store');
	Route::get('/teacher/{id}/edit', 'TeacherController@edit');
	Route::post('/teacher/{id}/edit/save', 'TeacherController@update');
	Route::get('/teacher/{id}/delete', 'TeacherController@delete');

	Route::get('include/displine/teacher', 'AddController@index');
	Route::get('include/displine/teacher/{course}/{discipline}', 'AddController@delete');
	Route::post('include/displine/teacher/pt1', 'AddController@pt2');
	Route::post('include/displine/teacher/pt2', 'AddController@store');

	Route::get('/student/new', 'StudentController@index');
	Route::post('/student/new/save', 'StudentController@store');
	Route::get('/student/{id}/edit', 'StudentController@edit');
	Route::post('/student/{id}/edit/save', 'StudentController@update');
	Route::get('/student/{id}/delete', 'StudentController@delete');

	Route::get('include/work', 'WorkController@index');
	Route::get('include/work/pt2/{course}', 'WorkController@pt2View');
	Route::get('include/work/{id}', 'WorkController@delete');
	Route::post('include/work/pt1', 'WorkController@pt2');
	Route::post('include/work/end', 'WorkController@store');

	Route::get('include/displine/student', 'StudentDisciplineController@index');
	Route::get('include/displine/student/{course}/{discipline}/{student}', 'StudentDisciplineController@delete');
	Route::post('include/displine/student/pt1', 'StudentDisciplineController@pt2');
	Route::post('include/displine/student/pt2', 'StudentDisciplineController@store');

});
