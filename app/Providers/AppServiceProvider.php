<?php

namespace App\Providers;

use App\Http\Resources\Attraction\ListCollection;
use App\Http\Resources\Attraction\ListResource;
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
        ListResource::withoutWrapping();
        ListCollection::withoutWrapping();
    }
}
