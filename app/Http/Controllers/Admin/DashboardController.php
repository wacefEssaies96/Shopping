<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\demende;
use App\commande;
use App\Http\Resources\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
         
        $Notification= new Notification;
        $NCD = $Notification->notification();

        return view('admin.indexadmin',[
            'NCD'=>$NCD,
            'user'=>$user
        ]);
    }
    
    public function indexnotification(){
        
        if(Auth::user()->role == 'admin'){
            $user = Auth::user();
            
            $Notification= new Notification;
            $NCD = $Notification->notification();
            // dd($NCD);
            return view('admin.notification.indexnotification',[
                'NCD'=>$NCD,
                'user'=>$user
            ]);
        }
        else{
            
            $produits = Auth::user()->produits()->get();
            return redirect()->route('Produit.index')->with('produits', $produits);

        }

    }
}
