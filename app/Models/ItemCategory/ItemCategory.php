<?php

namespace App\Models\ItemCategory;

use App\Enums\TransactionCodes;
use App\Enums\CommonStatusCodes;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $fillable = [
        'code',
        'name'
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
                TransactionCodes::ITEM_CATEGORY_TRANSACTION_CODE->value . CommonStatusCodes::BATCH->value . 00001
            );
        }
    }
}
