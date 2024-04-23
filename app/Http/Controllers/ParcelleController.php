<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterParcellesRequest;
use App\Http\Requests\ParcelleRequest;
use App\Models\Owner;
use App\Models\Parcelle;
use App\Models\ParcelleOption;
use App\Models\Picture;
use App\Models\PictureParcelle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class ParcelleController extends Controller
{
    public function get_parcelles(){
        $parcelles = Parcelle::all();
        $users = Parcelle::all()->where('user_id', '=', Auth::user()->id);
        return view('Admin.Parcelles.parcelles', [
            'users' => $users,
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
        $parcelle = new Parcelle();
        return view('Admin.Parcelles.add-parcelle', [
            'parcelle' => $parcelle,
            'options' => ParcelleOption::pluck('name', 'id')
        ]);
    }

    public function add_parcelle(ParcelleRequest $request){
        $parcelle = Parcelle::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'surface' => $request->surface,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'image' => $request->file('image')->store('mains', 'public'),
            'user_id' => Auth::user()->id,
            'price' => $request->price,
        ]);

        $parcelle->parcelle_options()->sync($request->validated('options'));


        return redirect()->route('edit_parcelle', ['id'=>$parcelle->id])->with('success', 'Parcelle Ajouté avec Succès! Veuilliez compléter les images');
    }


    public function show($slugue, Parcelle $parcelle){

        $parcelleSlug = $parcelle->getSlug();

        if ($slugue != $parcelleSlug) {
            return redirect()->route('parcelle.details', ['slugue' => $parcelleSlug, 'parcelle' => $parcelle]);
        }
        $pictures = PictureParcelle::all();
        return view('User.parcelle_details', [
            'pictures' => $pictures,
            'parcelle' => $parcelle,
            'owner' => User::find($parcelle->id)
        ]);

    }


    public function edit_parcelle(Parcelle $parcelle){
        $value = $parcelle->parcelle_options()->pluck('id');
        $pictures = PictureParcelle::all();
        return view('Admin.Parcelles.edit-parcelle', [
            'Parcelle' => $parcelle,
            'pictures' => $pictures,
            'val' => $value,
            'options' => ParcelleOption::pluck('name', 'id')
        ]);
    }

    public function update_parcelle(ParcelleRequest $request, Parcelle $Parcelle){

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

        return redirect()->route('get_parcelles')->with('success', 'Parcelle mise à jour avec Succès');
    }

    public function delete_parcelle(Parcelle $Parcelle){
        Storage::disk('public')->delete($Parcelle->id);
        Storage::disk('public')->delete($Parcelle->image);
        $Parcelle->delete();
        return redirect()->back()->with('success', 'Parcelle supprimé avec Succès');
    }
}
