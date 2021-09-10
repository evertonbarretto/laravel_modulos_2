<?php

namespace evertonbarretto\laravel_modulos_2\Console;

use Illuminate\Console\Command;

class Controller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modulo:make-controller {modulo} {controller}';

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
        $path = "modules//{$this->argument('modulo')}//Http//Controllers//{$this->argument('controller')}.php";
        $this->createFile($path,$this->argument('modulo'),$this->argument('controller'));
        return 0;
    }

    private function createFile($path,$modulo,$controller)
    {
        $contents = "<?php\n\n";
        $contents.= "namespace Modules\\".$modulo."\\Http\\Controllers;\n\n";
        $contents.= "use Illuminate\Http\Request;\n";
        $contents.= "use Illuminate\Routing\Controller;\n\n";
        $contents.= "class ".$controller." extends Controller\n";
        $contents.="{\n\n";
        $contents.="}\n";

        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = $contents;
        fwrite($myfile, $txt);
        fclose($myfile);


    }
}
