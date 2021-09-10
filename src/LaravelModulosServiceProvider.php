<?php
namespace evertonbarretto\laravel_modulos_2;

use Carbon\Laravel\ServiceProvider;
use evertonbarretto\laravel_modulos_2\Console\Controller;
use evertonbarretto\laravel_modulos_2\Console\Migration;
use evertonbarretto\laravel_modulos_2\Console\Model;
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
            Modulo::class,
            Model::class,
            Controller::class,
            Migration::class,
        ]);

        $this->loadRoutesFrom('../routes/web.php');

        $mainPath = database_path('database/migrations');
        $directories = glob( base_path().'/Modules/*/database/migrations' , GLOB_ONLYDIR);
        $paths = array_merge([$mainPath], $directories);
        $this->loadMigrationsFrom($paths);
    }
}
