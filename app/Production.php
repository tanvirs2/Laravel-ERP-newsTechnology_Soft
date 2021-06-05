<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'production';
    protected $fillable = [
        'order_id',
        'prDate',
        'line',
        'prCut',
        'prSwIn',
        'prSwOut',
        'prIron',
        'prCarton'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function budget()
    {
        return $this->belongsTo(BudgetFrOrder::class, 'order_id', 'order_id');
    }
}
