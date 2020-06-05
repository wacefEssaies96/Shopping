<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {

        $Notification= new Notification;
        $NCD = $Notification->notification();
        return view('user-profile-edit',[
            'user' => Auth::user(),
            'NCD'=>$NCD,
        ]);
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
        if($request->hasFile('image')){
            if(!$request->file('image')->isValid()){
                return redirect('/profil')->with('message', "Veuillez selectionner la bonne extension d'\image")
                            ->with('alertType', 'danger');
            }else{
                $directory = 'images/users';
                $f=$request->file('image');
                $ext=$f->extension();
                $name = str_replace('-','', date('d-m-Y-H-i-s-u')) . '.' .$ext;
                $request->file('image')->move(public_path($directory), $name);
                $user->image = 'users/' . $name;
            }
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->adresse = $request->input('adresse');
        $user->phone = $request->input('phone');
        if(!empty($password1)&& $password1==$password2){
            $user->password = Hash::make($password1); 
        }  

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
