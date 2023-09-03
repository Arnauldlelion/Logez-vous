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
        'appartment_id',
    ];

    public function appartment()
{
    return $this->belongsTo(Appartment::class);
}
}
