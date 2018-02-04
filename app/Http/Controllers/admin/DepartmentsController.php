<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\models\Employee;
use App\models\Department;
use App\models\Designation;

use Illuminate\Support\Facades\Validator;
use Input;
use DB;
use Hash;
use View;
use Redirect;
use Response;
use Request;

class DepartmentsController extends Controller {



    public function __construct()
    {
        $this->middleware('auth');
        /*parent::__construct();
        $this->data['departmentOpen'] ='active open';
        $this->data['pageTitle'] ='Department';*/
    }

    /**
     * Display a listing of departments
     */
	public function index() {
		$this->data['departments'] = Department::all();
		$this->data['departmentActive'] = 'active';
		$employeeCount = array();
		foreach (Department::all() as $dept) {
			$employeeCount[$dept->id] = Employee::join('designation', 'employees.designation', '=', 'designation.id')
			                                    ->join('department', 'designation.deptID', '=', 'department.id')
			                                    ->where('department.id', '=', $dept->id )
			                                    ->count();
		}

		$this->data['employeeCount']    =   $employeeCount;

        //dd($this->data['departments']);


		return View::make('departments.index', $this->data);
	}


	/**
	 * Store a newly created department in storage.
	 */
	public function store()
	{
		$validator = Validator::make($input = Input::all(), Department::rules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$dept = Department::create([
            'deptName'  => $input['deptName']
        ]);

        foreach ($input['designation'] as $index => $value) {
            if($value=='')continue;
            Designation::firstOrCreate([
                'deptID' => $dept->id,
                'designation' => $value
            ]);

        }

		return Redirect::route('admin.departments.index')->with('success',"<strong>{$input['deptName']}</strong> successfully added to the Database");
	}



	/**
	 * Show the form for editing the specified department.
	 */
	public function edit($id)
	{

		$this->data['department'] = Department::find($id);
		return View::make('departments.edit', $this->data);
	}


	/**
	 * Update the specified department in storage.
	 */
	public function update($id)
	{
		$department = Department::findOrFail($id);


		$validator = Validator::make($input = Input::all(), Department::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$department->update([
            'deptName'=> $input['deptName']
        ]);



		return Redirect::route('admin.departments.index')->with('success',"<strong>{$input['deptName']}</strong> updated successfully");;
	}

	/**
	 * Remove the specified department from storage.
	 */
	public function destroy($id)
	{
        Department::destroy($id);

        return redirect() -> back();

		/*if (Request::ajax()) {

			Department::destroy($id);

			$output['success'] = 'deleted';

			return Response::json($output, 200);
		}*/


	}

    public function ajax_designation()
    {
	    if (Request::ajax()) {
		    $deptID = Input::get('deptID');
		    $designation = Designation::where('deptID', '=', $deptID)->get();

		    return Response::json($designation, 200);
	    }
    }
}
