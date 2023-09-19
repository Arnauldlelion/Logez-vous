<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceType extends Model
{
    use HasFactory;
    protected $fillable = [
        'piece_type_id',
        'description',
        'piecs_id',
        
    ];
    public function pieces()
    {
        return $this->hasMany(Piece::class, 'piece_types_id');
    }
}
