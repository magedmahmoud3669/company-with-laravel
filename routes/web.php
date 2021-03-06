<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('companies','companiesController');
Route::get('projects/create/{company_id?}','projectsController@create');
Route::resource('projects','projectsController');
Route::post('projects/adduser','projectsController@adduser')->name('projects.adduser');
Route::resource('roles','rolesController');
Route::resource('tasks','tasksController');
Route::resource('users','usersController');
Route::resource('comments','commentsController');


