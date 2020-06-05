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


Auth::routes();

/// Visiteur
/// first page
Route::get('/','HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@Home')->name('home');


/// user 
Route::get('/profil','UserProfileController@index')->name('user.profil.index');
Route::put('/profil/update','UserProfileController@update')->name('user.profil.update');
Route::get('/profil/disable','UserProfileController@disable')->name('user.profil.disable');



///  Route admin

Route::group(['middleware' => ['auth','admin']],function(){
    // Route::get('/admin/dashboard',function(){
    //     return view('admin.dashboard');
    //    })->name('admin.dashboard');
       
    /// Home ADMIN
    Route::get('/admin/indexadmin','Admin\DashboardController@index')->name('indexadmin');
    

    /// COMMANDE
    Route::resource('/admin/commandes', 'CommandeController'); 
    Route::get('admin/commande/ConsulterDetailleOrder/{prodid}/{userid}', 'CommandeController@ConsulterDetailleOrder')->name('ConsulterDetailleOrder');
    /// User active 
    Route::get('/admin/user','Admin\UserController@usered')->name('admin.user');
    Route::get('/user-edit/{id}','Admin\UserController@useredit');
    Route::put('/role-user-update/{id}','Admin\UserController@userupdate');
    Route::delete('/user-delete/{id}','Admin\UserController@userdelete');   

    /// Product
    
    Route::resource('/Produit', 'ProduitController'
        , [
            'except' => ['index']
        ]
    );

    Route::get('/admin/Produit/OurProducts', 'ProduitController@OurProducts')->name('OurProducts');
    Route::get('admin/Produit/Produitsonthesite', 'ProduitController@Prodonsite')->name('Prodonsite');
    Route::get('admin/Produit/AllProduits', 'ProduitController@AllProd')->name('AllProd');
    Route::get('admin/Produit/ConsulterDetailleProduit/{prodid}/{userid}', 'ProduitController@ConsulterDetailleProduit')->name('ConsulterDetailleProduit');

    Route::get('admin/Produit/ConfirmProducts/{prodid}', 'ProduitController@confirmProducts')->name('confirmProducts');
    Route::get('admin/Produit/NoConfirmProducts/{prodid}', 'ProduitController@noconfirmProducts')->name('noconfirmProducts');

    /// Demande
    
    Route::get('admin/Demandes','DemendeController@index')->name('indexadmin');
    Route::get('admin/DemandesTDAC','DemendeController@indexTDAC')->name('indexadminTDAC');
    Route::get('admin/DemandesTDEA','DemendeController@indexTDEA')->name('indexadminTDEA');
    Route::get('admin/Demandes/ConsulterDetailleDemandes/{prodid}/{userid}', 'DemendeController@ConsulterDetailleDemandes')->name('ConsulterDetailleDemandes');

    Route::get('/admin/Demandes/AccepterDemande/{id}/{prodid}/{userid}', 'DemendeController@AccepterDemande')->name('AccepterDemande');
    Route::get('/admin/Demandes/AnnulerDemande/{id}/{prodid}/{userid}', 'DemendeController@AnnulerDemande')->name('AnnulerDemande');
    Route::delete('/admin/Demandes/deleteDemande','DemendeController@deleteDemande')->name('deleteDemande');
                        
    Route::resource('/admin/Demandes', 'DemendeController'
        // , [
        //     'only' => ['store','destroy'],
        //     'except' => ['edit', 'create']
        // ]
    );
    /// user show
    Route::get('admin/Usershow/{userid}', 'Admin\UserController@Usershow')->name('Usershow');
    ///notification
    Route::get('indexnotification','Admin\DashboardController@indexnotification')->name('indexnotification');
});

// /  Route client
Route::group(['middleware' => ['auth','client']],function(){

    /// Home Client
    Route::get('/shop','SearchController@index')->name('shop');
    /// Produit
    Route::resource('/Produit', 'ProduitController'
    , [
        'except' => ['ConsulterDetailleProduit','AllProd','OurProducts']
    ]
);
    
    Route::resource('/admin/Demandes', 'DemendeController', [
        'only' => ['store']
    ]);
    Route::delete('/admin/demande','DemendeController@deleted')->name('deleted');

    Route::resource('/panier','PanierController');
    Route::resource('/rating','RatingController');
    Route::delete('/panier/d','PanierController@destroy')->name('d');
    Route::patch('/checkout','PanierController@u')->name('checkout');
    
    Route::resource('/commande','CommandeController');
    Route::resource('/paiement','PaiementController');
});

///  Route  client or admin 
Route::middleware('auth')->group(function () {

    // Route::get('/home', 'HomeController@index')->name('home');

    /// Produit page
    Route::resource('/Produit', 'ProduitController'
        , [
            'except' => ['ConsulterDetailleProduit','AllProd','OurProducts','index']
        ]
    );
    
    /// Consulter Produit 
    Route::get('/ConsulterProduit/{prodid}', 'ProduitController@ConsulterProduit')->name('ConsulterProduit');
    
    ///  ImageProduit
    Route::get('/ImageProduit/{id}', 'ImageProduitController@ImgProduit')->name('ImgProduit');
    Route::resource('/ImageProduit', 'ImageProduitController'
        , [
            'except' => ['create','edit','destroy']
        ]
    );
    Route::get('/ImageProduit/create/{id}', 'ImageProduitController@create')->name('createimgProduit');
    Route::get('/ImageProduit/edit/{imgid}/{prodid}', 'ImageProduitController@editeimg')->name('editeimgProduit');
    Route::delete('/ImageProduit/delete','ImageProduitController@deleteimg')->name('deleteimg');
    Route::get('/ImageProduit/change/{imgid}/{prodid}', 'ImageProduitController@ChangeimgPrincipale')->name('ChangeimgPrincipale');
    
    
    
});

//Commandes routes
Route::delete('/commande/delete/{id}', 'CommandeController@destroy')->name('commande.destroy');
Route::get('/commande/approve/{id}', 'CommandeController@approve')->name('commande.approve');

//Users routes
Route::get('/admin/user/disable/{id}', 'Admin\UserController@disable')->name('admin.user.disable');
Route::get('/admin/user/enable/{id}', 'Admin\UserController@enable')->name('admin.user.enable');

