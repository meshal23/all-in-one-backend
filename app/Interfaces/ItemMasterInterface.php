<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ItemMasterInterface
{
    public function getItems();
    public function storeItem($itemRequest);
}
