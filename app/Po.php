<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    protected $table = 'order_po_details';
    protected $fillable = [
        'order_number',
        'customer_name',
        'po_no',
        'po_received_date',
        'po_quantity',
        'cutting_per',
        'fabric_received_date',
        'shipment_date',
        'est_shipment_date',
    ];
}
