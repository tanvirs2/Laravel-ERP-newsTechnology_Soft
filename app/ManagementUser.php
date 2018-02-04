<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagementUser extends Model
{
    protected $fillable = [
        'employeeID',
        'email',
        'fullName',
        'password',
        'gender',
        'fatherName',
        'mobileNumber',
        'date_of_birth',
        'designation',
        'joiningDate',
        'profileImage',
        'localAddress',
        'permanentAddre',
        'status',
        'last_login',
        'remember_token',
        'exit_date',
        'created_at',
        'updated_at',
        'religion',
        'marital_status',
        'blood_group',
        'national_id',
        'passport_id'
    ];
}
