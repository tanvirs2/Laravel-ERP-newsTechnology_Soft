<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests, DB;

class KnittingQtyForKdProgram extends Controller
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
        return view('ajaxFile.KDprgrm.ajxKnittingQtyForm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input('knitting');
        DB::table('kd_knitting_qty')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kdPrgrmId)
    {
        $data['kdKnittingQtyList'] = DB::table('kd_knitting_qty')->where([['kdPrgrmId', $kdPrgrmId]])->get();
        return view('ajaxFile/knitting/ajxKdKnittingQtyList', $data);
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
        $data['knttngQTY'] = $request->input('knttngQTY');
        $data['remarks'] = $request->input('remarks');
        DB::table('kd_knitting_qty')->where('id', $id)->update($data);
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
