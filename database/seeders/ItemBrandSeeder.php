<?php

namespace Database\Seeders;

use App\Models\ItemBrand\ItemBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemBrand::insert(["code" => 1021011, "name" => "uniliver"]);
    }
}
