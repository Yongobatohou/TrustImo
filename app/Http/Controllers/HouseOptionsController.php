<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseOptionRequest;
use App\Models\HouseOption;

class HouseOptionsController extends Controller
{
    public function get_options(){
        $options = HouseOption::all();
        return view('Admin.Maisons.Options.options', [
            'options' => $options
        ]);
    }

    public function get_add_option(){
        return view('Admin.Maisons.Options.add-option');
    }

    public function add_option(HouseOptionRequest $houseOptionRequest){
        HouseOption::create([
            'name' => $houseOptionRequest->name,
        ]);

        return redirect()->route('get_options');
    }

    public function edit_option($id){
        $option = HouseOption::find($id);
        return view('Admin.Maisons.Options.edit-option', [
            'option' => $option,
        ]);
    }

    public function update_option(HouseOptionRequest $houseOptionRequest, $id){
        $option = HouseOption::find($id);
        $option -> update([
            'name' => $houseOptionRequest->name,
        ]);
        return redirect()->route('get_options');
    }

    public function delete_option($id){
        $option = HouseOption::find($id);
        $option -> delete();
        return redirect()->route('get_options');
    }

}
