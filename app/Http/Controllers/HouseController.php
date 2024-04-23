<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterPropertiesRequest;
use App\Http\Requests\HouseRequest;
use App\Models\House;
use App\Models\HouseFeatures;
use App\Models\HouseOption;
use App\Models\Owner;
use App\Models\Parcelle;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    public function get_houses(){
        $maisons = House::all();
        $users = House::all()->where('user_id', '=', Auth::user()->id);
        return view('Admin.Maisons.maisons', [
            'maisons' => $maisons,
            'users' => $users,
        ]);
    }

    public function properties(FilterPropertiesRequest $filterPropertiesRequest){

        $properties = House::query()->orderBy('created_at', 'desc');

        if ($filterPropertiesRequest->validated('title')) {
            $properties = $properties->where('name', 'like', "%{$filterPropertiesRequest->validated('title')}%");
        }

        if ($filterPropertiesRequest->validated('city')) {
            $properties = $properties->where('ville', 'like', "%{$filterPropertiesRequest->validated('ville')}%");
        }

        if ($price = $filterPropertiesRequest->validated('price')) {
            $properties = $properties->where('loyé', '<=', $price);
        }

        if ($surface = $filterPropertiesRequest->validated('surface')) {
            $properties = $properties->where('surface', '>=', $surface);
        }

        if ($filterPropertiesRequest->validated('type')) {
            $properties = $properties->where('name', 'like', "%{$filterPropertiesRequest->validated('type')}%");
        }

        if ($filterPropertiesRequest->validated('operation')) {
            $properties = $properties->where('type', 'like', "%{$filterPropertiesRequest->validated('operation')}%");
        }

        return view('User.listing', [
            'properties' => $properties->paginate(12),
            'input' => $filterPropertiesRequest->validated()
        ]);
    }

    public function get_add_house(){
        $house = new House();
        return view('Admin.Maisons.add-house', [
            'house' => $house,
            'options' => HouseOption::pluck('name', 'id')
        ]);
    }

    public function add_house(HouseRequest $houseRequest){

        $house = House::create([
            'name' => $houseRequest->name,
            'type' => $houseRequest->type,
            'description' => $houseRequest->description,
            'surface' => $houseRequest->surface,
            'ville' => $houseRequest->ville,
            'quartier' => $houseRequest->quartier,
            'image' => $houseRequest->file('image')->store('mains', 'public'),
            'loyé' => $houseRequest->loyé,
            'avance' => $houseRequest->avance,
            'rooms' => $houseRequest->rooms,
            'bedrooms' => $houseRequest->bedrooms,
            'user_id' => Auth::user()->id,
        ]);


        $house->house_options()->sync($houseRequest->validated('options'));

        return redirect()->route('edit_house', $house)->with('success', 'Propriété Ajouté avec Succès! Veuilliez compléter les images');
    }

    public function show($slug, House $property){

        $propertySlug = $property->getSlug();

        if ($slug != $propertySlug) {
            return redirect()->route('properties.details', ['slug' => $propertySlug, 'property' => $property]);
        }

        $pictures = Picture::all();

        return view('User.property_details', [
            'property' => $property,
            'pictures' => $pictures,
            'owner' => User::find($property->user_id)
        ]);

    }

    public function edit_house(House $maison){

        $pictures = Picture::all();
        $value = $maison->house_options()->pluck('id');
        return view('Admin.Maisons.edit-maison', [
            'house' => $maison,
            'val' => $value,
            'pictures' => $pictures,
            'options' => HouseOption::pluck('name', 'id')
        ]);
    }

    public function update_house(HouseRequest $houseRequest,House $house){
        $house -> update([
            'name' => $houseRequest->name,
            'type' => $houseRequest->type,
            'description' => $houseRequest->description,
            'surface' => $houseRequest->surface,
            'ville' => $houseRequest->ville,
            'quartier' => $houseRequest->quartier,
            'loyé' => $houseRequest->loyé,
            'avance' => $houseRequest->avance,
            'rooms' => $houseRequest->rooms,
            'bedrooms' => $houseRequest->bedrooms,
        ]);
        $house->house_options()->sync($houseRequest->validated('options'));

        return redirect()->route('get_houses')->with('success', 'Propriété mise à jour avec Succès');
    }

    public function delete_house(House $maison){
        Storage::disk('public')->delete($maison->id);
        Storage::disk('public')->delete($maison->image);
        $maison->delete();
        return redirect()->back()->with('success', 'Propriété supprimé avec Succès');
    }

}
