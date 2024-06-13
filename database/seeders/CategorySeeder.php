<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Landscape',
            'Portrait',
            'Wildlife',
            'Street',
            'Architectural',
            'Fashion',
            'Sports',
            'Macro',
            'Travel',
            'Documentary'
        ];
        foreach ($categories as $cat) {
            $category = new Category();
            $category->name = $cat;
            $category->slug = Str::slug($cat, '-');
            $category->save();
        }
    }
}
