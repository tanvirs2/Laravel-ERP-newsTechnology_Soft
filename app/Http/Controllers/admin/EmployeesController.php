<?php

/**
 * Class EmployeesController
 * This Controller is for the all the related function applied on employees
 */

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\models\Employee;
use App\models\Salary;
use App\models\Department;
use App\models\Designation;
use App\models\Bank_detail;
use App\models\Employee_document;

use Illuminate\Support\Facades\Validator;
use Input;
use DB;
use Hash;
use View;
use File;
use Image;
use Redirect;
use Response;

class EmployeesController extends Controller {

	/**
	 * Constructor for the Employees
	 */

	public function __construct()
	{
        $this->middleware('auth');
		//parent::__construct();
		$this->data['employeesOpen'] =   'active open';
		$this->data['pageTitle']     =   'Employees';
	}

	public function index()
	{
		$this->data['employees']       =    Employee::all();
        //dd($this->data['employees']);
		$this->data['employeesActive'] =   'active';

        //dd($this->data);
		return View::make('employee', $this->data);
	}

	/**
	 * Show the form for creating a new employee
	 */
	public function create()
	{
		$this->data['employeesActive'] =   'active';
		$this->data['department']      =     Department::lists('deptName','id');

		return View::make('newEmployee',$this->data);
	}

	/**
	 * Store a newly created employee in storage
	 */
	public function store()
	{
        /*$input = Input::all();
        dd($input);*/

		$validator = Validator::make($input = Input::all(), Employee::rules('create'));

		if ($validator->fails())
		{
            //return 'em';
			return Redirect::back()->withErrors($validator)->withInput();
		}

		DB::beginTransaction();
		try {

			$name = explode(' ', $input['fullName']);
			$firstName = ucfirst($name[0]);

			$filename   =   null;
			// Profile Image Upload
			if (Input::hasFile('profileImage')) {
				$path       = public_path()."/profileImages/";
				File::makeDirectory($path, $mode = 0777, true, true);

				$image 	    = Input::file('profileImage');
				$extension  = $image->getClientOriginalExtension();
				$filename	= "{$firstName}_{$input['employeeID']}.".strtolower($extension);

				//                Image::make($image->getRealPath())->resize('872','724')->save($path.$filename);
				Image::make($image->getRealPath())
				     ->fit(872, 724, function ($constraint) {
					     $constraint->upsize();
				     })->save($path.$filename);
			}

			Employee::create([
				'employeeID'    => $input['employeeID'],
				'designation'   => $input['designation'],
				'fullName'      => ucwords(strtolower($input['fullName'])),
				'fatherName'    => ucwords(strtolower($input['fatherName'])),
				'gender'        => $input['gender'],
				/*'email'         => $input['email'],
				'password'      => Hash::make($input['password']),*/
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

			//  Insert into salary table
			if ($input['currentSalary'] != '')
			{
				Salary::create([
					'employeeID' => $input['employeeID'],
					'type'       => 'current',
					'remarks'    => 'Joining Salary Of Employee',
					'salary'     => $input['currentSalary']

				]);
			}
			// Insert Into Bank Details
			if ($input['accountName'] != '' && $input['accountNumber']!='')
			{
				Bank_detail::create([
					'employeeID'    =>  $input['employeeID'],
					'accountName'   =>  $input['accountName'],
					'accountNumber' =>  $input['accountNumber'],
					'bank'          =>  $input['bank'],
					'pan'           =>  $input['pan'],
					'ifsc'          =>  $input['ifsc'],
					'branch'        =>  $input['branch']

				]);

			}

			// -------------- UPLOAD THE DOCUMENTS  -----------------
			$documents  =   ['resume','offerLetter','joiningLetter','contract','IDProof'];

			foreach ($documents as $document) {
				if (Input::hasFile($document)) {

					$path = public_path()."/employee_documents/{$document}/";
					File::makeDirectory($path, $mode = 0777, true, true);

					$file 	    = Input::file($document);
					$extension  = $file->getClientOriginalExtension();
					$filename	= "{$document}_{$input['employeeID']}_{$firstName}.$extension";

					Input::file($document)->move($path, $filename);
					Employee_document::create([
						'employeeID'=>  $input['employeeID'],
						'fileName'  =>   $filename,
						'type'      =>  $document
					]);

				}
			}


			/*if($this->data['setting']->employee_add==1)
			{
				$this->data['employee_name'] = $input['fullName'];
				$this->data['employee_email'] = $input['email'];
				$this->data['employee_password'] = $input['password'];
				//        Send Employee Add Mail
				Mail::send('emails.admin.employee_add', $this->data, function ($message) use ($input) {
					$message->from($this->data['setting']->email, $this->data['setting']->name);
					$message->to($input['email'], $input['fullName'])
					        ->subject('Account Created - ' . $this->data['setting']->website);
				});
			}*/
			//  ********** END UPLOAD THE DOCUMENTS**********

		}catch(\Exception $e)
		{
			DB::rollback();
			throw $e;
		}

		DB::commit();
		return Redirect::route('admin.employees.index')->with('success',"<strong>{$input['fullName']}</strong> successfully added to the Database");
	}




	/**
	 * Show the form for editing the specified employee
	 */
	public function edit($id)
	{
		$this->data['employeesActive']  =   'active';
		$this->data['department']       =   Department::lists('deptName','id');
		$this->data['employee']         =   Employee::where('employeeID', '=' ,$id)->get()->first();
		$this->data['designation']      =   Designation::find($this->data['employee']->designation);

		$doc = [];
		foreach($this->data['employee']->getDocuments as $documents)
		{
			$doc[$documents->type] =  $documents->fileName ;
		}
		$this->data['documents']  =   $doc;

		$this->data['bank_details']     =   Bank_detail::where('employeeID', '=' ,$id)->get()->first();


		return View::make('employeeEdit', $this->data);
	}



	/**
	 * Update the specified employee in storage.
	 */
	public function update($id)
	{
		//----Bank Details Update-------
		if(Input::get('updateType')=='bank')
		{

			$validator = Validator::make($input = Input::all(), Employee::rules('bank'));

			if ($validator->fails())
			{
				$output['status']   =   'error';
				$output['msg']      =   $validator->getMessageBag()->toArray();

			}else{

				$bank_details = Bank_detail::firstOrNew(['employeeID' => $id]);

				$bank_details->accountName   = Input::get('accountName');
				$bank_details->accountNumber = Input::get('accountNumber');
				$bank_details->bank          = Input::get('bank');
				$bank_details->pan           = Input::get('pan');
				$bank_details->ifsc          = Input::get('ifsc');
				$bank_details->branch        = Input::get('branch');
				$bank_details->save();

				$output['status'] = 'success';
				$output['msg'] = 'Bank details updated successfully';
			}
		}

		//-------Bank Details Update End--------
		//-------Company Details Update Start--------

		else if(Input::get('updateType')=='company')
		{
			$company_details = Employee::where('employeeID','=', $id)->first();


			$validator = Validator::make($input = Input::all(), Employee::rules('update',$company_details->id));

			if ($validator->fails())
			{
				$output['status']   =   'error';
				$output['msg']      =   $validator->getMessageBag()->toArray();

			}else{

				$company_details->employeeID  = $id;
				$company_details->designation = Input::get('designation');
				$company_details->joiningDate = date('Y-m-d',strtotime(Input::get('joiningDate')));
				$company_details->exit_date   = (trim(Input::get('exit_date'))!='')?date('Y-m-d',strtotime(Input::get('exit_date'))):null;

				$company_details->status      = (Input::get('status')!='active')?'inactive':'active';
				$company_details->save();
				if(isset($input['salary']))
				{
					foreach ($input['salary'] as $index => $value)
					{
						$salary_details = Salary::find($index);
						$salary_details->type = $input['type'][$index];
						$salary_details->salary = $value;
						$salary_details->save();
					}
				}
				$output['status'] = 'success';
				$output['msg']    = 'Company Details updated successfully';
			}
		}

		//-------Company Details Update End--------------


		//-------Personal info Details Update Start----------

		else if(Input::get('updateType')=='personalInfo')
		{

			$employee   =   Employee::where('employeeID','=',$id)->get()->first();


			$validator = Validator::make($data = Input::all(),Employee::rules('personalInfo',$employee->id));

			if ($validator->fails())
			{
				return Redirect::back()->with(['errorPersonal' => $validator->messages()->all()])->withInput();
			}


			$input  =   Input::all();

			$name   = explode(' ', $input['fullName']);
			$firstName = ucfirst($name[0]);


			//$password = ($data['password']!='')?Hash::make(Input::get('password')):$data['oldpassword'];

			// Profile Image Upload
			if (Input::hasFile('profileImage'))
			{
				$path       = public_path()."/profileImages/";
				File::makeDirectory($path, $mode = 0777, true, true);

				$image 	    = Input::file('profileImage');


				$extension  = $image->getClientOriginalExtension();
				$filename	= "{$firstName}_{$id}.".strtolower($extension);

				//Image::make($image->getRealPath())->resize(872,724)->save("$path$filename");

				Image::make($image->getRealPath())
				     ->fit(872, 724, function ($constraint) {
					     $constraint->upsize();
				     })->save($path . $filename);


			}else
			{
				$filename   =   Input::get('hiddenImage');
			}



			$employee->update(
				[
					'fullName'      => ucwords(strtolower($input['fullName'])),
					'fatherName'    => ucwords(strtolower($input['fatherName'])),
					'gender'        => $input['gender'],
					/*'email'         => $input['email'],
					'password'      => $password,*/
					'date_of_birth' => (trim(Input::get('date_of_birth'))!='')?date('Y-m-d',strtotime(Input::get('date_of_birth'))):null,
					'mobileNumber'  => $input['mobileNumber'],

					'profileImage'     => $filename,
				]);

			return Redirect::route('admin.employees.edit',$id)->with('successPersonal',"<strong>Success</strong> Updated Successfully");

		}
		//-------Personal Details Update End-------------

		//-------Documents info Details Update Start--------
		else if(Input::get('updateType')=='documents')
		{

			// -------------- UPLOAD THE DOCUMENTS  -----------------
			$documents  =   ['resume','offerLetter','joiningLetter','contract','IDProof'];

			foreach ($documents as $document) {
				if (Input::hasFile($document)) {

					$path = public_path()."/employee_documents/{$document}/";
					File::makeDirectory($path, $mode = 0777, true, true);

					$file 	= Input::file($document);
					$extension  = $file->getClientOriginalExtension();

					$employee   =   Employee::where('employeeID','=',$id)->get()->first();
					$nameArray  =   explode(' ',$employee->fullName);
					$firstName  =   $nameArray[0];
					$filename	= "{$document}_{$id}_{$firstName}.$extension";

					Input::file($document)->move($path, $filename);
					$employee_document  =   Employee_document::firstOrNew(['employeeID'=>$id,'type'=>$document]);
					$employee_document->fileName  =   $filename;
					$employee_document->type      =   $document;
					$employee_document->save();

				}
			}

			return Redirect::route('admin.employees.edit',$id)->with('successDocuments',"<strong>Success</strong> Updated Successfully");
			//  ********** END UPLOAD THE DOCUMENTS**********

		}
		//-------Documents info Details Update END--------


		return Response::json($output, 200);
	}



	public function export(){
		$employee   =   Employee::join('designation', 'employees.designation', '=', 'designation.id')
		                        ->join('department', 'department.id', '=', 'designation.deptID')
		                        ->leftJoin('bank_details', 'bank_details.employeeID', '=', 'employees.employeeID')
		                        ->select('employees.id','employees.employeeID',
			                        'employees.fullName','department.deptName as Department',
			                        'designation.designation as Designation','employees.fatherName','employees.mobileNumber','employees.date_of_birth',
			                        'employees.joiningDate','employees.localAddress','employees.permanentAddress','employees.status',
			                        'employees.exit_date','employees.permanentAddress',
			                        'bank_details.accountName','bank_details.accountNumber','bank_details.bank','bank_details.pan','bank_details.branch',
			                        'bank_details.ifsc'
		                        )->orderBy('id','asc')
		                        ->get()->toArray();

		$data = $employee;

		Excel::create('employees'.time(), function($excel) use($data) {

			$excel->sheet('Employees', function($sheet) use($data) {

				$sheet->fromArray($data);

			});

		})->store('xls')->download('xls');


	}
	/**
	 * Remove the specified employee from storage.
	 */
    public function appointmentLetter()
    {
        return view('others.appointmentLetter');
    }

	public function destroy($id)
	{
		Employee::where('employeeID', '=', $id)->delete();
		return $output['success']  =   'deleted';
		//return Response::json($output, 200);
        //return $id;
	}





}
