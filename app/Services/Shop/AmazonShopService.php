<?php

namespace App\Services\Shop;

class AmazonShopService implements IShopService
{

    private $config;

    public function getProducts(): array
    {
        return [
            'Amazon Product Sample #1',
            'Amazon Product Sample #2',
            'Amazon Product Sample #3',
        ];
    }

    public function setConfig($config)
    {
        dump("Amazon config was set in a method...");
        $this->config = $config;
        dump($this->config);
    }
}
