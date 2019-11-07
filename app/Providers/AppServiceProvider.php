<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\ClientRepository::class, \App\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RestaurantRepository::class, \App\Repositories\RestaurantRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PreferenceRepository::class, \App\Repositories\PreferenceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FidelityRepository::class, \App\Repositories\FidelityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VisitsRepository::class, \App\Repositories\VisitsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CatalogsRepository::class, \App\Repositories\CatalogsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AssessmentsRepository::class, \App\Repositories\AssessmentsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CommentsRepository::class, \App\Repositories\CommentsRepositoryEloquent::class);
    }
}
