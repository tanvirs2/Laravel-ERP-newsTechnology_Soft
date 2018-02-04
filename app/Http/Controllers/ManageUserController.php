<?php

namespace App\Http\Controllers;

use App\User;
use App\ManagementUser;
use App\models\Department;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Http\Requests;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['employees']  = ManagementUser::all();
        $this->data['employeesActive'] =   'active';
        //dd($this->data);
        return view('management.manageUserList', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->data['employeesActive'] =   'active';
        $this->data['department']      =     Department::lists('deptName','id');
        return view('management.createManageUser', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $input = $request->all();
        ManagementUser::create([
            'employeeID'    => $input['employeeID'],
            'designation'   => $input['designation'],
            'fullName'      => ucwords(strtolower($input['fullName'])),
            'fatherName'    => ucwords(strtolower($input['fatherName'])),
            'gender'        => $input['gender'],
            'email'         => $input['email'],
            'password'      => Hash::make($input['password']),
            'date_of_birth' => date('Y-m-d',strtotime($input['date_of_birth'])),
            'mobileNumber'  => $input['mobileNumber'],
            'joiningDate'   => $input['joiningDate'],
            'localAddress'  => $input['localAddress'],
            'blood_group'   => $input['blood_group'],
            'religion'      => $input['religion'],
            'marital_status'=> $input['marital_status'],
            'national_id'   => $input['national_id'],
            'passport_id'   => $input['passport_id'],
            'profileImage'  =>  isset($filename)?$filename:'default.jpg',
            'joiningDate'   =>  date('Y-m-d',strtotime($input['joiningDate'])),
            'permanentAddress' => $input['permanentAddress']
        ]);

        return redirect()->route('managementUser.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
