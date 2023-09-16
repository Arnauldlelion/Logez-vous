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

        // if (User::where('last_name', 'Admin')->count()) {
        //     return;
        // }

        // User::create([
        //     'first_name' => "Admin",
        //     'last_name' => "Admin",
        //     'type' => "Admin",
        //     'email' => 'admin@logezvous.co',
        //     'password' => \Illuminate\Support\Facades\Hash::make('password'),
        // ]);
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
