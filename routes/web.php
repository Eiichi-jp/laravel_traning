<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/folders/{id}/tasks','App\Http\Controllers\TaskController@index')->name('tasks.index');//Routeは完全修飾で記述すること(laravel8以降)

Route::get('/folders/create','App\Http\Controllers\FolderController@showCreateForm')->name('folders.create');

Route::post('/folders/create','App\Http\Controllers\FolderController@create');

Route::get('/folders/{id}/tasks/create','App\Http\Controllers\TaskController@showCreateForm')->name('tasks.create');
Route::post('/folders/{id}/tasks/create','App\Http\Controllers\TaskController@create');
