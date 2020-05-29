<?php

namespace App\Http\Controllers\Admin;
 
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Notification;

class UserController extends Controller
{
    public function usered(){
        $Notification= new Notification;
        $NCD = $Notification->notification();
        $users=User::all();
        return view('admin.user.user',[
            'users'=>$users,
            'NCD'=>$NCD
        ]);
    }
    

    public function useredit(Request $request,$id){

        $users = User::findOrFail($id);
        return view ('admin.user.user-edit')->with('users', $users) ; 
    }
    public function userupdate(Request $request,$id){
        $users=User::find($id);
        $users->name =$request->input('name');
        $users->role =$request->input('role');
        $users->update();
        return redirect('/admin/user')->with('message','mise à jour effectué aves success')
                                        ->with('alertType', 'success');
    }
    public function userdelete($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/admin/user')->with('message','user supprimée!')
                                        ->with('alertType', 'success');
    }

    /**
     * Disable spectific account
     */
    public function disable(Request $request, $id)
    {
        $user = User::find($id);
        $user->etat = 0;
        $user->save();
        return redirect('/admin/user')->with('message' , 'Compte désactivé avec succès !')
                                        ->with('alertType', 'success');
    }

    /**
     * Enable spectific account
     */
    public function enable(Request $request, $id)
    {
        $user = User::find($id);
        $user->etat = 1;
        $user->save();
        return redirect('/admin/user')->with('message' , 'Compte activé avec succès !')
                                        ->with('alertType', 'success');
    }
}
