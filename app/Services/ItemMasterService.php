<?php

namespace App\Services;

use App\Http\Requests\ItemMasterRequest\ItemMasterRequest;
use App\Interfaces\ItemMasterInterface;
use App\Models\ItemMaster\ItemMaster;
use Exception;
use Illuminate\Http\Request;

class ItemMasterService
{
    public $itemMasterInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(ItemMasterInterface $itemMasterInterface)
    {
        $this->itemMasterInterface = $itemMasterInterface;
    }

    public function getItems()
    {
        return $this->itemMasterInterface->getItems();
    }

    /**
     * Function: store item
     * Description: store a item into the database
     */
    public function storeItem(ItemMasterRequest $request)
    {
        $itemBody = $this->itemMasterFormData($request);
        return $this->itemMasterInterface->storeItem($itemBody);
    }

    /**
     * Function: itemMasterFormData
     * Description: function for data that comes from body
     */
    public function itemMasterFormData($request)
    {
        return [
            'name' => $request->name,
            'min_stock' => $request->minStock,
            'max_stock' => $request->maxStock,
            'cost_price' => $request->costPrice,
            'retail_price' => $request->retailPrice,
            'discount_amount' => $request->discountAmount,
            'discount_percent' => $request->discountPercentage,
            'is_batch' => $request->isBatch ?? 1,
            'is_active' => $request->isActive ?? 1,
            'item_type' => $request->itemType,
            'image' => $request->image,
            'description' => $request->description,
        ];
    }
}
