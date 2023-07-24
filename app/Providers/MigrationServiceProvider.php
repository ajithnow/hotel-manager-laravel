<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $modulesPath = base_path('app/Modules');
        $moduleFolders = File::directories($modulesPath);
        foreach ($moduleFolders as $moduleFolder) {
            $migrationsPath = $moduleFolder . DIRECTORY_SEPARATOR . 'Migrations';
            if (File::exists($migrationsPath)) {
                $this->loadMigrationsFrom($migrationsPath);
            }
        }
    }

}
