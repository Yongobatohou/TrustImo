<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function store(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            $picture = new Picture();
            $picture->house_id = $id;
            $picture->path = $request->file('images')->store('houses/'.$id, 'public');
            $picture->save();

        return redirect()->back();
    }


    public function destroy( $id)
    {
        $picture = Picture::find($id);
        Storage::disk('public')->delete($picture->path);
        $picture->delete();

        return redirect()->back();
    }

}
