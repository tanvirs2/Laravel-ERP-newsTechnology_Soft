<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;
class Bank_detail extends Model {
	protected $fillable = [];
    protected $guarded=[''];

	public function employeeDetails(){

		return $this->belongsTo('App\models\Employee','employeeID','employeeID');
	}
}