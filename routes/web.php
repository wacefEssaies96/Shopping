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



   
Route::get('/','HomeController@index')->name('home.index');

Route::get('/home','HomeController@index')->name('home.index2');

Route::get('/index', 'ProduitController@index');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home.index');




Route::group(['middleware' => ['auth','admin']],function(){
    Route::get('/admin/dashboard',function(){
        return view('admin.dashboard');
       })->name('admin.dashboard');
       Route::resource('/admin/commandes', 'CommandeController'); 
       Route::resource('/admin/Demandes', 'DemendeController');
});
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/Produit', 'ProduitController');
    Route::resource('/panier','PanierController');
    Route::resource('/commande','CommandeController');
    
    Route::resource('/paiement','PaiementController');
});

//Commandes routes
Route::delete('/commande/delete/{id}', 'CommandeController@destroy')->name('commande.destroy');
Route::get('/commande/approve/{id}', 'CommandeController@approve')->name('commande.approve');