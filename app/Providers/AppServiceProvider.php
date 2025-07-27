<?php

namespace App\Providers;

use App\Events\UserCreated;
use App\Events\UserDeleted;
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
        //
        // make listener for events (simple way)
        Event::listen(function (UserCreated $event) {
            Log::info('User created and it is id = ' . $event->user->id);
        });
        Event::listen(function (UserDeleted $event) {
            Log::info('User deleted and it is id = ' . $event->user->id);
        });
    }
}
