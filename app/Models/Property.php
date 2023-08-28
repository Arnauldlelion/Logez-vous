<?php

namespace App\Models;

use App\Appartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'slug',
        'accomodation',
        'type',
        'description',
        'location',
        'number_of_rooms',
        'need_tenant',
        'monthly_rent_price',
        'approx_surface_area',
        'furnished',
        'availability_date'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function appartments()
    {
        return $this->hasMany(Appartment::class);
    }


    public function landlord()
    {
        return $this->belongsTo(User::class);
    }
}
