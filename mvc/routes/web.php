<?php
use App\Controllers;
use App\Routes\Route;

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');

Route::get('/course', 'CourseController@index');
Route::get('/course/show', 'CourseController@show');

Route::get('/course/create', 'CourseController@create');
Route::post('/course/create', 'CourseController@store');

Route::get('/course/edit', 'CourseController@edit');
Route::post('/course/edit', 'CourseController@update');

Route::post('/course/delete', 'CourseController@delete');
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


//Dashboard
Route::get('/dashboard', 'DashboardController@index');

Route::dispatch();
?>

