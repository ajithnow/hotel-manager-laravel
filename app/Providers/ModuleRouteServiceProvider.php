<?php

// app/Providers/ModuleRouteServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleRouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->routes(fn () => $this->loadModuleRoutes());
    }

    protected function loadModuleRoutes()
    {
        $modulePath = base_path('app/Modules'); // Change this path as per your module directory structure

        if (File::isDirectory($modulePath)) {
            $moduleDirectories = File::directories($modulePath);
            foreach ($moduleDirectories as $directory) {
                $module = basename($directory);
                $this->loadModuleApiRoutes($module);
            }
        }
    }

    protected function loadModuleApiRoutes($module)
    {
        Route::middleware('api')->prefix('api/' . lcfirst($module))->group(function () use ($module) {
            $apiRoutesFile = app_path("Modules/{$module}/Routes/api.php");
            if (File::exists($apiRoutesFile)) {
                require_once $apiRoutesFile;
            }
        });
    }
}
