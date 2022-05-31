<?php

namespace App\Providers;

use App\Repositories\TodoRepository;
use App\Repositories\TodoRepositoryInterface;
use App\Repositories\TodoStatusRepository;
use App\Repositories\TodoStatusRepositoryInterface;
use App\Services\TodoService;
use App\Services\TodoServiceInterface;
use App\Services\TodoStatusService;
use App\Services\TodoStatusServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TodoServiceInterface::class, TodoService::class);
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
        $this->app->bind(TodoStatusServiceInterface::class, TodoStatusService::class);
        $this->app->bind(TodoStatusRepositoryInterface::class, TodoStatusRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
