<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTypeFeature extends Model
{
    protected $table = 'property_type_feature';
    protected $fillable = ['property_type_id', 'property_feature_id'];

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function feature()
    {
        return $this->belongsTo(PropertyFeature::class, 'property_feature_id');
    }
}