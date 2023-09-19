<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'admin_id',
        'slug',
        'name',
        'location',
        'apartmentType',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class, 'property_id');
    }


    public function landlord()
    {
        return $this->belongsTo(User::class);
    }

    public function apartmentTypes()
    {
        return $this->belongsToMany(ApartmentType::class);
    }
}
