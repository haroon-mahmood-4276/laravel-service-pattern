<?php

namespace HaroonMahmood4276\LaravelServicePattern;

use HaroonMahmood4276\LaravelServicePattern\Commands\CreateServiceClass;
use Illuminate\Support\ServiceProvider;

class PatternServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateServiceClass::class,
            ]);
        }
    }

    public function register()
    {
    }
}
