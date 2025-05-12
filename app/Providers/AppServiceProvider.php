<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Repository\AuthRepository;
use App\Repositories\Repository\UserRepository;
use App\Repositories\Interface\AuthRepositoryInterface;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Interface\BlogRepositoryInterface;
use App\Repositories\Repository\BlogRepository;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}

