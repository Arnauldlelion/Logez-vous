<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $fillable = ['name', 'description'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'property_type_feature', 'property_type_id', 'property_feature_id');
    }
}