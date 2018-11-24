<?php

namespace App\Providers;

use App\Services\Subscribers\SubscribersManager;
use App\Services\Subscribers\SubscribersManagerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        SubscribersManagerInterface::class => SubscribersManager::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
