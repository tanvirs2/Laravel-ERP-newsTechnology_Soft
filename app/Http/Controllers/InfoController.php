<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\Bank_detail;
use App\models\Employee_document;
use App\models\Employee;
use File;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return print_r($id);
        //return view('employee.employeeDetailsInformation', ['id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
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

        $employeeID = $request->input('employeeID');

        $employee = Employee::where('employeeID', '=' ,$employeeID)->get()->first();

        /*$name = explode(' ', $employee->fullName);
        $firstName = ucfirst($name[0]);*/
        //dd($request->input('employeeID'));
        // Insert Into Bank Details
        if ($request->input('accountName') != '' && $request->input('accountNumber')!='')
        {
            $bank_details = Bank_detail::firstOrNew(['employeeID' => $employeeID]);

            $bank_details->accountName   = $request->input('accountName');
            $bank_details->accountNumber = $request->input('accountNumber');
            $bank_details->bank          = $request->input('bank');
            $bank_details->pan           = $request->input('pan');
            $bank_details->ifsc          = $request->input('ifsc');
            $bank_details->branch        = $request->input('branch');
            $bank_details->save();

            $output['status'] = 'success';
            $output['msg'] = 'Bank details updated successfully';

            /*Bank_detail::create([
                'employeeID'    =>  $employeeID,
                'accountName'   =>  $request->input('accountName'),
                'accountNumber' =>  $request->input('accountNumber'),
                'bank'          =>  $request->input('bank'),
                'pan'           =>  $request->input('pan'),
                'ifsc'          =>  $request->input('ifsc'),
                'branch'        =>  $request->input('branch')

            ]);*/

        }

        // -------------- UPLOAD THE DOCUMENTS  -----------------
        $documents  =   ['resume','offerLetter','joiningLetter','contract','IDProof'];

        foreach ($documents as $document) {
            if ($request->hasFile($document)) {

                $path = public_path()."/employee_documents/{$document}/";
                File::makeDirectory($path, $mode = 0777, true, true);

                $file 	    = $request->file($document);
                $extension  = $file->getClientOriginalExtension();
                $filename	= "{$document}_{$request->input('employeeID')}_{$firstName}.$extension";

                $request->file($document)->move($path, $filename);
                Employee_document::create([
                    'employeeID'=>  $request->input('employeeID'),
                    'fileName'  =>   $filename,
                    'type'      =>  $document
                ]);

            }
        }

        return 'no prob found';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employeeID)
    {
        return view('employee.employeeDetailsInformation', ['employeeID' => $employeeID]);
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
    public function update(Request $request, $employeeID)
    {
        /*$this->validate($request, [
            'accountName' => 'required|max:255',
            'accountNumber' => 'required',
        ]);

        $validator = $this->validate($request->all());
        if ($validator->) {

        }
        */
        if ($request->input('accountName') == '' && $request->input('accountNumber')==''){
            return false;
        }

        $employee = Employee::where('employeeID', '=' ,$employeeID)->get()->first();

        $name = explode(' ', $employee->fullName);
        $firstName = ucfirst($name[0]);

        // Insert Into Bank Details
        if ($request->input('accountName') != '' && $request->input('accountNumber')!='')
        {
            $bank_details = Bank_detail::firstOrNew(['employeeID' => $employeeID]);

            $bank_details->accountName   = $request->input('accountName');
            $bank_details->accountNumber = $request->input('accountNumber');
            $bank_details->bank          = $request->input('bank');
            $bank_details->pan           = $request->input('pan');
            $bank_details->ifsc          = $request->input('ifsc');
            $bank_details->branch        = $request->input('branch');
            $bank_details->save();

            $output['status'] = 'success';
            $output['msg'] = 'Bank details updated successfully';
        }

        // -------------- UPLOAD THE DOCUMENTS  -----------------
        $documents  =   ['resume','offerLetter','joiningLetter','contract','IDProof'];

        foreach ($documents as $document) {
            if ($request->hasFile($document)) {

                $path = public_path()."/employee_documents/{$document}/";
                File::makeDirectory($path, $mode = 0777, true, true);

                $file 	    = $request->file($document);
                $extension  = $file->getClientOriginalExtension();
                $filename	= "{$document}_{$request->input('employeeID')}_{$firstName}.$extension";

                $request->file($document)->move($path, $filename);
                Employee_document::create([
                    'employeeID'=>  $request->input('employeeID'),
                    'fileName'  =>   $filename,
                    'type'      =>  $document
                ]);
            }
        }
        return 'Successfully save data with details!';
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

    public function storeUserDetail(Request $request)
    {

    }
}
