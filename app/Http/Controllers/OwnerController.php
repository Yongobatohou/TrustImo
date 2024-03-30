<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function get_agences(){
        $owners = Owner::all();
        return view('Admin.Annonceurs.agences', [
            'owners' => $owners,
        ]);
    }

    public function get_owner_login(){
        return view('Owner.login-owner');
    }

    public function login(LoginRequest $loginRequest){
        $credentials = $loginRequest->only('email','password');
        if(Auth::guard('owner')->attempt($credentials)){
            return redirect()->route('pro');
        }
        return back()->withErrors(['loginError' => "Email ou mot de passe incorrect."]);
    }

    public function get_add_owner(){
        return view('Admin.Annonceurs.add-owner');
    }

    public function add_owner(OwnerRequest $ownerRequest){
        $file = $ownerRequest->file('avatar');
        $nom_fil = $ownerRequest->OwnerName . '.' . $file->getClientOriginalExtension();
        Owner::create([
            'OwnerName' => $ownerRequest->OwnerName,
            'email' => $ownerRequest->email,
            'departement' => $ownerRequest->departement,
            'OwnerCity' => $ownerRequest->OwnerCity,
            'tel' => $ownerRequest->tel,
            'status' => $ownerRequest->status,
            'avatar' => $file->storeAs('avatars', $nom_fil),
            'password' => Hash::make($ownerRequest->password)
        ]);

        return redirect()->route('get_agences');
    }

    public function edit_owner_profil($id){
        $profil = Owner::find($id);
        return view('Admin.Annonceurs.edit-owner', [
            'profil' => $profil,
        ]);
    }

    public function uptodate_owner_profil(OwnerRequest $ownerRequest, $id){
        $owner = Owner::find($id);
        $owner -> update([
            'OwnerName' => $ownerRequest->OwnerName,
            'email' => $ownerRequest->email,
            'departement' => $ownerRequest->departement,
            'OwnerCity' => $ownerRequest->OwnerCity,
            'tel' => $ownerRequest->tel,
            'status' => $ownerRequest->status,
            'password' => Hash::make($ownerRequest->password)
        ]);

        if($ownerRequest->hasFile('avatar')){
            $file = $ownerRequest->file('avatar');
            $nom_fil = $ownerRequest->OwnerName . '.' . $file->getClientOriginalExtension();
            $owner->avatar = $file->storeAs('avatars', $nom_fil);
            $owner->save();
          }
        return redirect()->route('get_agences');
    }

    public function delete_owner_profil($id){
        $owner = Owner::find($id);
        $owner->delete();
        return redirect()->back();
    }


    //Logout function Start
    public function logout(){
        Auth::guard('owner')->logout();
        return redirect()->route('get_owner_login');
    }
     //Logout function End
}
