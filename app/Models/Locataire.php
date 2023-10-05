<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $fillable = [
        'locataire_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'apartment_id',
    ];
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}





