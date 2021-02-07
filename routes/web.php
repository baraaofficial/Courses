<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->middleware('auth','admin','role:super_admin','status')->prefix('dashboard')->group(function () {
    Route::get('/','HomeController@index')->name('admin.index');
    /** start route users **/
    Route::resource('users','UserController'); // Route user resource
    Route::get('user/delete', 'UserController@delete')->name('users.delete'); // Route user delete
    Route::get('user/recoveryusers/{id}', 'UserController@recovery')->name('users.recovery'); // Route user deleted recovery
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
    Route::get('framework/stopped','FrameworkController@stopped')->name('framework.stopped'); // Route frameworks stopped
    Route::get('framework/delete','FrameworkController@delete')->name('framework.delete'); // Route frameworks delete
    Route::get('framework/recoveryframeworks/{id}', 'FrameworkController@recovery')->name('framework.recovery'); // Route user deleted recovery

    /** End route frameworks **/


    /** Start route levels **/
    Route::resource('levels','LevelController'); // Route levels
    Route::get('level/delete','LevelController@delete')->name('level.delete'); // Route levels delete
    Route::get('level/recoverylevels/{id}', 'LevelController@recovery')->name('level.recovery'); // Route user deleted recovery
    Route::DELETE('level/{id}/delete', 'LevelController@forcedelete')->name('Level.forcedelete');
    /** End route levels **/

    Route::resource('tags','TagController'); // Route tags

    /** Start route students **/
    Route::resource('students','StudentController'); // Route students
    Route::get('student/delete','StudentController@delete')->name('student.delete'); // Route students delete
    Route::get('student/stopped','StudentController@stopped')->name('student.stopped'); // Route students stopped
    Route::get('student/recoverystudent/{id}','StudentController@recovery')->name('student.recovery'); // Route students recovery
    Route::DELETE('student/{id}/delete', 'StudentController@forcedelete')->name('student.forcedelete'); // Route students force delete
    /** End route students **/

    /** Start route teachers **/
    Route::resource('teachers','TeacherController'); // Route students
    Route::get('teacher/delete','TeacherController@delete')->name('teacher.delete'); // Route teachers delete
    Route::get('teacher/stopped','TeacherController@stopped')->name('teacher.stopped'); // Route teachers stopped
    Route::get('teacher/recoveryteacher/{id}','TeacherController@recovery')->name('teacher.recovery'); // Route teachers recovery
    Route::DELETE('teacher/{id}/delete', 'TeacherController@forcedelete')->name('teacher.forcedelete'); // Route teachers force delete
    /** End route teachers **/
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
