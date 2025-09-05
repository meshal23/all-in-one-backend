<?php

namespace App\Services;

use App\Http\Requests\ProductRequests\ProductRequest;
use App\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductService
{
    public $productInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    /**
     * Function: getProducts
     * Description: get all products from the database
     */
    public function getProducts()
    {
        return $this->productInterface->getProducts();
    }

    /**
     * Function: store products
     * Description: store a product into the database
     */
    public function storeProducts(ProductRequest $request)
    {
        $product = $this->productFormData($request);
        return $this->productInterface->storeProducts($product);
    }

    /**
     * Function productFormData
     * Description: the form body for the product
     */
    public function productFormData($request)
    {
        return  [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];
    }
}
