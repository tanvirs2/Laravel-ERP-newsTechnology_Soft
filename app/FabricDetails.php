<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricDetails extends Model
{
    protected $table = 'fabric_details';
    protected $fillable = [
        'order_number',
        'garmentsItem',
        'bodyPart',
        'fabNature',
        'ColorType',
        'FabricDescription',
        'FabricSource',
        'DiaType',
        'gsm',
        'ColorSizeSensitive',
        'Color',
        'Uom',
        'AvgGreyCons',
        'Rate',
        'Amount',
        'Status',
        'YarnRequired'
    ];
}
