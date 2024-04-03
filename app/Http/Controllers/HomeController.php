<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Parcelle;

class HomeController extends Controller
{
    //Return Home page function
    public function home(){
        $properties = House::orderBy('created_at', 'desc')->limit(3)->get();
        $parcelles = Parcelle::orderBy('created_at', 'desc')->limit(3)->get();
        return view('home', [
            'properties' => $properties,
            'parcelles' => $parcelles
        ]);
    }

    //Return ProHome page function
    public function pro(){
        return view('ownerInfo');
    }


}
