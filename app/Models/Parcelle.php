<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Parcelle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'surface',
        'ville',
        'quartier',
        'image',
        'price',
        'status',
        'user_id',
];


public function parcelle_options(){
    return $this->belongsToMany(ParcelleOption::class, 'parcel_option', 'parcelle_id', 'parcelle_option_id');
}

public function getSlug(): string{
    return Str::slug($this->nom);
}

public function actor()
{
    return $this->belongsTo(User::class);
}

}
