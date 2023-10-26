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
        'number_of_apartments',
        'location',
        'apartmentType',
        'landlord_id',
    ];


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function amenities(){
        return $this->belongstoMany(Amenity::class, 'property_amenity','property_id','amenity_id');
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }


    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    
    public function gestionnaire()
    {
        return $this->belongsTo(Admin::class);
    }

   
    public function apartmentTypes()
    {
        return $this->belongsToMany(ApartmentType::class)->withTimestamps();
    }

  
}
