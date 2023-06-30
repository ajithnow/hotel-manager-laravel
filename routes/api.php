<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

if (File::isDirectory(MODULE_PATH)) {
    $moduleDirectories = File::directories(MODULE_PATH);
    foreach ($moduleDirectories as $directory){
        $module = basename($directory);
        Route::prefix(lcfirst($module))->group(function () use ($module) {
            require_once app_path("Modules/{$module}/Routes/api.php");
        });
    }
}
