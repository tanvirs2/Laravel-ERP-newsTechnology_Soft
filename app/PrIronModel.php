<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrIronModel extends Model
{
    protected $table = 'prod_iron';
    protected $fillable = [
        'order_id',
        'date',
        'colorId',
        'iron',
    ];
}
