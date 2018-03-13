<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrSwingModel extends Model
{
    protected $table = 'prod_sw_in';
    protected $fillable = [
        'order_id',
        'date',
        'colorId',
        'swingIn',
    ];
}
