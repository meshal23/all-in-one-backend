<?php

namespace App\Repositories;

use App\Interfaces\ItemMasterInterface;
use App\Models\ItemMaster\ItemMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemMasterRepository implements ItemMasterInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getItems($search)
    {
        try {
            if (($search != null || $search != "") && strlen($search) == 3) {
                $searchItems = ItemMaster::query()
                    ->when($search, function ($query, $search) {
                        if (strlen($search) >= 3) {
                            $query->where('name', 'like', "%$search%");
                        }
                    })
                    ->get();

                return response()->json([
                    "items" => $searchItems
                ], 200);
            } else {
                $items = ItemMaster::cursorPaginate(2);
                return response()->json([
                    'items' => $items
                ], 200);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function storeItem($itemMasterRequest)
    {
        DB::beginTransaction();
        try {
            $item = ItemMaster::create($itemMasterRequest);
            DB::commit();
            return response()->json([
                "message" => "item created",
                "item" => $item
            ], 200);
        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function searchItem($search)
    {
        try {
            $searchItems = ItemMaster::query()
                ->when($search, function ($query, $search) {
                    if (strlen($search) >= 3) {
                        $query->where('name', 'like', '%' . $search . '%');
                    }
                })
                ->get();

            return response()->json([
                "items" => $searchItems
            ], 200);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
