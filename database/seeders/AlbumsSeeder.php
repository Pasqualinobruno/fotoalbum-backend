<?php

namespace Database\Seeders;

use App\Models\Albums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            'Sunset Dreams',
            'Urban Exploration',
            'Nature\'s Wonders',
            'City Lights',
            'Wildlife Adventures',
            'Travel Diaries',
            'Architectural Marvels',
            'Street Stories',
            'Portraits of Life',
            'Beach Bliss'
        ];
        foreach ($albums as $album) {

            $newAlbum = new Albums();
            $newAlbum->name = $album;
            $newAlbum->upload_album = now();
            $newAlbum->save();
        }
    }
}
