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

// Home
Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
Route::get('home',['as'=>'home','uses'=>'HomeController@index']);
Route::get('Home',['as'=>'home','uses'=>'HomeController@index']);

// Login
Route::get('login','LoginController@index')->name('login');
Route::post('login','LoginController@postLogin')->name('login.show');

// Logout
Route::get('logout','LogoutController@Logout')->name('logout');

// Quản Lý
Route::get('user','UserController@index')->name('user.index');
Route::get('book','BookController@index')->name('book.index');
Route::get('bookrecord','BookRecordController@index')->name('bookrecord.index');

// User
// Add
Route::get('user/add','UserController@add')->name('user.add');
Route::post('user/add','UserController@addShow')->name('user.show');

// Edit
Route::get('user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('user/update/{id}','UserController@update')->name('user.update');
// Remove
Route::get('user/delete/{id}','UserController@delete')->name('user.delete');


// Book
// Add
Route::get('book/add','BookController@add')->name('book.add');
Route::post('book/add/show','BookController@addShow')->name('book.show');
// Edit
Route::get('book/edit/{id}','BookController@edit')->name('book.edit');
Route::post('book/update/{id}','BookController@update')->name('book.update');
// Remove
Route::get('book/delete/{id}','BookController@delete')->name('book.delete');
// Sort
Route::get('book/sort','BookController@sort')->name('book.sort');
// Search
Route::post('book/search','BookController@search')->name('book.search');



// BookRecord
// Add
Route::get('bookrecord/add','BookRecordController@add')->name('bookrecord.add');
Route::post('bookrecord/add/show','BookRecordController@addShow')->name('bookrecord.show');
// Edit
Route::get('bookrecord/edit/{id}','BookRecordController@edit')->name('bookrecord.edit');
Route::post('bookrecord/update/{id}','BookRecordController@update')->name('bookrecord.update');
// Remove
Route::get('bookrecord/delete/{id}','BookRecordController@delete')->name('bookrecord.delete');
// Sort
Route::get('bookrecord/sort','BookRecordController@sort')->name('bookrecord.sort');
// Search
Route::post('bookrecord/search','BookRecordController@search')->name('bookrecord.search');
