<?php

namespace App\Providers;

use App\Modules\Room\Repositories\RoomRepository;
use App\Modules\Room\Repositories\RoomRepositoryInterface;
use App\Modules\Room\Repositories\RoomTypeRepository;
use App\Modules\Room\Repositories\RoomTypeRepositoryInterface;
use App\Modules\User\Repositories\UserProfileRepository;
use App\Modules\User\Repositories\UserProfileRepositoryInterface;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserProfileRepositoryInterface::class, UserProfileRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(RoomTypeRepositoryInterface::class, RoomTypeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
