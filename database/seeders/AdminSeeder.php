<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Admin::count() > 0) {
            return;
        }

        $admin = Admin::create([
            'name'     => 'Syst Admin',
            'email'    => 'admin@logezvous.co',
            'password' => Hash::make('password'),
            'super_admin' => true
        ]);
    }
}
