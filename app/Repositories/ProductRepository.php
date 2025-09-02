<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\ProductModel\Product;
use Illuminate\Foundation\Exceptions\Renderer\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        try {
            $products = Product::all();

            return response()->json([
                'products' => 'fetch all products'
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function storeProducts(Request $request)
    {
        dd($request->all());
    }
}
