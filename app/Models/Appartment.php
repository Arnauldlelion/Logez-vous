<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartment extends Model
{
    use HasFactory;
    protected $table = 'appartments';
    protected $fillable = [
        'floor',
        'furnished',
        'description',
        'monthly_price',
        'number_of_appartments',
        'apt_type_id',
        'property_id',
    ];

     public function property()
{
    return $this->belongsTo(Property::class);
}

public function appartmentType()
{
    return $this->belongsTo(AppartmentType::class);
}


public function paiements()
{
    return $this->hasMany(Paiement::class);
}

public function locataire()
{
    return $this->belongsTo(Locataire::class);
}

public function rapportDeGestions()
{
    return $this->hasMany(RapportDeGestion::class);
}

public function pieces()
{
    return $this->hasMany(Piece::class);
}


public function propertiesImages()
{
    return $this->hasManyThrough(PropertiesImage::class, Piece::class);
}

}
