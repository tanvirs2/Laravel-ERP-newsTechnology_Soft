<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;
class Employee_document extends Model {
	protected $fillable = [];
    protected $guarded  =['id'];


	public function employeeDetails(){

		return $this->belongsTo('App\models\Employee','employeeID','employeeID');
	}
}