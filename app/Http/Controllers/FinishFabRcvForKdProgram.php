<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests, DB;

class FinishFabRcvForKdProgram extends Controller
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
    public function create($ordID, $kdId, $colorId)
    {
        $data = [
            'orderId' => $ordID,
            'kdPrgrmId' => $kdId,
            'colorId' => $colorId,
        ];
        return view('ajaxFile.KDprgrm.ajxFinishFabReqrdForm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input('finiFabR');
        DB::table('finish_fab_required')->insert($data);
        //dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kdId, $colorId)
    {
        $data['finishFabRqrdList'] = DB::table('finish_fab_required')->where([['kdPrgrmId', $kdId], ['colorId', $colorId]])->get();
        return view('ajaxFile/finishFabRqrd/ajxKdFinishFabRqrdList', $data);
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
        $data['finishFabRqrd'] = $request->input('finishFabRqrd');
        $data['remarks'] = $request->input('remarks');
        DB::table('finish_fab_required')->where('id', $id)->update($data);
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
