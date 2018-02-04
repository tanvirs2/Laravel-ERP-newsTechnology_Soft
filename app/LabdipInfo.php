<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabdipInfo extends Model
{
    protected $fillable = [
        'po_no',
        'order_number',
        'colorName',
        'requestDate',
        'targetDeliveryDate',
        'instructionsSelectedFactory',
        'exFactoryDate',
        'status',
        'approvalOrRejectionDate',
        'reasonForRejection',
        'courierDetails',
        'comment',
        'labdipRef',
    ];
}
