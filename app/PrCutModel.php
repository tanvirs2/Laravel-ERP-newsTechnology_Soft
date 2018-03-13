<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrCutModel extends Model
{
    protected $table = 'prod_cut';
    protected $fillable = [
        'order_id',
        'date',
        'colorId',
        'cut',
    ];
}