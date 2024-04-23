<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    public function get_clients(){
        $clients = User::all();
        return view('Admin.User.clients', [
            'clients' => $clients,
        ]);
    }

    //Profil
    public function profil(){
        return view('User.profil');
    }

    public function user_update(EditUserRequest $registerUsersRequest, $id){
        $user = User::find($id);
        $user -> update([
            'UserName' => $registerUsersRequest->UserName,
            'email' => $registerUsersRequest->email,
            'departement' => $registerUsersRequest->departement,
            'userCity' => $registerUsersRequest->userCity,
            'tel' => $registerUsersRequest->tel,
        ]);
        return redirect()->back()->with('success', 'Profil mis à jour avec Succès');
    }

    public function user_pass_update(EditUserRequest $registerUsersRequest, $id){
        $user = User::find($id);
        $user -> update([
            'password' => Hash::make($registerUsersRequest->password)
        ]);
        return redirect()->back()->with('success', 'Mot de passe modifié avec Succès');
    }
}
