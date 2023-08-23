<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storage::deleteDirectory('properties');
        // return;

        if(User::count() > 0) {
            return ;
        }

        $types = [
            'normal',
            'agent',
            'landlord',
            'admin',
            'team'
        ];
        $faker = \Faker\Factory::create();

        for($i = 0; $i<5; $i++) {
            $user = new User();
            $user->name = $faker->name();
            $user->email = $faker->email();
            $user->phone = $faker->phoneNumber();
            $user->type = $types[mt_rand(0, count($types) - 1)];
            $user->subscribed = true;
            $user->password = Hash::make('password');
            $user->save();
        }
    }
}
