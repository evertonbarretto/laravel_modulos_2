<?php
namespace evertonbarretto\laravel_modulos_2;

use Carbon\Laravel\ServiceProvider;
use evertonbarretto\laravel_modulos_2\Console\Modulo;

class LaravelModulosServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->commands([
            Modulo::class
        ]);
    }
}
