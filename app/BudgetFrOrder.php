<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetFrOrder extends Model
{
    protected $table = "budgetfrorder";
    protected $fillable = [
        'order_id',
        'yrnConsumption',
        'yrnPrice',
        'kntngPrice',
        'dyngPrice',
        'aopPrint',
        'accessories',
        'testCost',
        'print',
        'bankCharge',
        'commission',
        'buyingComssn',
        'fnshFabrcConsump',
        'freightChrge',
        'others',
    ];
}
