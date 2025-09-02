<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProductInterface
{
    public function getProducts();
    public function storeProducts(Request $request);
}
