<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'blogname',
                'value' => 'BlogSystem'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome to BlogSystem!'
            ],
            [
                'name' => 'caption',
                'value' => 'BlogSystem is a simple blog system with Laravel and Bootstrap.'
            ],
            [
                'name' => 'ads_wight',
                'value' => 'adsense 1'
            ],
            [
                'name' => 'ads_header',
                'value' => 'adsense 2'
            ],
            [
                'name' => 'ads_footer',
                'value' => 'adsense 3'
            ],
            [
                'name' => 'phone',
                'value' => '+6281234567890'
            ],
            [
                'name' => 'email',
                'value' => 'QW8kA@example.com'
            ],
            [
                'name' => 'facebook',
                'value' => 'https://facebook.com'
            ],
            [
                'name' => 'instagram',
                'value' => 'https://instagram.com'
            ],
            [
                'name' => 'youtube',
                'value' => 'https://youtube.com'
            ],
            [
                'name' => 'footer',
                'value' => 'BlogSystem'
            ]
        ]);
    }
}
