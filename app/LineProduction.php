<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineProduction extends Model
{
    protected $table = "lines_production";
    protected $fillable =
        [
            'id',
            'line_name'
        ];
}
