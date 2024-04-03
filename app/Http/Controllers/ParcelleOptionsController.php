<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseOptionRequest;
use App\Models\ParcelleOption;
use Illuminate\Http\Request;

class ParcelleOptionsController extends Controller
{
    public function get_parcel_options(){
        $options = ParcelleOption::all();
        return view('Admin.Parcelles.Options.options', [
            'options' => $options
        ]);
    }

    public function get_add_parcel_option(){
        return view('Admin.Parcelles.Options.add-option');
    }

    public function add_parcel_option(HouseOptionRequest $request){
        ParcelleOption::create([
            'name' => $request->name,
        ]);

        return redirect()->route('get_parcel_options');
    }

    public function edit_parcel_option($id){
        $option = ParcelleOption::find($id);
        return view('Admin.Parcelles.Options.edit-option', [
            'option' => $option,
        ]);
    }

    public function update_parcel_option(HouseOptionRequest $request, $id){
        $option = ParcelleOption::find($id);
        $option -> update([
            'name' => $request->name,
        ]);
        return redirect()->route('get_parcel_options');
    }

    public function delete_parcel_option($id){
        $option = ParcelleOption::find($id);
        $option -> delete();
        return redirect()->route('get_parcel_options');
    }
}
