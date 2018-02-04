<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\Employee;
use App\models\Department;
use Image;
use File;

class NewEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    public function index()
    {
        $this->data['employees']       =    Employee::all();
        //dd($this->data['employees']);
        $this->data['employeesActive'] =   'active';

        return view('employee.employeeList', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['employeesActive'] =   'active';
        $this->data['department']      =     Department::lists('deptName','id');

        return view('employee.createEmployee',$this->data);
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

        $name = explode(' ', $request->input('fullName'));
        $firstName = ucfirst($name[0]);
        //$val = $request->all();
        if ($request->hasFile('profileImage')) {
            $path       = public_path()."/profileImages/";
            File::makeDirectory($path, $mode = 0777, true, true);

            $image 	    = $request->file('profileImage');
            $extension  = $image->getClientOriginalExtension();
            $filename	= "{$firstName}_{$request->input('employeeID')}.".strtolower($extension);

            //Image::make($image->getRealPath())->resize('872','724')->save($path.$filename);
            Image::make($image->getRealPath())
                ->fit(872, 724, function ($constraint) {
                    $constraint->upsize();
                })->save($path.$filename);
        }

        Employee::create([
            'employeeID'    => $request->input('employeeID'),
            'designation'   => $request->input('designation'),
            'fullName'      => ucwords(strtolower($request->input('fullName'))),
            'fatherName'    => ucwords(strtolower($request->input('fatherName'))),
            'gender'        => $request->input('gender'),
            /*'email'         => $request->input('email'],
            'password'      => Hash::make($request->input('password']),*/
            'date_of_birth' => date('Y-m-d',strtotime($request->input('date_of_birth'))),
            'mobileNumber'  => $request->input('mobileNumber'),
            'joiningDate'   => $request->input('joiningDate'),
            //'localAddress'  => $request->input('localAddress'),
            'blood_group'   => $request->input('blood_group'),
            'religion'      => $request->input('religion'),
            'marital_status'=> $request->input('marital_status'),
            'national_id'   => $request->input('national_id'),
            'passport_id'   => $request->input('passport_id'),
            'profileImage'  =>  isset($filename)?$filename:'default.jpg',
            //'joiningDate'   =>  date('Y-m-d',strtotime($request->input('joiningDate'))),
            //'permanentAddress' => $request->input('permanentAddress')
        ]);

        return $request->input('employeeID');
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
