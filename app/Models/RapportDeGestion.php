<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportDeGestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'Rapport_id',
        'annee construction',
        'nombreDeLocataire',
        'dureeDuLocataire',
        'requete des locataires',
        'appartment_id',
    ];
    public function appartment()
{
    return $this->belongsTo(Appartment::class);
}
}
