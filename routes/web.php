<?php

Route::get('download/{file}', function($file) {
	$file = str_replace('!!', '/', $file);
	$file = base_path('storage/app/'.$file);

	return response()->make(file_get_contents($file), 200, [
	    'Content-Type' => 'application/pdf',
	    'Content-Disposition' => 'inline; filename="trabalho.pdf"'
	]);
});


Route::get('download/{file}/{id}', function($file, $id) {
	$file = str_replace('!!', '/', $file);
	$file = base_path('storage/app/'.$file);

	return response()->make(file_get_contents($file), 200, [
	    'Content-Type' => App\Model\Submission::find($id)->mimetype,
	    'Content-Disposition' => 'inline; filename="'.str_replace('!!', '/', $file).'"'
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

	Route::get('/course/{id}/disciplines', 'CourseController@disciplines');
	Route::get('/course/new', 'CourseController@index');
	Route::post('/course/new', 'CourseController@store');
	Route::get('/course/{id}/edit', 'CourseController@edit');
	Route::post('/course/{id}/edit/update', 'CourseController@update');
	Route::get('/course/{id}/delete', 'CourseController@delete');


	Route::get('course/{course}/discipline/{disc}/works', 'DisciplineController@works');
	Route::get('/discipline/new', 'DisciplineController@index');
	Route::post('/discipline/new', 'DisciplineController@store');
	Route::get('/discipline/{id}/edit', 'DisciplineController@edit');
	Route::post('/discipline/{id}/edit/update', 'DisciplineController@update');
	Route::get('/discipline/{id}/delete', 'DisciplineController@delete');


	Route::group(['prefix' => 'teacher'], function() {
		Route::get('/new', 'TeacherController@index');
		Route::post('/new/save', 'TeacherController@store');
		Route::get('/{id}/edit', 'TeacherController@edit');
		Route::post('/{id}/edit/save', 'TeacherController@update');
		Route::get('/{id}/delete', 'TeacherController@delete');

		Route::get('{id}/link', 'TeacherController@link');
		Route::post('{id}/link', 'TeacherController@linkGo');
		Route::post('{id}/link/finish', 'TeacherController@linkFinish');
	});

	Route::group(['prefix' => 'student'], function() {
		Route::get('/new', 'StudentController@index');
		Route::post('/new/save', 'StudentController@store');
		Route::get('/{id}/edit', 'StudentController@edit');
		Route::post('/{id}/edit/save', 'StudentController@update');
		Route::get('/{id}/delete', 'StudentController@delete');

		Route::get('{id}/link', 'StudentController@link');
		Route::post('{id}/link', 'StudentController@linkGo');
		Route::post('{id}/link/finish', 'StudentController@linkFinish');
	});

	Route::get('/work', 'WorkController@index');
	Route::get('/work/new', 'WorkController@form');
	Route::get('/work/{id}/delete', 'WorkController@delete');
	Route::post('work/new', 'WorkController@store');
	Route::get('work/{id}/submission', 'WorkController@submission');
	Route::post('work/{id}/submission', 'WorkController@submissionPost');
});
