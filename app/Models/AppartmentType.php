<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppartmentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'apt_type_id',
        'name',
    ];

    public function appartments()
{
    return $this->hasMany(Appartment::class);
}
}
