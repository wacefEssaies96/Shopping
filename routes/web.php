<?php

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

Route::get('/','HomeController@index')->name('home.index');
Route::get('/home','HomeController@index')->name('home.index2');

Route::get('/index', 'ProduitController@index');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home.index');




Route::group(['middleware' => ['auth','admin']],function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard');
       })->name('admin.dashboard');
       Route::resource('/admin/commandes', 'CommandeController'); 
});
