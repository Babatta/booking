<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Livewire\BookingManager;
use Livewire\Livewire;


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
        Livewire::component('booking-manager', BookingManager::class);
    }
}
