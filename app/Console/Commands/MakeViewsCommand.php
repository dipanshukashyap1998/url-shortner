<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:views {name}';

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
        $module = strtolower($this->argument('name'));

        $path = resource_path("views/$module");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $views = [
            'index',
            'create',
            'edit',
            'show',
        ];

        foreach ($views as $view) {
            File::put(
                "$path/$view.blade.php",
                "<h1>$view page</h1>"
            );
        }

        $this->info('Views created successfully.');
    }
}
