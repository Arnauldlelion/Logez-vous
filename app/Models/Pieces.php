<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieces extends Model
{
    use HasFactory;

    protected $fillable = [
        'pieces_id',
        'number_of_pieces',
        'size',
        'appartment_id',
    ];


    public function appartment()
{
    return $this->belongsTo(Appartment::class);
}
}
