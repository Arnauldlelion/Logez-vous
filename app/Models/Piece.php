<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = [
    'pieces_id',
    'number_of_pieces',
    'size',
    'apartment_id',
    'description',
];


    public function apartment()
    {
    return $this->belongsTo(Apartment::class);
    }

    public function pieceType()
    {
    return $this->belongsTo(PieceType::class, 'piece_types_id');
    }

    // public function pieceImage(){
    // return $this->belongsTo(Piece::class, 'piece_id');
    // }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
