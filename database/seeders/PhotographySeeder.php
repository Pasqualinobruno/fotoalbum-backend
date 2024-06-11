<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Photography;

class PhotographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 2; $i++) {
            $photo = new Photography();
            $photo->name = $faker->words(3, true);
            $photo->image = $faker->imageUrl(640, 480, 'summer', true, $photo->name, true, 'jpg');
            $photo->description = $faker->paragraph(30, true);
            $photo->upload_image = $faker->date();
            $photo->evidence = $faker->boolean(50);
            $photo->city = $faker->city();
            $photo->save();
        }
    }
}
