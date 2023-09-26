<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    // use HasRoles;

    protected $guard_name = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'about'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function landlords()
    {
        return $this->hasMany(Landlord::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    // Helper functions
    public function profileURL() {
        return asset($this->profile ? '/storage/images/profile/'.$this->profile : 'admin_assets/images/no_user.png');
    }
}
