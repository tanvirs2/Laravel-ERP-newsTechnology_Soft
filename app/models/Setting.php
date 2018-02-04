<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Setting extends Model {

	// Add your validation rules here
    public static $rules = [
        'website'    =>  'required',
        'email'      =>  'required|email',
        'name'       =>  'required',
        'logo'       =>  'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:1000'

    ];

	// Don't forget to fill this array
	protected $fillable =   [];
    protected $guarded  =   ['id'];

}