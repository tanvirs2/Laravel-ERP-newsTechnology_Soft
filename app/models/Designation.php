<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;
class Designation extends Model {

	protected $fillable = [];
    protected $table    =   'designation';
    protected $guarded  = ['id'];

    protected function department()
    {
        return $this->belongsTo('App\models\Department','deptID','id');
    }
}