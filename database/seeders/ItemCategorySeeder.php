<?php

namespace Database\Seeders;

use App\Models\ItemCategory\ItemCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemCategory::insert(["code" => 1031011, "name" => "Stock"]);
    }
}
