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

Route::dispatch();
?>

