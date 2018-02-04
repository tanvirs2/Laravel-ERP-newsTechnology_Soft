<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests, DB;

class FinishFabIssForKdProgram extends Controller
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
        return view('ajaxFile.KDprgrm.ajxFinishFabIssForm', $data);
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
        DB::table('fini_fab_issue')->insert($data);
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
        $data['finishFabIssList'] = DB::table('fini_fab_issue')->where([['kdPrgrmId', $kdId], ['colorId', $colorId]])->get();
        return view('ajaxFile/finishFabIss/ajxKdFinishFabIssList', $data);
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
        $data['finiFabIssue'] = $request->input('finiFabIssue');
        $data['remarks'] = $request->input('remarks');
        DB::table('fini_fab_issue')->where('id', $id)->update($data);
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
