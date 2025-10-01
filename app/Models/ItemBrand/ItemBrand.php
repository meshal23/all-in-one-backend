<?php

namespace App\Models\ItemBrand;

use App\Enums\TransactionCodes;
use App\Enums\CommonStatusCodes;
use App\Models\ItemMaster\ItemMaster;
use Illuminate\Database\Eloquent\Model;

class ItemBrand extends Model
{
    protected $fillable = [
        "code",
        "name"
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
                TransactionCodes::ITEM_BRAND_TRANSACTION_CODE->value . CommonStatusCodes::BATCH->value . 00001
            );
        }
    }

    // public function itemMaster()
    // {
    //     return $this->hasMany(ItemMaster::class, 'brand_code', 'code');
    // }
}
