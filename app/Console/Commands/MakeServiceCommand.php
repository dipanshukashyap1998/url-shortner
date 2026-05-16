<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $serviceName = ucfirst($name) . 'Service';
        $path = app_path("Services/{$serviceName}.php");

        if (!File::exists($path)) {
            $this->ensureDirectoryExists($path);
            File::put($path, $this->buildServiceStub($serviceName));
            $this->info("Service created successfully: {$path}");
        } else {
            $this->error("Service already exists: {$path}");
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
     * Build the service class stub.
     */
    protected function buildServiceStub($serviceName)
    {
        return <<<PHP
<?php

namespace App\Services;

class {$serviceName}
{
    // Add your service methods here
}
PHP;
    }
}
