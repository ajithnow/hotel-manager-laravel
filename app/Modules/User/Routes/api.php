<?php
namespace App\Modules\User\Routes;

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

Route::post('create', [UserController::class, 'store'])->name('create');
Route::get('show', [UserController::class, 'show'])->name('show');


