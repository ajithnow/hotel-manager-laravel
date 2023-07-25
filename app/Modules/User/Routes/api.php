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
Route::get('{id}', [UserController::class, 'show'])->name('show');
Route::delete('{id}', [UserController::class, 'destroy'])->name('destroy');
Route::patch('update', [UserController::class, 'update'])->name('update');

Route::post('profile', [UserController::class, 'createProfile'])->name('create-profile');



