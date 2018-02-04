<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YarnInfo extends Model
{
    protected $fillable = [
        'type',
        'order_number',
        'count',
        'composition',
        'composition_two',
        'percentage',
        'percentage_two',
        'colorName',
        'quantity',
    ];
}
