<?php

namespace App\Models;

use App\Models\Appartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'slug',
        'name',
        'location',
        'appartmentType',
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
