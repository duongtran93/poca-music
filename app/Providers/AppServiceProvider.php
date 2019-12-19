<?php

namespace App\Providers;

use App\Repository\Eloquent\PlayListEloquentRepository;
use App\Repository\Eloquent\SingerEloquentRepository;
use App\Repository\PlayListRepositoryInterface;
use App\Repository\SingerRepositoryInterface;
use App\Service\Implement\PlayListService;
use App\Service\Implement\SingerService;
use App\Service\PlayListServiceInterface;
use App\Service\SingerServiceInterface;
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
        $this->app->singleton(SingerServiceInterface::class, SingerService::class);
        $this->app->singleton(SingerRepositoryInterface::class, SingerEloquentRepository::class);
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
