<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\ItemBrandInterface;
use App\Models\ItemBrand\ItemBrand;

class ItemBrandService
{
    public $itemBrandInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(ItemBrandInterface $itemBrandInterface)
    {
        $this->itemBrandInterface = $itemBrandInterface;
    }

    public function getAllItemBrands(Request $request)
    {
        $search = $request->query("search", null);
        return $this->itemBrandInterface->getAllItemBrands($search);
    }

    public function storeItemBrand(Request $request)
    {
        $request->validate([
            "brand" => "required"
        ]);

        $body = [
            "code" => ItemBrand::generateNextCode(),
            "name" => $request->brand
        ];

        return $this->itemBrandInterface->storeItemBrand($body);
    }
}
