<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeColor extends Model
{
    protected $fillable = [
        "po_no",
        "order_number",
        "poQuantity",
        "size_name",
        "color_name",
    ];
}
