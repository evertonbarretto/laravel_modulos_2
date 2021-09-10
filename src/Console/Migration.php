<?php

namespace evertonbarretto\laravel_modulos_2\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Migration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modulo:make-migration {modulo} {migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call("artisan make:migration {$this->argument('migration')} --path=modules//{$this->argument('modulo')}//Database//migrations");
        return "Migration criado com sucesso";
    }


}
