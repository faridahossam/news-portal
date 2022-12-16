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
Route::get('/', 'App\Http\Controllers\frontcontroller@index');
Route::get('article/{slug}','App\Http\Controllers\frontcontroller@article');
Route::get('categories/{slug}', 'App\Http\Controllers\frontcontroller@category');
Route::get('page/{slug}', 'App\Http\Controllers\frontcontroller@page');
Route::get('contact-us', 'App\Http\Controllers\frontcontroller@contactUs');
Route::post('sendmessage','App\Http\Controllers\crudcontroller@insertData');

Route::get('post', 'App\Http\Controllers\frontcontroller@post');

Route::get('admin', 'App\Http\Controllers\admincontroller@index');

Route::get('login', 'App\Http\Controllers\admincontroller@login');
//category
Route::get('viewcategory','App\Http\Controllers\admincontroller@viewcategory');

Route::post('addcategory','App\Http\Controllers\crudcontroller@insertData');

Route::get('editcategory/{id}','App\Http\Controllers\admincontroller@editcategory');

Route::post('updatecategory/{id}','App\Http\Controllers\crudcontroller@updateData');

Route::post('multipledelete','App\Http\Controllers\admincontroller@multipledelete');
//post
Route::get('add-post','App\Http\Controllers\admincontroller@addpost');
Route::post('addpost','App\Http\Controllers\crudcontroller@insertData');
Route::get('all-posts','App\Http\Controllers\admincontroller@allposts');
Route::get('editposts/{id}','App\Http\Controllers\admincontroller@editpost');
Route::post('updatepost/{id}','App\Http\Controllers\crudcontroller@updateData');
Route::get('search-content','App\Http\Controllers\frontcontroller@searchContent');
//pages
Route::get('add-page','App\Http\Controllers\admincontroller@addPage');
Route::post('addpage','App\Http\Controllers\crudcontroller@insertData');
Route::get('all-pages','App\Http\Controllers\admincontroller@allpages');
Route::get('editpage/{id}','App\Http\Controllers\admincontroller@editpage');
Route::post('updatepage/{id}','App\Http\Controllers\crudcontroller@updateData');

//dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout','App\Http\Controllers\HomeController@logout');
/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
