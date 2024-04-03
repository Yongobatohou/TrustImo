<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\House;
use App\Models\HouseOption;
use App\Models\Owner;
use App\Models\Parcelle;
use App\Models\ParcelleOption;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerDashController extends Controller
{
    public function index(){
        $owners = count(Owner::all());
        $admins = count(Admin::all());
        $clients = count(User::all());
        $users = $owners + $admins + $clients;
        return view('Owner.dashboard', [
            'clients' => $clients,
            'owners' => $owners,
            'users' => $users
        ]);

    }

    public function get_parcelles(){
        $parcelles = Parcelle::all();
        return view('Owner.Parcelles.parcelles', [
            'parcelles' => $parcelles
        ]);
    }

    public function get_add_parcelle(){
        $parcelle = new Parcelle();
        return view('Owner.Parcelles.add-parcelle', [
            'parcelle' => $parcelle,
            'options' => ParcelleOption::pluck('name', 'id')
        ]);
    }

    public function edit_parcelle($id){
        $Parcelle = Parcelle::find($id);
        $value = $Parcelle->parcelle_options()->pluck('id');
        return view('Owner.Parcelles.edit-parcelle', [
            'Parcelle' => $Parcelle,
            'val' => $value,
            'options' => ParcelleOption::pluck('name', 'id')
        ]);
    }

    public function get_houses(){
        $maisons = House::all();
        return view('Owner.Maisons.maisons', [
            'maisons' => $maisons
        ]);
    }

    public function get_add_house(){
        $house = new House();
        return view('Owner.Maisons.add-house', [
            'house' => $house,
            'options' => HouseOption::pluck('name', 'id')
        ]);
    }

    public function edit_house($id){
        $house = House::find($id);
        $value = $house->house_options()->pluck('id');
        return view('Owner.Maisons.edit-maison', [
            'house' => $house,
            'val' => $value,
            'options' => HouseOption::pluck('name', 'id')
        ]);
    }

}
