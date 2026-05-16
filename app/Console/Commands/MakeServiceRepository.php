<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceRepository extends Command
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
    protected $description = 'Create a service and repository class for the given name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        // Create service class
        $servicePath = app_path("Services/{$name}Service.php");
        if (!File::exists($servicePath)) {
            $this->ensureDirectoryExists($servicePath);
            File::put($servicePath, $this->serviceStub($name));
            $this->info("Service created successfully: {$servicePath}");
        } else {
            $this->error("Service already exists: {$servicePath}");
        }

        // Create repository class
        $repositoryPath = app_path("Repositories/{$name}Repository.php");
        if (!File::exists($repositoryPath)) {
            $this->ensureDirectoryExists($repositoryPath);
            File::put($repositoryPath, $this->repositoryStub($name));
            $this->info("Repository created successfully: {$repositoryPath}");
        } else {
            $this->error("Repository already exists: {$repositoryPath}");
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
     * Get the stub content for the service class.
     */
    protected function serviceStub($name)
    {
        return <<<PHP
<?php

namespace App\Services;

use App\Models\{$name};

class {$name}Service
{
    protected \$model;

    public function __construct({$name} \$model)
    {
        \$this->model = \$model;
    }

    // Add your service methods here
}
PHP;
    }

    /**
     * Get the stub content for the repository class.
     */
    protected function repositoryStub($name)
    {
        return <<<PHP
<?php

namespace App\Repositories;

use App\Models\{$name};

class {$name}Repository
{
    protected \$model;

    public function __construct({$name} \$model)
    {
        \$this->model = \$model;
    }

    public function all()
    {
        return \$this->model->all();
    }

    public function find(\$id)
    {
        return \$this->model->find(\$id);
    }

    public function create(array \$attributes)
    {
        return \$this->model->create(\$attributes);
    }

    public function update(\$id, array \$attributes)
    {
        \$record = \$this->model->find(\$id);
        if (\$record) {
            \$record->update(\$attributes);
            return \$record;
        }
        return null;
    }

    public function delete(\$id)
    {
        return \$this->model->destroy(\$id);
    }
}
PHP;
    }
}
