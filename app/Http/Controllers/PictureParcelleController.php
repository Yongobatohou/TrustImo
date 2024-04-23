<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use App\Models\PictureParcelle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureParcelleController extends Controller
{
    public function store(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            $picture = new PictureParcelle();
            $picture->parcelle_id = $id;
            $picture->path = $request->file('images')->store('parcelles/'.$id, 'public');
            $picture->save();

        return redirect()->back();
    }


    public function destroy( $id)
    {
        $picture = PictureParcelle::find($id);
        Storage::disk('public')->delete($picture->path);
        $picture->delete();

        return redirect()->back();
    }
}
