<?php

namespace App\Providers;

use App\Repository\Eloquent\PlayListEloquentRepository;
use App\Repository\PlayListRepositoryInterface;
use App\Service\Implement\PlayListService;
use App\Service\PlayListServiceInterface;
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
        $this->app->singleton(PlayListRepositoryInterface::class,PlayListEloquentRepository::class);
        $this->app->singleton(PlayListServiceInterface::class,PlayListService::class);
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
