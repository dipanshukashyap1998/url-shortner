<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDtosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dto {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = ucfirst($this->argument('name')); // Capitalize first letter for class name
        $module = strtolower($this->argument('name')); // Lowercase for directory

        $path = app_path("App/Models/DTOs/$module");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }


        File::put(
            app_path("App/Models/DTOs/{$module}.php"),
            "<?php

        namespace App\Models\DTOs;

        class {$name}
        {
            // Add your DTO properties here
        }
        "
        );

        $this->info('DTO created successfully.');
    }
}
