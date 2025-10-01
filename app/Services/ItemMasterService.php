<?php

namespace App\Services;

use App\Http\Requests\ItemMasterRequest\ItemMasterRequest;
use App\Interfaces\ItemMasterInterface;
use App\Models\ItemMaster\ItemMaster;
use App\Utils\CustomFunction;
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

    public function getItems(Request $request)
    {
        $search = $request->query('search', null);
        return $this->itemMasterInterface->getItems($search);
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
        $img_name = '';

        if ($request->image) {
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('products', $img_name);
        }

        return [
            'code' => ItemMaster::generateNextCode(),
            'brand_code' => $request->brandCode,
            'category_code' => $request->categoryCode,
            'name' => $request->name,
            'min_stock' => $request->minStock,
            'max_stock' => $request->maxStock,
            'cost_price' => $request->costPrice,
            'retail_price' => $request->retailPrice,
            'discount_amount' => $request->discountAmount,
            'discount_percent' => $request->discountPercentage,
            'is_batch' => $request->isBatch ?? 1,
            'is_active' => $request->isActive ?? 1,
            'item_type' => $request->itemType ?? "product",
            'image' => $img_name,
            'description' => $request->description,
        ];
    }

    /**
     * Function: search item by name
     * Description: item can be search by letter only send request atleast 3
     *       letters typed
     */
    public function searchItem(Request $request)
    {
        $search = $request->query('search');
        return $this->itemMasterInterface->searchItem($search);
    }
}
