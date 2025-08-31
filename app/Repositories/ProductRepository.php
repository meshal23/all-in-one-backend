<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Author: Meshal
     * Function: get all products from the database
     * date: 2025/08/31
     */
    public function getProducts()
    {
        dd("Fetching Productsss");
    }
}
