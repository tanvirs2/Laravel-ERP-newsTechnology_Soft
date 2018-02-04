<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests, DB;

class YarnIssueController extends Controller
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
    public function create()
    {
        return view('yarnStore.yarnIssue');
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
        DB::table('yarn_issue')->insert($data);
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
        $data['yarnIssueList'] = DB::table('yarn_issue')->where([['kdPrgrmId', $kdPrgrmId]])->get();
        return view('ajaxFile/yarn/ajxYrnIssList', $data);
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
        $data['yrnQty'] = $request->input('yrnQty');
        $data['itemName'] = $request->input('itemName');
        $data['pkgUnit'] = $request->input('pkgUnit');
        $data['remarks'] = $request->input('remarks');
        DB::table('yarn_issue')->where('yrnIssueId', $id)->update($data);
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
