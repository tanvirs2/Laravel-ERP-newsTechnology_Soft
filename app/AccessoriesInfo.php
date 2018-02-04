<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessoriesInfo extends Model
{
    protected $fillable = [
        'itemName',
        'order_number',
        'colorName',
        'requestDate',
        'targetDeliveryDate',
        'exFactoryDate',
        'itemStatus',
        'itemApprovalDate',
        'courierDetails',
        'itemRemark'
    ];
}
