<?php

namespace App\Repositories;

use App\Interfaces\ItemCategoryInterface;
use App\Models\ItemCategory\ItemCategory;
use Exception;
use Illuminate\Support\Facades\DB;

class ItemCategoryRepository implements ItemCategoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllItemCategories($search)
    {
        try {
            if (($search != null || $search != "") && strlen($search) >= 3) {
                $searchItems = ItemCategory::query()
                    ->when($search, function ($query, $search) {
                        if (strlen($search) >= 3) {
                            $query->where('name', 'like', "%$search%");
                        }
                    })
                    ->get();

                return response()->json([
                    "categories" => $searchItems
                ], 200);
            } else {
                $categories = ItemCategory::cursorPaginate(2);
                return response()->json([
                    'categories' => $categories
                ], 200);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function storeItemCategory($itemCategory)
    {
        DB::beginTransaction();

        try {
            $itemCategory = ItemCategory::create($itemCategory);
            DB::commit();
            return response()->json([
                "message" => "Item category created successfully",
                "category" => $itemCategory
            ], 200);
        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
