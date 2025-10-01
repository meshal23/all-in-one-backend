<?php

namespace App\Enums;

enum TransactionCodes: int
{
    case ITEM_MASTER_TRANSACTION_CODE = 100;
    case ITEM_CATEGORY_TRANSACTION_CODE = 101;
    case ITEM_BRAND_TRANSACTION_CODE = 102;
}
