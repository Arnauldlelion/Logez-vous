<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'apt_type_id',
        'name',
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
