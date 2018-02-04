<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use App\models\Employee;
use Illuminate\Http\Request;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function profile()
    {
        /*$data = Employee::findOrFail($id);*/
        //return 'dfdfdfdsf';
        return view('profile');
    }
    public function employees()
    {
        return view('employee');
    }
    public function newEmployee()
    {
        return view('information.color');
    }

    public function updateUserInfo(Request $requests)
    {
        $val = $requests->all();
        if ($requests->hasFile('avatar')) {
            $file = $requests->file('avatar');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(250, 300)->save(public_path('assets/img/'. $fileName));
            $val['avatar'] = $fileName;
        }
        //dd($val);
        $user = Auth::user();
        $user->update($val);

        return redirect()->back();
    }

    public function ajaxTest(Request $request)
    {

        $name = $request->lock;
        return $name;
    }
}
