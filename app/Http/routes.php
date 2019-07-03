<?php
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
//header('Access-Control-Allow-Methods', 'PUT, POST, GET, DELETE, OPTIONS');
//header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Authorization, token, Access-Control-Request-Method, Access-Control-Request-Headers");
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('tasks', 'TaskController');

Route::get('/', function()
{
    return View::make('home');
});

Route::get('/tasks', 'TaskController@index')->name('tasks.all');

Route::put('/tasks', 'TaskController@create')->name('tasks.create');

Route::post('/tasks', 'TaskController@update')->name('tasks.update');

Route::delete('/tasks/{id}', 'TaskController@destory')->name('tasks.destroy');