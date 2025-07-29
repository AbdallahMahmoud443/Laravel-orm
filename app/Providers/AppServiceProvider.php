<?php

namespace App\Providers;

use App\Events\UserCreated;
use App\Events\UserDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(); // prevent lazy loading for all models (throw exception when do lazy loading)
    }
}
