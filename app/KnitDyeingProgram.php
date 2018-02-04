<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnitDyeingProgram extends Model
{
    protected $table = "knitdyeing_prgrm";

    protected $fillable = [
        'order_id',
        'date',
        'bodyOrSlvDesc',
        'inserterRibDesc',
        'neckTapeDesc',

    ];

    public function orderDetails()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function kdColrSizeFabQty()
    {
        return $this->hasMany('App\KdColorSizeFabricQty', 'KDprgrmId', 'id');
    }

    public function kdConsumption()
    {
        return $this->hasMany('App\KdConsumption', 'KDprgrmId', 'id');
    }
}
