<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table="order_details";

    protected $fillable = [
        'orderID',
        'customer_name',
        'order_number',
        'date_of_entry',
        'order_type',
        'season',
        'order_status',
        'apparel_type',
        'date_of_ship',
        'order_quantity' ,
        'unit_price',
        'style_description',
        'article_no',
        'fabric_description',
        'smv',
        'sales_person',

        'yrnPrice',
        'kntngPrice',
        'dyngPrice',
        'aopPrint',
        'accessories',
        'print',
        'bankCharge',
        'commission',
        'fnshFabrcConsump',
        'yrnConsumption',

        'garmentImg',
        'prDate',
        'prCut',
        'prSwIn',
        'prSwOut',
        'prIron',
        'prCarton',
        'cmPerDz',
    ];

    public function production()
    {
        return $this->hasMany('App\Production', 'order_id', 'Id');
    }

    public function knitDyeing()
    {
        return $this->hasMany('App\KnitDyeing', 'order_id', 'Id');
    }


    /*Start Production*/

    public function prCutFunc()
    {
        return $this->hasMany(PrCutModel::class, 'order_id', 'Id');
    }

    public function prSwingFunc()
    {
        return $this->hasMany(PrSwingModel::class, 'order_id', 'Id');
    }

    public function prSwingOutFunc()
    {
        return $this->hasMany(PrSwingOutModel::class, 'order_id', 'Id');
    }

    public function prIronFunc()
    {
        return $this->hasMany(PrIronModel::class, 'order_id', 'Id');
    }

    public function prPolyFunc()
    {
        return $this->hasMany(PrPolyModel::class, 'order_id', 'Id');
    }

    public function prCartonFunc()
    {
        return $this->hasMany(PrCartonModel::class, 'order_id', 'Id');
    }

}
