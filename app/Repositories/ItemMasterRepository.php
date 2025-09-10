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

    public function getItems()
    {
        try {
            $items = ItemMaster::all();
            return response()->json([
                'items' => $items
            ], 200);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function storeItem($itemMasterRequest)
    {
        try {
            DB::transaction();
            ItemMaster::create($itemMasterRequest);
        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
