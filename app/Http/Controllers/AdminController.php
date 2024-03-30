<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function get_dashboard(){
        $owners = count(Owner::all());
        $admins = count(Admin::all());
        $clients = count(User::all());
        $users = $owners + $admins + $clients;
        return view('Admin.dashboard', [
            'clients' => $clients,
            'owners' => $owners,
            'users' => $users
        ]);
    }

    public function get_admin(){
        $admins = Admin::all();
        return view('Admin.admin.administrateurs',[
            'admins' => $admins,
        ]);
    }

    public function get_admin_login(){
        return view('Admin.admin.login');
    }

    public function login(LoginRequest $loginRequest){
        $credentials = $loginRequest->only('email','password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('get_dashboard');
        }
        return back()->withErrors(['loginError' => "Email ou mot de passe incorrect."]);
    }

    public function get_add_admin(){
        return view('Admin.admin.add-admin');
    }

    public function add_admin(AdminRequest $adminRequest){
        Admin::create([
            'adminName' => $adminRequest->adminName,
            'adminTel' => $adminRequest->adminTel,
            'email' => $adminRequest->email,
            'password' => Hash::make($adminRequest->password),
        ]);

        return redirect()->route('get_admins');
    }

    public function edit_profil($id){
        $profil = Admin::find($id);
        return view('Admin.admin.edit-profil', [
            'profil' => $profil,
        ]);
    }

    public function uptodate(AdminRequest $adminRequest, $id){
        $admin = Admin::find($id);
        $admin -> update([
            'adminName' => $adminRequest->adminName,
            'adminTel' => $adminRequest->adminTel,
            'email' => $adminRequest->email,
            'password' => Hash::make($adminRequest->password),
        ]);
        return redirect()->route('get_admins');
    }

    public function deleteit($id){
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->back();
    }

    //Logout function Start
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('get_admin_login');
    }
     //Logout function End

}
