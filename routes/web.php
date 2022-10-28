<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/index','AdminController@adminIndex')->name('admin.index');
    
});

Route::get('/user/index','HomeController@userIndex')->name('user.index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//trials
Route::get('/sidebar','TrialsController@sidebar');