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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/AllProduits', 'ProduitController@AllProd')->name('AllProd');
Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/Produit', 'ProduitController');
    Route::resource('/panier','PanierController');
});

   