<?php

namespace evertonbarretto\laravel_modulos_2\Console;

use Illuminate\Console\Command;

class Modulo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modulo:make {nome}';

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

        if (dir(app_path().'//modules')){
            mkdir('modules');
        }

        $raiz = 'modules/'.$this->argument('nome').'/';
        $pastas[] = $raiz.'FiltersMaps';
        $pastas[] = $raiz.'Http';
        $pastas[] = $raiz.'Http/Controllers';
        $pastas[] = $raiz.'Database';
        $pastas[] = $raiz.'Database/migrations';
        $pastas[] = $raiz.'Database/factories';
        $pastas[] = $raiz.'Models';
        $pastas[] = $raiz.'Providers';
        $pastas[] = $raiz.'Repositories';
        $pastas[] = $raiz.'routes';
        $pastas[] = $raiz.'Services';
        $pastas[] = $raiz.'Tests';


        mkdir($raiz);
        foreach ($pastas as $pasta)
        {
            mkdir($pasta);
        }
        $this->createFile('Modulos//'.$this->argument('nome').'//routes//web.php');

        return 1;
    }

    private function createFile($path)
    {
        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = "<?php\n";
        fwrite($myfile, $txt);
        $txt = "use Illuminate\Support\Facades\Route;\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    }
}
