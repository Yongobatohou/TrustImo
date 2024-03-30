<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterParcellesRequest;
use App\Http\Requests\ParcelleRequest;
use App\Models\Parcelle;
use App\Models\ParcelleOption;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ParcelleController extends Controller
{
    public function get_parcelles(){
        $parcelles = Parcelle::all();
        return view('Admin.Parcelles.parcelles', [
            'parcelles' => $parcelles
        ]);
    }

    public function parcelles(FilterParcellesRequest $filterPropertiesRequest){

        $parcelles = Parcelle::query()->orderBy('created_at', 'desc');

        if ($filterPropertiesRequest->validated('ptitle')) {
            $parcelles = $parcelles->where('nom', 'like', "%{$filterPropertiesRequest->validated('ptitle')}%");
        }

        if ($filterPropertiesRequest->validated('pville')) {
            $parcelles = $parcelles->where('ville', 'like', "%{$filterPropertiesRequest->validated('pville')}%");
        }

        if ($pmax = $filterPropertiesRequest->validated('pmax')) {
            $parcelles = $parcelles->where('price', '<=', $pmax);
        }

        if ($surface = $filterPropertiesRequest->validated('psurface')) {
            $parcelles = $parcelles->where('surface', '>=', $surface);
        }

        return view('User.listing_parcelles', [
            'parcelles' => $parcelles->paginate(12),
            'input' => $filterPropertiesRequest->validated()
        ]);
    }

    public function get_add_parcelle(){
        $Parcelle = new Parcelle();
        return view('Admin.Parcelles.add-parcelle', [
            'parcelle' => $Parcelle,
            'options' => ParcelleOption::pluck('name', 'id')
        ]);
    }

    public function add_parcelle(ParcelleRequest $request){
        $parcelle = Parcelle::create([
            'nom' => $request->name,
            'description' => $request->description,
            'surface' => $request->surface,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'price' => $request->price,
        ]);
        $parcelle->parcelle_options()->sync($request->validated('options'));


        return redirect()->route('get_parcelles');
    }


    public function show($slugue, Parcelle $parcelle){

        $parcelleSlug = $parcelle->getSlug();

        if ($slugue != $parcelleSlug) {
            return redirect()->route('parcelle.details', ['slugue' => $parcelleSlug, 'parcelle' => $parcelle]);
        }

        return view('User.parcelle_details', [
            'parcelle' => $parcelle
        ]);

    }


    public function edit_parcelle($id){
        $Parcelle = Parcelle::find($id);
        $value = $Parcelle->parcelle_options()->pluck('id');
        return view('Admin.Parcelles.edit-parcelle', [
            'Parcelle' => $Parcelle,
            'val' => $value,
            'options' => ParcelleOption::pluck('name', 'id')
        ]);
    }

    public function update_parcelle(ParcelleRequest $request, $id){
        $Parcelle = Parcelle::find($id);
        $Parcelle -> update([
            'nom' => $request->name,
            'description' => $request->description,
            'surface' => $request->surface,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        $Parcelle->parcelle_options()->sync($request->validated('options'));

        return redirect()->route('get_parcelles');
    }

    public function delete_parcelle($id){
        $Parcelle = Parcelle::find($id);
        $Parcelle->delete();
        return redirect()->back();
    }
}
