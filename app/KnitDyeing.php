<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnitDyeing extends Model
{
    protected $table = "knitdyeing";

    protected $fillable = [
        'order_id',
        'date',
        'bodyOrSlvDesc',
        'inserterRibDesc',
        'neckTapeDesc',
        'color',
        'grmntQTY',
        'colorYarnRqrd',
        'yarnIss',
        'kntQty',
        'dyeingQty',
        'fnshFabRqrd',
        'fnshFabRcv',
    ];
}
