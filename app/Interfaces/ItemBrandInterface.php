<?php

namespace App\Interfaces;

interface ItemBrandInterface
{
    public function getAllItemBrands($search);
    public function storeItemBrand($itemBrand);
}
