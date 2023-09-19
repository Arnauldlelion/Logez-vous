<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor',
        'furnished',
        'description',
        'monthly_price',
        'number_of_pieces',
        'apt_type_id',
        'property_id',
    ];

    public function property()
    {
    return $this->belongsTo(Property::class);
    }

    public function apartmentType()
    {
    return $this->belongsTo(ApartmentType::class, );
    }


    public function payments()
    {
    return $this->hasMany(Payment::class);
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
    return $this->hasMany(Piece::class, 'apartment_id');
    }


    public function images()
    {
    return $this->hasMany(Image::class, "apartment_id");
    }

    public function coverImage()
    {
    return $this->hasOne(Image::class, "apartment_id")->where('isCover', true);
    }
}
