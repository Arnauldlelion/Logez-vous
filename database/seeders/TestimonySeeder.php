<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Testimonial::count() > 0) {
            return;
        }

        $storage_path = storage_path('app/public/testimonial');
        File::isDirectory($storage_path) or File::makeDirectory($storage_path, 0777, true, true);
        $faker = \Faker\Factory::create();

        for($i=0; $i < 5; $i++) {
            $filename = Str::uuid().time().'.png';
            $testimonial = new Testimonial();
            $testimonial->video = $faker->url();
            if (File::copy(public_path('images/'.mt_rand(1, 6).'.jpg'), storage_path('app/public/testimonial/'.$filename))) {
                $testimonial->photo = 'testimonial/'.$filename;
            }
            $testimonial->description = $faker->text(100);
            $testimonial->save();
        }
    }
}
