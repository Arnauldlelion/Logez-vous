<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $usersData = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => now(),
                'phone' => '1234567890',
                'type' => 'landlord',
                'subscribed' => true,
                'password' => Hash::make('password'),
                'remember_token' => null,
            ],
            // Add more user data as needed
        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}