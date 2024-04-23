<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'surface',
        'ville',
        'quartier',
        'image',
        'loyé',
        'avance',
        'rooms',
        'bedrooms',
        'status',
        'user_id',
    ];

    public function house_options(){
        return $this->belongsToMany(HouseOption::class, 'property_option', 'house_id', 'house_option_id');
    }

    public function getSlug(): string{
        return Str::slug($this->name);
    }

    public function actor()
    {
        return $this->belongsTo(User::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

}
