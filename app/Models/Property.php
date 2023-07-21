<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'property_type_feature', 'property_id', 'property_feature_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

}
