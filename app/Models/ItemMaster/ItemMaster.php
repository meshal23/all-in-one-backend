<?php

namespace App\Models\ItemMaster;

use App\Enums\CommonStatusCodes;
use App\Enums\TransactionCodes;
use App\Models\ItemBrand\ItemBrand;
use App\Models\ItemCategory\ItemCategory;
use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    protected $fillable = [
        'code',
        'brand_code',
        'category_code',
        'name',
        'min_stock',
        'max_stock',
        'cost_price',
        'retail_price',
        'discount_amount',
        'discount_percent',
        'is_batch',
        'is_active',
        'item_type',
        'image',
        'description',
    ];

    // protected $guarded = [];

    protected $casts = [
        'code' => 'integer'
    ];

    /**
     * Function: generate next code
     * Description: this function will create auto-increment
     *     on code
     */
    public static function generateNextCode()
    {
        $lastCode = self::max('code');

        if ($lastCode) {
            return intval(
                $lastCode + 1
            );
        } else {
            return intval(
                TransactionCodes::ITEM_MASTER_TRANSACTION_CODE->value . CommonStatusCodes::BATCH->value . 00001
            );
        }
    }

    public function itemBrand()
    {
        return $this->belongsTo(ItemBrand::class, 'brand_code', 'code');
    }

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class, 'category_code', 'code');
    }
}
