<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    //Login functions start
    public function get_login(){
        return view('Auth.login');
    }


    public function login(LoginRequest $request){
        $credentials = $request->only('email','password');
        if( Auth::guard('web')->attempt($credentials)){
            return redirect()->route('properties.listing');
        }
        return redirect()->back()->withErrors($credentials);

    }

    //Login functions end

    //Register functions start
    public function get_register(){
        return view('Auth.register');
    }

    public function register(RegisterUsersRequest $registerUsersRequest){
        User::create([
            'UserName' => $registerUsersRequest->UserName,
            'email' => $registerUsersRequest->email,
            'departement' => $registerUsersRequest->departement,
            'userCity' => $registerUsersRequest->userCity,
            'tel' => $registerUsersRequest->tel,
            'password' => Hash::make($registerUsersRequest->password)
        ]);

        return redirect()->route('get_login');
    }
    //Register functions end

    //Update user profil functions end
    public function user_edit($id){
        $user = User::find($id);
        return view('Admin.User.edit-profil', [
            'user' => $user,
        ]);
    }

    public function user_update(RegisterUsersRequest $registerUsersRequest, $id){
        $user = User::find($id);
        $user -> update([
            'UserName' => $registerUsersRequest->UserName,
            'email' => $registerUsersRequest->email,
            'departement' => $registerUsersRequest->departement,
            'userCity' => $registerUsersRequest->userCity,
            'tel' => $registerUsersRequest->tel,
            'password' => Hash::make($registerUsersRequest->password)
        ]);
        return redirect()->route('get_clients');
    }
    //Update user profil end

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
        return redirect()->back();
    }
    //Delete user profil end


}
