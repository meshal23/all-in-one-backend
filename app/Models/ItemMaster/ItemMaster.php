<?php

namespace App\Models\ItemMaster;

use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    protected $fillable = [
        'name',
        'cost_price',
        'retail_price',
    ];

    
}
