<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests, DB;

class YarnReceiveForKdProgram extends Controller
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
    public function create($ordID, $kdId)
    {
        $data = [
            'orderId' => $ordID,
            'kdPrgrmId' => $kdId,
        ];
        return view('ajaxFile.KDprgrm.ajxYrnRcvForm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input('yarn');
        DB::table('yarn_receive_for_kd')->insert($data);
        //dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kdPrgrmId)
    {
        $data['yarnRcvList'] = DB::table('yarn_receive_for_kd')->where([['kdPrgrmId', $kdPrgrmId]])->get();
        return view('ajaxFile/yarn/ajxYrnRcvList', $data);
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
        $data['date'] = $request->input('date');
        $data['yarnRcvQTY'] = $request->input('yarnRcvQTY');
        $data['remarks'] = $request->input('remarks');
        DB::table('yarn_receive_for_kd')->where('id', $id)->update($data);
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
