<?php

namespace BackupStaged;

use BackupStaged\Commands\BackupStagedCommand;
use Illuminate\Support\ServiceProvider;

class BackupStagedServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/backup-staged.php', 'backup-staged');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/backup-staged.php' => $this->app->configPath('backup-staged.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                BackupStagedCommand::class,
            ]);
        }
    }
}
