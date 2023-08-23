<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Property::count() > 0) {
            return 0;
        }

        $types = [
            'room',
            'studio',
            'appartment'
        ];

        $floors = [
            'first',
            'second',
            'third',
            'fourth',
            'fifth',
            'sixth',
            'seventh',
            'eighth',
            'ninth',
            'tenth',
        ];

        $faker = \Faker\Factory::create();
        $users = User::get();
        $storage_path = storage_path('app/public/properties');
        File::isDirectory($storage_path) or File::makeDirectory($storage_path, 0777, true, true);

        for ($i = 0; $i < 20; $i++) {
            $property = new Property();
            $property->description = $faker->text(100);
            $property->town = $faker->city();
            $property->quarter = $faker->address();
            $property->monthly_price = 240.0;
            $property->size = 3600;
            $property->pieces = 5;
            $property->furnished = true;
            $property->user_id = $users[mt_rand(0, count($users) - 1)]->id;
            $property->type = $types[mt_rand(0, count($types) - 1)];
            $property->floor = $floors[mt_rand(0, count($floors) - 1)];
            $property->save();

            for ($j = 0; $j < mt_rand(1, 3); $j++) {
                $filename = Str::uuid().time().'.png';
                $image = new Image();
                $image->property_id = $property->id;
                if (File::copy(public_path('images/'.mt_rand(1, 6).'.jpg'), storage_path('app/public/properties/'.$filename))) {
                    $image->path = 'properties/'.$filename;
                }
                $image->save();
            }
        }
    }
}
