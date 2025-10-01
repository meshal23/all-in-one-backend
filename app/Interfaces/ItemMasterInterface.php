<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ItemMasterInterface
{
    public function getItems($search);
    public function storeItem($itemRequest);
    public function searchItem($search);
}
