<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrCartonModel extends Model
{
    protected $table = 'prod_carton';
    protected $fillable = [
        'order_id',
        'date',
        'colorId',
        'carton',
    ];
}
