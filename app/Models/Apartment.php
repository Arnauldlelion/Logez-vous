<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'floor',
        'furnished',
        'description',
        'monthly_price',
        'number_of_pieces',
        'size',
        'apt_type_id',
        'property_id',
    ];

    public function property()
    {
    return $this->belongsTo(Property::class);
    }

    public function apartmentType()
    {
        return $this->belongsTo(ApartmentType::class, 'apt_type_id');
    }


    public function payments()
    {
    return $this->hasMany(Payment::class);
    }


    public function locataire()
    {
        return $this->hasOne(Locataire::class);
    }

    public function AnnualRapportDeGestions()
    {
    return $this->hasMany(AnnualRapport::class);
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
        return $this->morphMany(Image::class, 'imageable');
    }

    public function coverImage()
    {
        return $this->hasOne(Image::class, 'imageable_id')->where('isCover', true);
    }
}
