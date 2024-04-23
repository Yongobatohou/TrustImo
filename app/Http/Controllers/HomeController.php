<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Parcelle;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //Return Home page function
    public function home(){
        $properties = House::orderBy('created_at', 'desc')->limit(3)->get();
        $parcelles = Parcelle::orderBy('created_at', 'desc')->limit(3)->get();
        return view('home', [
            'properties' => $properties,
            'parcelles' => $parcelles,
        ]);


    }

    //Return ProHome page function
    public function pro(){
        return view('ownerInfo');
    }


    public function get_dashboard(){
        
        if (Auth::user()->role == 'admin') {
            $Clients = count(User::all()->where('role', '=', 'user'));
            $owners = count(User::all()->where('role', '=', 'owner'));
            $users = count(User::all());
            $clients = User::orderBy('created_at', 'desc')->limit(10)->get();
            $annonces = count(House::all()) + count(Parcelle::all());
            return view('Admin.dashboard', [
                'Clients' => $Clients,
                'owners' => $owners,
                'users' => $users,
                'annonces' => $annonces,
                'clients' => $clients
            ]);
        }else{
            $annonces = count(House::all()) + count(Parcelle::all());
            $houses = count(House::all());
            $parcelles = count(Parcelle::all());
            return view('Admin.dashboard', [
                'houses' => $houses,
                'parcelles' => $parcelles,
                'annonces' => $annonces,
            ]);
        }
    }


}
