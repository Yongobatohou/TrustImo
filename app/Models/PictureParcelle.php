<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureParcelle extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'parcelle_id'
    ];

    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }
}
