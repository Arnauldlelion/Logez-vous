<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'photo',
    //     'video',
    //     'description',
    // ];
    public function getImageUrl() {
        return asset($this->photo ? 'storage/'.$this->photo : 'no_user.png');
    }
}
