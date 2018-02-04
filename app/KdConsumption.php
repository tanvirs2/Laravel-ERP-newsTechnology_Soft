<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KdConsumption extends Model
{
    protected $table = "kd_consumption";
    protected $fillable =
        [
            'colorID',
            'KDprgrmId',
            'bodyOrSlvFini',
            'bodyOrSlvFini_ProcessLs',
            'ribFinish',
            'ribFinish_ProcessLs',
            'neckTapeFini',
            'neckTapeFini_ProcessLs',
        ];

    public function colorName()
    {
        return $this->hasOne('App\Color', 'id', 'colorID');
    }
}
