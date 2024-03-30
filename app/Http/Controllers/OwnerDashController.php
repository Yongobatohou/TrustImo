<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerDashController extends Controller
{
    public function index(){
        return view('Owner.Maisons.maisons');
    }

}
