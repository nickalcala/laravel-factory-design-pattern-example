<?php

namespace App\Manager\Shop;

use App\Services\Shop\IShopService;

interface IShopManager
{
    public function make($name): IShopService;
}
