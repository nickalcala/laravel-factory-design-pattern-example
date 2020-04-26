<?php

namespace App\Services\Shop;

class EbayShopService implements IShopService
{

    private $config;

    public function __construct($config)
    {
        dump("Ebay config was set in constructor...");
        $this->config = $config;
        dump($this->config);
    }

    public function getProducts(): array
    {
        return [
            'Ebay Product Sample #1',
            'Ebay Product Sample #2',
            'Ebay Product Sample #3',
        ];
    }
}
