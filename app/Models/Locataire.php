<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $fillable = [
        'locataire_id',
        'full name',
        'dateEntree',
        'phone number',
        'email',
        'id card',
        'apartment_id',
    ];
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}


