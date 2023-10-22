<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Landlord extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name', 'email', 'password', 'phone',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    // public function getLocataireByApartmentId($apartmentId)
    // {
    //     return Locataire::whereHas('apartment.property', function ($query) use ($apartmentId) {
    //         $query->where('landlord_id', $this->id)
    //             ->where('id', $apartmentId);
    //     })->first();
    // }
    // public function getLocatairesByApartmentId($apartmentId)
    // {
    //     return Locataire::whereHas('apartment.property', function ($query) use ($apartmentId) {
    //         $query->where('landlord_id', $this->id)
    //             ->where('id', $apartmentId);
    //     })->get();
    // }
    public function getLocatairesByApartmentId($apartmentId)
    {
        return Locataire::whereHas('apartment.property', function ($query) use ($apartmentId) {
            $query->where('landlord_id', $this->id)
                ->where('id', $apartmentId);
        })->where('is_approved', 1)->get();
    }

}
