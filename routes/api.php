<?php

use App\Modules\User\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//User Module Routes
Route::name('user.')->prefix('user')->group(base_path('app/Modules/User/Routes/api.php'));

//Auth Module Routes
Route::name('auth.')->prefix('auth')->group(base_path('app/Modules/Auth/Routes/api.php'));

//Room Module Routes
Route::name('room.')->prefix('room')->group(base_path('app/Modules/Room/Routes/api.php'));