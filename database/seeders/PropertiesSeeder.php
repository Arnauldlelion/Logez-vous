<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\User;
use App\Models\Image;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Get all user IDs
         $userIds = User::pluck('id');
          // Generate test properties
        $propertyData = [
            [
                'type' => 'room',
                'image' => 'salon1.jpg',
                'description' => 'a very confortable appartment.',
                'town' => 'Douala',
                'quarter' => 'Bonamousadi',
                'monthly_price' => 150000,
                'size' => 100,
                'pieces' => 4,
                'furnished' => true,
                'floor' => 'first',
            ],
            // Add more properties as needed
        ];

          // Create properties
          foreach ($propertyData as $data) {
            $property = new Property($data);
            $property->user_id = $userIds->random();
            $property->save();

            // Create associated images
            $image = new Image(['url' => $data['image']]);
            $property->images()->save($image);
        }
    }

}
