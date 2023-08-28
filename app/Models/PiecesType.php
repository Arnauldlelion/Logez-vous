<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiecesType extends Model
{
    use HasFactory;

    protected $fillable = [
        'pieces_types_id',
        'description',
        'pieces_id',
        
    ];
    public function pieces()
{
    return $this->hasMany(Piece::class);
}
}
