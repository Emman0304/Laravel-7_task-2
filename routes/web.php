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
    Route::get('/dashboard','AdminController@chartsView')->name('admin.dash');                  // dashboard
    Route::get('/studentProf','AdminController@adminStudentProf')->name('admin.studentProf');   //student profile
    Route::get('/userAccs','AdminController@adminUserAccs')->name('admin.userAccs');            //user account
    Route::get('/export','AdminController@export')->name('export');                             // export excel
    Route::post('/import','AdminController@importStudent')->name('import');                     //import excel
    Route::post('/save','AdminController@create')->name('save');                                //save new user
    
    //annoucements
    Route::get('/announcement','AdminController@adminAnn')->name('admin.ann');                  //annoucement
    Route::get('/delete/announcement/{id}','AdminCOntroller@destroy')->name('destroy');         //delete announcement
    Route::get('/create/announcement','AdminController@adminCreateAnn')->name("create_ann");    //create announcement
    Route::get('/edit/announcement/{id}','AdminController@editAnn')->name("edit_ann");          //edit announcement
    Route::post('/saveEdit/announcement/{id}','AdminController@saveEdit')->name("save_edit");   //update announcemnt
    Route::post('/save/announcement','AdminController@CreateAnn')->name("save_ann");            //save announcement

});

Route::prefix('student')->middleware(['auth','isStudent'])->group(function(){
    //student
    Route::get('/dashboard','HomeController@studentDash')->name('student.dash');                //student dashboard
    Route::get('/profile','HomeController@studentProf')->name('student.prof');                  //student profile
    Route::get('/editProfile','Homecontroller@editProfile')->name('student.edit');
    Route::post('/saveEdit/{id}','HomeController@saveEdit')->name('student.saveEdit');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

