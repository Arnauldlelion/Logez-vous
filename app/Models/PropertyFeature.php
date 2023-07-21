<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    protected $fillable = ['name', 'description'];

    public function types()
    {
        return $this->belongsToMany(PropertyType::class, 'property_type_feature', 'property_feature_id', 'property_type_id');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_type_feature', 'property_feature_id', 'property_id');
    }
}
