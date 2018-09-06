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
view()->share('resource',url('').'/');

Route::get('/', 'NoteController@index');
Route::get('/home', 'NoteController@index');
Route::get('/about', 'NoteController@index');

Route::get('notes', 'NoteController@allNotes');

Route::post('/note/edit/{id}','NoteController@editNote');

Route::resource('note','NoteController');

Route::get('/{name}',function(){
	return redirect('/');
})->where('name','[A-Za-z]+');
