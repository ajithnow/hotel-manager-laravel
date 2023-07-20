<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The path to your application's modules folder.
     *
     * @var string
     */
    private const MODULES = 'app/Modules'; // Change this path as per your module directory structure

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {

            $this->loadModuleRoutes();

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function loadModuleRoutes()
    {
        $modulePath = base_path(self::MODULES);

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
