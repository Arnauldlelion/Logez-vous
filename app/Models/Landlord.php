<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name', 'email', 'password', 'phone',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
