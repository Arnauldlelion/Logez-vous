<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'title',
        'description',
    ];

    public function getImageUrl() {
        return asset($this->logo ? 'storage/'.$this->logo : 'no_user.png');
    }
}
