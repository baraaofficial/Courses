<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->middleware('auth','admin','role:super_admin')->prefix('dashboard')->group(function () {
    Route::get('/','HomeController@index')->name('admin.index');
    Route::resource('users','UserController');
    /** start Route Users **/
        Route::get('user/search', 'UserController@search')->name('users.search');
        Route::get('user/search/{search}', 'UserController@search')->name('users.searchindex');
        Route::get('user/delete', 'UserController@delete')->name('users.delete');
        Route::get('user/deletedusers/{id}', 'UserController@recovery')->name('users.recovery');
        Route::get('user/stopped', 'UserController@stopped')->name('users.stopped');
    /** End Route Users **/
});

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
