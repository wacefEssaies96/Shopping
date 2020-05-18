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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/','HomeController@index')->name('home.index');

Route::get('/home','HomeController@index')->name('home.index2');

Route::get('/profil','UserProfileController@index')->name('user.profil.index');
Route::put('/profil/update','UserProfileController@update')->name('user.profil.update');
Route::get('/profil/disable','UserProfileController@disable')->name('user.profil.disable');



///  Route admin

Route::group(['middleware' => ['auth','admin']],function(){
    Route::get('/admin/dashboard',function(){
        return view('admin.dashboard');
       })->name('admin.dashboard');

    Route::resource('/admin/commandes', 'CommandeController'); 
    Route::get('/admin/user','Admin\UserController@usered')->name('admin.user');
    Route::get('/user-edit/{id}','Admin\UserController@useredit');
    Route::put('/role-user-update/{id}','Admin\UserController@userupdate');
    Route::delete('/user-delete/{id}','Admin\UserController@userdelete');   
    
    Route::resource('/admin/commandes', 'CommandeController'); 
    Route::get('admin/Produit/AllProduits', 'ProduitController@AllProd')->name('AllProd');
    Route::get('admin/Produit/ConsulterDetailleProduit/{prodid}/{userid}', 'ProduitController@ConsulterDetailleProduit')->name('ConsulterDetailleProduit');
    Route::get('/admin/Demandes/AccepterDemande/{id}/{prodid}/{userid}', 'DemendeController@AccepterDemande')->name('AccepterDemande');
    Route::get('/admin/Demandes/AnnulerDemande/{id}/{prodid}/{userid}', 'DemendeController@AnnulerDemande')->name('AnnulerDemande');
                        
    Route::resource('/admin/Demandes', 'DemendeController'
    // , [
    //     'only' => ['store','destroy'],
    //     'except' => ['edit', 'create']
    // ]
);
});

///  Route client
Route::group(['middleware' => ['auth','client']],function(){
    Route::resource('/Produit', 'ProduitController');
    
    Route::resource('/admin/Demandes', 'DemendeController', [
        'only' => ['store','destroy']
    ]);

    Route::resource('/panier','PanierController');
    Route::resource('/rating','RatingController');
    Route::delete('/panier/d','PanierController@destroy')->name('d');
    Route::patch('/checkout','PanierController@u')->name('checkout');
    Route::get('/shop','SearchController@index')->name('shop');
    
    Route::resource('/commande','CommandeController');
    Route::resource('/paiement','PaiementController');
});

///  Route visiteur
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/Produit', 'ProduitController', [
        'only' => ['show']
    ]);
    Route::get('/ConsulterProduit/{prodid}', 'ProduitController@ConsulterProduit')->name('ConsulterProduit');
    
    
    
});

//Commandes routes
Route::delete('/commande/delete/{id}', 'CommandeController@destroy')->name('commande.destroy');
Route::get('/commande/approve/{id}', 'CommandeController@approve')->name('commande.approve');

//Users routes
Route::get('/admin/user/disable/{id}', 'Admin\UserController@disable')->name('admin.user.disable');
Route::get('/admin/user/enable/{id}', 'Admin\UserController@enable')->name('admin.user.enable');