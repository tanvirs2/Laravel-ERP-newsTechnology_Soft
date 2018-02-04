<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricSample extends Model
{
    protected $fillable = [
        'po_no',
        'sampleType',
        'order_number',
        'requestDate',
        'targetDeliveryDate',
        'instructionsSelectedFactory',
        'exFactoryDate',
        'status',
        'approvalOrRejectionDate',
        'reasonForRejection',
        'courierDetails',
        'comment'
    ];
}
