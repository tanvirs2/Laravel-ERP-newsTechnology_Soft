<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;
class Salary extends Model {

	 public  static $rules = [
		'type'   =>  'required',
		'salary' =>  'required'
	];
	protected $fillable = [];
    protected $table ='salary';
    protected $guarded = ['id'];
}