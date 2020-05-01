<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
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
