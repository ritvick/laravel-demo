<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //return view('welcome');
	return redirect('/auth/login');
});

/* Employee Routing */
Route::get('/employee','EmployeeController@get_list')->middleware('auth');
Route::get('/employee/get_all_employee','EmployeeController@get_all_employee')->middleware('auth');
Route::get('/employee/addedit','EmployeeController@addedit')->middleware('auth');
Route::get('/employee/addedit/{id}','EmployeeController@addedit')->middleware('auth');
Route::post('/employee/addedit','EmployeeController@save')->middleware('auth');
Route::get('/employee/delete/{id}','EmployeeController@destroy')->middleware('auth');


/* Login */
Route::get('/login','LoginController@index');
Route::get('/auth/login','LoginController@index');
Route::get('/logout','LoginController@doLogout')->middleware('auth');
Route::post('/login/validate','LoginController@doLogin');

/* API */
//Route::post('auth/create', 'EmployeeController@register');
Route::post('/api/login', 'ApiController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/api/user', 'ApiController@getAuthUser');
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/api/get_employee', 'ApiController@get_employee');
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('/api/addupdate_employee', 'ApiController@addupdate_employee');
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/api/delete_employee', 'ApiController@delete_employee');
});