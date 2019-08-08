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
Route::get('students', 'StudentController@index')->name('students');

// Class Route
Route::group(
    ['prefix' => 'classes', 'as' => 'classes.'],
    function () {
        Route::get('/', 'ClassRoomController@index')->name('list');
        Route::get('add', 'ClassRoomController@createForm')->name('add');
        Route::post('create-post', 'ClassRoomController@create')->name('create-post');
        Route::get('{class}/edit', 'ClassRoomController@editForm')->name('edit');
        Route::post('update-post', 'ClassRoomController@update')->name('update');
        Route::get('{class}/delete', 'ClassRoomController@delete')->name('delete');
    }
);

Route::group(
    ['prefix' => 'admins', 'as' => 'admins'],
    function (){
        Route::get('/', 'AdminController@index')->name('list');
        Route::get('class', 'AdminController@indexClass')->name('class');
    }
);

// Route::get('classes', 'ClassRoomController@index')->name('classes');
// Route::get('classes/add', 'ClassRoomController@createform')->name('classes.add-form');
// Route::post('classes/create-post', 'ClassRoomController@create')->name('classes.create-post');



Route::get('/users', function(){
    return view('users');
});
Route::get('/admin_temp', function(){
    return view('admin.master');
});
