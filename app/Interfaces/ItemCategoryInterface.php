<?php

namespace App\Interfaces;

interface ItemCategoryInterface
{
    public function getAllItemCategories($search);
    public function storeItemCategory($itemCategory);
}
