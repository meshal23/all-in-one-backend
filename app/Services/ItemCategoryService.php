<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\ItemCategoryInterface;
use App\Models\ItemCategory\ItemCategory;

class ItemCategoryService
{
    public $itemCategoryInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(ItemCategoryInterface $itemCategoryInterface)
    {
        $this->itemCategoryInterface = $itemCategoryInterface;
    }

    public function getAllItemCategories(Request $request)
    {
        $search = $request->query('search', null);
        return $this->itemCategoryInterface->getAllItemCategories($search);
    }

    public function storeItemCategory(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);
        $body = [
            'code' => ItemCategory::generateNextCode(),
            'name' => $request->category
        ];
        return $this->itemCategoryInterface->storeItemCategory($body);
    }
}
