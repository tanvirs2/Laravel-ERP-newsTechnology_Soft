<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests, DB, Validator;

class KDProgramSumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ord, $kdId, $grayFabSum, $finishFabRqrSum)
    {
        $validator = Validator::make(
            ['orderId' => $ord],
            ['orderId' => 'unique:kd_Program_Sum_Table']
        );
        if (!$validator->fails())
        {
            $data = [
                'orderId' => $ord,
                'kdPrgrmId' => $kdId,
                'date' => date('Y-m-d'),
                'grayFabQtySum' => $grayFabSum,
                'finishFabRqrSum' => $finishFabRqrSum,
            ];
            DB::table('kd_Program_Sum_Table')->insert($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
