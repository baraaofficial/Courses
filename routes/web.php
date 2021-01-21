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
    /** start route users **/
    Route::resource('users','UserController'); // Route user resource
    Route::get('user/search', 'UserController@search')->name('users.search'); // Route user search
    Route::get('user/search/{search}', 'UserController@search')->name('users.searchindex'); // Route user search index
    Route::get('user/delete', 'UserController@delete')->name('users.delete'); // Route user delete
    Route::get('user/deletedusers/{id}', 'UserController@recovery')->name('users.recovery'); // Route user deleted recovery
    Route::get('user/stopped', 'UserController@stopped')->name('users.stopped'); // Route user stopped
    /** End route users **/
    /** Start route languages **/
    Route::resource('languages','LanguageController'); // Route settings
    /** End route languages **/
    /** Start route settings **/
    Route::resource('settings','SettingController'); // Route settings
    /** End route settings **/

    /** Start route frameworks **/
    Route::resource('frameworks','FrameworkController'); // Route frameworks
    Route::get('framework/search','FrameworkController@search')->name('framework.search'); // Route frameworks search
    Route::get('framework/search/{search}','FrameworkController@search')->name('framework.searchindex'); // Route frameworks search index
    Route::get('framework/stopped','FrameworkController@stopped')->name('framework.stopped'); // Route frameworks stopped
    Route::get('framework/delete','FrameworkController@delete')->name('framework.delete'); // Route frameworks delete
    Route::get('framework/deletedframeworks/{id}', 'FrameworkController@recovery')->name('framework.recovery'); // Route user deleted recovery

    /** End route frameworks **/

    Route::resource('levels','LevelController'); // Route levels


    Route::resource('tags','TagController'); // Route tags

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
