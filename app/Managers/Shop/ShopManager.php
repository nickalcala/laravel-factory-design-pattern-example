<?php

namespace App\Manager\Shop;

use App\Services\Shop\AmazonShopService;
use App\Services\Shop\EbayShopService;
use App\Services\Shop\IShopService;
use Illuminate\Support\Arr;

class ShopManager implements IShopManager
{

    private $shops = [];

    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function make($name): IShopService
    {
        $service = Arr::get($this->shops, $name);

        // No need to create the service every time
        if ($service) {
            return $service;
        }

        $createMethod = 'create' . ucfirst($name) . 'ShopService';
        if (!method_exists($this, $createMethod)) {
            throw new \Exception("Shop $name is not supported");
        }

        $service = $this->{$createMethod}();

        $this->stores[$name] = $service;

        return $service;
    }

    private function createEbayShopService(): EbayShopService
    {
        dump("Creating EbayShopService...");
        $config = $this->app['config']['shops.ebay'];
        $service = new EbayShopService($config);
        // Do the necessary configuration to use the Ebay service
        return $service;
    }

    private function createAmazonShopService(): AmazonShopService
    {
        dump("Creating AmazonShopService...");
        $service = new AmazonShopService();
        $config = $this->app['config']['shops.amazon'];
        $service->setConfig($config);
        // Do the necessary configuration to use the Amazon service
        return $service;
    }
}
