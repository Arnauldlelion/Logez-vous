<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyApartmentType extends Model
{
    use HasFactory;

    protected $table = 'property_apartment_types';
    protected $fillable = ['property_id', 'apartment_type_id'];
}
