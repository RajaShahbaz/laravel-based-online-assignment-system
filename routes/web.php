<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
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
// Route::get('/Users', 'UserController@index')->name('users');
Route::get('/delete-user/{id}', 'UserController@destroy')->name('deleteuser');
Route::Post('/Add-User', 'UserController@store')->name('postuser');
Route::get('/Contacts', 'ContactsController@index')->name('contacts');
Route::Post('/Contact', 'ContactsController@store')->name('postcontact');
// Route::get('/Logout', 'UserController@logout')->name('logout');
Route::get('/Inventory', 'CargoInventoryController@Index')->name('cargoinventory');
Route::get('/Add-Inventory', 'CargoInventoryController@create')->name('addinventory');
Route::Post('/Add-Inventory', 'CargoInventoryController@store')->name('postinventory');
Route::Post('/Search', 'CargoInventoryController@search')->name('searchinventory');
Route::get('/show/{id}', 'CargoInventoryController@show')->name('showinventory');
Route::get('/edit/{id}', 'CargoInventoryController@edit')->name('editinventory');
Route::get('/Inventory/{name}', 'CargoInventoryController@databybranch')->name('branchinventory');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/Login', 'UserController@login')->name('postlogin');
    Route::middleware('auth')->group(function () {
    Route::get('/delete-admin/{id}', 'AdminController@destroy')->name('delete_admin');
    Route::get('/delete-user/{id}', 'UserController@destroy')->name('delete_user');
    Route::get('/delete-course/{id}', 'CourseController@destroy')->name('delete_course');
    Route::get('/delete-assignment/{id}', 'AssignmentController@destroy')->name('delete_assignment');
    Route::get('download-assignment/{id}', 'AssignmentController@download_assignment')->name('download-assignment');
    Route::post('/Store-Admin', 'AdminController@store')->name('store_admin');
    Route::get('/upload-assignment/{id}', 'AssignmentController@getuploadform')->name('upload_assignment_form');
    Route::Post('/upload-assignment', 'AssignmentController@saveuploadassignment')->name('upload_assignment');


    Route::get('/logout', 'UserController@logout')->name('logout');
});
});
// Route::middleware('auth')->group(function () {
    Route::resource('course', CourseController::class);
    Route::resource('user', UserController::class);
    Route::resource('assignment', AssignmentController::class);

// });



Route::get('/Dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/Add-Admin', function () {
    return view('add_admin');
})->name('add_admin');

Route::get('/Assignment-pdf', function () {
    return view('asssignment_pdf');
})->name('asssignment_pdf');

Route::get('/Admins', function () {
    return view('admins');
})->name('admins');

Route::get('/Add-Course', function () {
    return view('add_course');
})->name('add_course');

Route::get('/Courses', function () {
    return view('courses');
})->name('courses');

Route::get('/All-Users', function () {
    return view('users');
})->name('all_users');

Route::get('/Add-User', function () {
    return view('add_user');
})->name('add_user');

Route::get('/', function () {
    return view('dashboard');
})->name('admin.dashboard');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/index', function () {
    return view('dashboard');
});
