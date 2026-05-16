<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $repositoryName = ucfirst($name) . 'Repository';
        $path = app_path("Repositories/{$repositoryName}.php");

        if (!File::exists($path)) {
            $this->ensureDirectoryExists($path);
            File::put($path, $this->buildRepositoryStub($repositoryName));
            $this->info("Repository created successfully: {$path}");
        } else {
            $this->error("Repository already exists: {$path}");
        }
    }

    /**
     * Ensure the directory exists for the given file path.
     */
    protected function ensureDirectoryExists($filePath)
    {
        $dir = dirname($filePath);
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
    }

    /**
     * Build the repository class stub.
     */
    protected function buildRepositoryStub($repositoryName)
    {
        return <<<PHP
<?php

namespace App\Repositories;

class {$repositoryName}
{
    // Add your repository methods here
}
PHP;
    }
}