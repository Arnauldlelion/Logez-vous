<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'url',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class); //one or more images belongs to one property
    }

    public function pieces()
    {
        return $this->belongsToMany(Piece::class, 'images');
    }

    public function getImageUrl()
    {
        return asset($this->url ? 'storage/' . $this->url : 'no_user.png');
    }
}