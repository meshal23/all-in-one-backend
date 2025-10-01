<?php

namespace App\Repositories;

use App\Interfaces\ItemBrandInterface;
use App\Models\ItemBrand\ItemBrand;
use Exception;
use Illuminate\Support\Facades\DB;

class ItemBrandRepository implements ItemBrandInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllItemBrands($search)
    {
        try {
            if (($search != null || $search != "") && strlen($search) >= 3) {
                $searchItems = ItemBrand::query()
                    ->when($search, function ($query, $search) {
                        if (strlen($search) >= 3) {
                            $query->where('name', 'like', "%$search%");
                        }
                    })
                    ->get();

                return response()->json([
                    "brands" => $searchItems
                ], 200);
            } else {
                $brands = ItemBrand::cursorPaginate(2);
                return response()->json([
                    'brands' => $brands
                ], 200);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function storeItemBrand($itemBrand)
    {
        DB::beginTransaction();
        try {
            $itemBrand = ItemBrand::create($itemBrand);
            DB::commit();
            return response()->json([
                "message" => "item brand created successfully",
                "brand" => $itemBrand
            ]);
        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
