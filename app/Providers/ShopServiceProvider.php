<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(\App\Manager\Shop\IShopManager::class, function ($app) {
            return new \App\Manager\Shop\ShopManager($app);
        });
    }
}
