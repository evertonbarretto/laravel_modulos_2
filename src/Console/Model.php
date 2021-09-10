<?php

namespace evertonbarretto\laravel_modulos_2\Console;

use Illuminate\Console\Command;

class Model extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modulo:make-model {modulo} {entidade}';

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
        $path = "modules//{$this->argument('modulo')}//Models//{$this->argument('entidade')}.php";
        $this->createFile($path,$this->argument('modulo'),$this->argument('entidade'));
        return 0;
    }

    private function createFile($path,$modulo,$entidade)
    {

        $factory = "\n  protected static function newFactory()\n{\n     return \Modules\Cadastro\database\factories\CategoriaFactory::new();\n  }";
        $factory = "";
        $contents =
            "<?php\n\nnamespace Modules\\".$modulo."\\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Database\Eloquent\Factories\HasFactory;\n\nclass ".$entidade." extends Model\n{\n    use HasFactory;".$factory."\n}";


        $myfile = fopen($path, "w") or die("Unable to open file!");
        $txt = $contents;
        fwrite($myfile, $txt);
        fclose($myfile);



    }
}
