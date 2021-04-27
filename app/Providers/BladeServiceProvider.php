<?php

namespace App\Providers;

use App\View\Components\Box;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component('box', Box::class);
    }
}
