<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
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
        // Custom update route
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/jameel/public/livewire/update', $handle);
        });

        // Custom JavaScript route
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/jameel/public/livewire/livewire.js', $handle);
        });
    }
}
