<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('generate:sitemap', function () {
    Artisan::call('sitemap:generate');
    $this->info('Sitemap generated successfully!');
})->purpose('Generate XML Sitemap');