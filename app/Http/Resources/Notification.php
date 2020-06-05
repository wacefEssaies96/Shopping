<?php

namespace App\Http\Resources;

use App\demende;
use App\commande;
use App\User;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Notification
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function notification(){

        
        if(Auth::user()->role == 'admin'){
            $attenteCommandes= commande::attenteCommandes()->get();
            $accepteeCommandes= commande::accepteeCommandes()->get();

            $attenteDemandes= demende::attenteDemandes()->get();
            $accepteeDemandes= demende::accepteeDemandes()->get();

            $Comnotifications= commande::Attentecommandes()->get();
            $Demnotifications=demende::Demandesnotifications()->get(); 
            
            $notification = 0;
            $user = Auth::user();
            $TDAC = 0;
            $TDEA = 0;
            $TCAC = 0;
            $TCEA = 0;


            foreach($attenteCommandes as $item){
                $TCAC  += 1;
            }
            foreach($attenteCommandes as $item){
                $TCEA  += 1;
            }

            foreach($accepteeDemandes as $item){
                $TDAC  += 1;
            }
            foreach($attenteDemandes as $item){
                $TDEA  += 1;
            }

            
            foreach($Comnotifications as $item){
                $notification   += 1;
            }
            foreach($Demnotifications as $item){
                $notification   += 1;
            }

            $NCD['Demnotifications']=$Demnotifications;
            $NCD['Comnotifications']=$Comnotifications;
            $NCD['notification']=$notification;

            $NCD['attenteDemandes']=$attenteDemandes;
            $NCD['attenteCommandes']=$attenteCommandes;
            $NCD['accepteeDemandes']=$accepteeDemandes;
            $NCD['accepteeCommandes']=$accepteeCommandes;
            $NCD['TDAC']=$TDAC;
            $NCD['TCAC']=$TCAC;
            $NCD['TDEA']=$TDEA;
            $NCD['TCEA']=$TCEA;
            $NCD['user']=$user;

            $produitnotification=Produit::all();
            $usernotification=User::all();
            $NCD['produitnotification']=$produitnotification;
            $NCD['usernotification']=$usernotification;
            return $NCD;
        }
    }
}
