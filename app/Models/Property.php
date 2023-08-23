<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'description',
        'town',
        'quarter',
        'monthly_price',
        'size',
        'pieces',
        'furnished',
        'floor'
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'property_id');
    }

    public function landlord()
    {
        return $this->belongsTo(User::class);
    }

    public function featured()
    {
        return ($this->images)[0]->path;
    }
}
