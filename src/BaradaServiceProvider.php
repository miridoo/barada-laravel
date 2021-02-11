<?php

namespace Barada\Laravel;

use Barada\Laravel\Commands\MigrationCommand;
use Illuminate\Support\ServiceProvider;

class BaradaServiceProvider extends ServiceProvider{
    private $config  = __DIR__ . '/configs/barada.php';

    public function boot(): void {

        $this->publishes([
            $this->config => config_path('barada.php')
        ]);

    }

    public function register(): void{
        $this->mergeConfigFrom($this->config, 'barada');

        if($this->app->runningInConsole()) {
            $this->commands([
                MigrationCommand::class
            ]);
        }

    }
}