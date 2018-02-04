<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, DB;

use App\Http\Requests;

class DyingQtyForKdProgram extends Controller
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
        return view('ajaxFile.KDprgrm.ajxDyingQtyForm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input('dying');
        DB::table('dying_qty_for_kd')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kdId, $colorId)
    {
        $data['kdDyingQtyList'] = DB::table('dying_qty_for_kd')->where([['kdPrgrmId', $kdId], ['colorId', $colorId]])->get();
        return view('ajaxFile/dying/ajxKdDyingQtyList', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $data['kdDyingQtyRow'] = DB::table('dying_qty_for_kd')->where('id', $id)->get();
        //return view('ajaxFile.KDprgrm.ajxDyingQtyForm', $data);
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
        $data['dyingQty'] = $request->input('dyingQty');
        $data['remarks'] = $request->input('remarks');
        DB::table('dying_qty_for_kd')->where('id', $id)->update($data);
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
