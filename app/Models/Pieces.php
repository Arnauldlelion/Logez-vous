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

public function pieceType()
{
    return $this->belongsTo(PiecesType::class, 'pieces_types_id');
}

public function pieceImage(){
    return $this->belongsTo(Pieces::class, 'pieces_id');
}
}
