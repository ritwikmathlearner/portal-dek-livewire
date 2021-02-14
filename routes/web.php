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
Route::get('/run', 'HomeController@run');

Route::middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/create/role', 'ManageUserController@create_role')->name('role.create');
    Route::get('/role/permissions', 'ManageUserController@role_permissions')->name('role.permissions');
});

Route::resource('/category', 'CategoryController')->except(['show', 'edit']);

Auth::routes();
