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
        $module = strtolower($this->argument('name'));

        $path = app_path("Dtos/$module");

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

         File::put(
                "$path/$module.blade.php",
                "<h1>$module page</h1>"
            );

        $this->info('Dtos created successfully.');
    }
}
