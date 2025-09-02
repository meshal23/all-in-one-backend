<?php

namespace App\Models\ProductModel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price'
    ];
}
