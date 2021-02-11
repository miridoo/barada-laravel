<?php


namespace Barada\Laravel\Commands;

use Barada\Laravel\Models\Migration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;


class MigrationCommand extends Command{

    protected $signature = 'barada:migrate {action?} {--clean=false}';

    protected $description = "";


    public function handle() {

        $action = $this->argument('action');

        if (!$action) {
            $this->migrate();
        }
        else if ($action == 'mapped') {
            $this->mapped();
        }

    }

    public function migrate() {
        $this->info("php artisan migrate --path=/databases/migrations/barada");
         Artisan::call('migrate', [
            '--path' => '/database/migrations/barada'
        ]);
    }

    public function mapped() {
        $this->alert("Truncate migrations table");
        Migration::select()->delete();
        $this->info("Done!");

        $this->alert("Get migration files");
        $files = File::allFiles(database_path('migrations'));
        foreach ($files as $file) {
            $this->info(pathinfo($file->getFilename(), PATHINFO_FILENAME));
            Migration::create([
                'migration' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                'batch' => 1
            ]);
        }
        $this->info("Done!");
    }

}