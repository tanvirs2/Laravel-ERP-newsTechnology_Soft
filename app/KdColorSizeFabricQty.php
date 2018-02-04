<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KdColorSizeFabricQty extends Model
{
    protected $table = "kd_color_size_wise_fabric_qty";
    protected $fillable =
        [
            "colorID",
            "sizeID",
            "KDprgrmId",
            "fabQty",
        ];

    public function colorName()
    {
        return $this->hasOne('App\Color', 'id', 'colorID');
    }
    public function sizeName()
    {
        return $this->hasOne('App\Sizes', 'id', 'sizeID');
    }
}
