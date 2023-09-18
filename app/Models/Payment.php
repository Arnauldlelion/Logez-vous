<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paiement_id',
        'commission',
        'price',
        'apartment_id',
    ];

    public function apartment()
{
    return $this->belongsTo(Apartment::class);
}
}
