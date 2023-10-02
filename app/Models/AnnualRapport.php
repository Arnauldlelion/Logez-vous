<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualRapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'property_id',
        'path',
        'rapport',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
