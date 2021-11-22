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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionController', ['only' => [
'index',
'show', 
'create', 
'store'
]]);

Route::get('questions/edit/{id}', 'QuestionController@edit');

Route::post('questions/edit', 'QuestionController@update');

Route::post('questions/delete/{id}', 'QuestionController@destroy');
