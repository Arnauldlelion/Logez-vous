<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportDeGestion extends Model
{
    use HasFactory;

    protected $dates = ['annee_construction'];
    protected $fillable = [
        'Rapport_id',
        'annee_construction',
        'nombreDeLocataire',
        'dureeDuLocataire',
        'requete des locataires',
        'apartment_id',
    ];
    public function apartment()
{
    return $this->belongsTo(Apartment::class);
}
}
