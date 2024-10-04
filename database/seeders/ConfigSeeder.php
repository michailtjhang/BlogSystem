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
                'value' => 'https://images.unsplash.com/photo-1704299059700-268345bcb6bd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
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
