<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUsersRequest;
use App\Mail\WellcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{


    //Login functions start
    public function get_login(){
        return view('Auth.login');
    }


    public function login(LoginRequest $request){
        $credentials = $request->only('email','password');
        if( Auth::attempt($credentials)){
            if (Auth::user()->role == 'user') {
                return redirect()->intended(route('properties.listing'));
            }else{
                return redirect()->intended(route('get_dashboard'));
            }
        }
        return redirect()->back()->with('error', 'Email ou mot de passe incorrect! Veuilliez reéssayer');

    }

    //Login functions end

    //Register functions start
    public function get_register(){
        return view('Auth.register');
    }

    public function register(RegisterUsersRequest $registerUsersRequest){
        $user = User::create([
            'UserName' => $registerUsersRequest->UserName,
            'email' => $registerUsersRequest->email,
            'departement' => $registerUsersRequest->departement,
            'userCity' => $registerUsersRequest->userCity,
            'tel' => $registerUsersRequest->tel,
            'role' => $registerUsersRequest->role,
            'password' => Hash::make($registerUsersRequest->password)
        ]);

        Mail::send(new WellcomeMail($user));

        return redirect()->route('get_login')->with('success', 'Inscription effectuée avec Succès! Merci de vous Connecter');
    }
    //Register functions end



    //Update user profil functions end
    public function user_edit($id){
        $user = User::find($id);
        return view('Admin.User.edit-profil', [
            'user' => $user,
        ]);
    }

    public function user_update(EditUserRequest $registerUsersRequest, $id){
        $user = User::find($id);
        $user -> update([
            'UserName' => $registerUsersRequest->UserName,
            'email' => $registerUsersRequest->email,
            'departement' => $registerUsersRequest->departement,
            'userCity' => $registerUsersRequest->userCity,
            'tel' => $registerUsersRequest->tel,
            'role' => $registerUsersRequest->role,
            'password' => Hash::make($registerUsersRequest->password)
        ]);
        return redirect()->route('get_clients')->with('success', 'Profil mis à jour avec Succès');
    }
    //Update user profil end

    //Profil
    public function profil(){
        return view('Admin.users-profile');
    }
    //Logout function Start
    public function logout(){
        Auth::logout();
        return redirect()->route('get_login');
    }
     //Logout function End

    //Delete user profil start
    public function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Profil supprimé avec succès');
    }
    //Delete user profil end


}
