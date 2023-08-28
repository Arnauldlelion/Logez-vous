<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (User::where('name', 'Admin')->count()) {
            return;
        }

        User::create([
            'name' => "Admin",
            'type' => "Admin",
            'email' => 'admin@logezvous.co',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
    }
}
