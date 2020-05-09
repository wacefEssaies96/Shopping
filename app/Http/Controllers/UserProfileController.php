<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('user-profile-edit',['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $test = User::where('email', '=', $request->input('email'))
                        ->where('email', '!=', $user->email)
                        ->get();
        if($test != null && $test->count()>0){
            return redirect('/profil')->with('message', 'Cette adresse email existe déjà')
            ->with('alertType', 'danger');
        }
        
        $test = User::where('phone', '=', $request->input('phone'))
                        ->where('phone', '!=', $user->phone)
                        ->get();
        if($test != null && $test->count()>0){
            return redirect('/profil')->with('message', 'Cette adresse email existe déjà')
            ->with('alertType', 'danger');
        }
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');
        if(!empty($password1)){
            if(empty($password2)){
                return redirect('/profil')->with('message', 'Veuillez retaper le mot de passe')
                        ->with('alertType', 'danger');
            }
            if($password1 != $password2){
                return redirect('/profil')->with('message', 'Mots de passe différents !')
                        ->with('alertType', 'danger');
            }
            if(strlen($password1) < 8){
                return redirect('/profil')->with('message', 'Mot de passe trop court. Min. 8 caractères')
                        ->with('alertType', 'danger');
            }
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->adresse = $request->input('adresse');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($password1);

        $user->update();
        return redirect('/profil')->with('message', 'Profil mis à jour avec succès')
                                    ->with('alertType', 'success');
    }

    public function disable(Request $request)
    {
        $user = Auth::user();
        $user->etat = 0;
        $user->update();
        
        Auth::logout();
        return redirect('/')->with('message', 'Votre compte a été désactivé, contactez l\'administrateur pour le réactiver !')
        ->with('alertType', 'success');
    }
}
