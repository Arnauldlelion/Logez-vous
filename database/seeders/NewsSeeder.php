<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(News::count() > 0) {
            return;
        }

        $faker = \Faker\Factory::create();
        $storage_path = storage_path('app/public/news');
        File::isDirectory($storage_path) or File::makeDirectory($storage_path, 0777, true, true);

        for($i =0; $i < 5; $i++) {
            $news = new News();
            $news->name = $faker->name;
            $news->title = $faker->text(30);
            $news->description = $faker->text(100);
            $filename = Str::uuid().time().'.png';
            if (File::copy(storage_path('app/public/images/logos/logo'.mt_rand(1, 3).'.png'), storage_path('app/public/news/'.$filename))) {
                $news->logo = 'news/'.$filename;
            }
            $news->save();
        }
    }
}
