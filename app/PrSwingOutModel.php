<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrSwingOutModel extends Model
{
    protected $table = 'prod_sw_out';
    protected $fillable = [
        'order_id',
        'date',
        'colorId',
        'swingOut',
    ];
}
