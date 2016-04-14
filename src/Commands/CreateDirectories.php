<?php namespace Cviebrock\LaravelMangopay\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateDirectories extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'mangopay:mkdir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the temporary directories required by the Mangopay SDK';

    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * CreateDirectories constructor.
     *
     * @param \Illuminate\Filesystem\Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Handle command.
     */
    public function handle()
    {

        foreach ($this->getDirectories() as $directory) {

            if ($this->files->isDirectory($directory)) {
                $this->warn("Directory already exists [{$directory}].");
            } elseif ($this->confirm("Create directory [{$directory}]?", true)) {
                if ($this->files->makeDirectory($directory, 0777, true)) {
                    $this->files->put($directory . '.gitignore', "*\n!.gitignore\n");
                    $this->info("Directory created [{$directory}].");
                } else {
                    throw new \Exception("Cannot create directory [{$directory}]");
                }
            }
        }
    }

    /**
     * The directories that should be created.
     *
     * @return array
     */
    private function getDirectories()
    {
        return [
            storage_path('mangopay' . DIRECTORY_SEPARATOR . 'sandbox' . DIRECTORY_SEPARATOR),
            storage_path('mangopay' . DIRECTORY_SEPARATOR . 'production' . DIRECTORY_SEPARATOR),
        ];
    }
}

