<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

//admin
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard','AdminController@adminDash')->name('admin.dash');
    Route::get('/studentProf','AdminController@adminStudentProf')->name('admin.studentProf');
    Route::get('/announcement','AdminController@adminAnn')->name('admin.ann');
    Route::get('/userAccs','AdminController@adminUserAccs')->name('admin.userAccs');
    Route::post('/save','AdminController@create')->name('save');
    Route::get('/layout','AdminController@layoutView')->name('layout');

    
    
});

//student
Route::get('/student/dashboard','HomeController@studentDash')->name('student.dash');
Route::get('/student/profile','HomeController@studentProf')->name('student.prof');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

