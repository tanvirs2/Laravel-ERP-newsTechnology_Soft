<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrPolyModel extends Model
{
    protected $table = 'prod_poly';
    protected $fillable = [
        'order_id',
        'date',
        'colorId',
        'poly',
    ];
}
