<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Tna;
use DateTime;
use App\Http\Requests;

class TnaController extends Controller
{
    public function enDsTna($order_id, $dbFieldName)
    {
        $data_1 = [
            'order_id' => $order_id,
            $dbFieldName => '1'
        ];
        $data_0 = [
            'order_id' => $order_id,
            $dbFieldName => '0'
        ];
        if ($tnaData = Tna::where('order_id', $order_id)->first()) {
            if ($tnaData->$dbFieldName == 1) {
                Tna::where('order_id', $order_id)->update($data_0);
            }else if($tnaData->$dbFieldName == 0){
                Tna::where('order_id', $order_id)->update($data_1);
            }else{
                Tna::where('order_id', $order_id)->update($data_1);
            }
        } else {
            Tna::create($data_1);
        }
    }

    public function jointChck()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));//knitDyeingSts
        $this->data['employees'] = Order::join('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$today, $hasDays])->where([['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        //$this->data['employees'] = Order::join('tnas', 'order_details.Id', '=', 'tnas.order_id')->where([['shipStatus', '=', 'running']])->first();

        $this->data['employeesActive'] = 'active';
        dd($this->data['employees']);
        //return view('tna.tnaList', $this->data);
    }

    public function labDipFunc($order_id, $actionName)
    {
        $data = [
            'order_id' => $order_id,
            $actionName => $_GET['inputValue']
        ];
        if (Tna::where('order_id', $order_id)->first()) {
            Tna::where('order_id', $order_id)->update($data);
        } else {
            Tna::create($data);
        }
    }

    public function listTable()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('tna.tnaTable', $this->data);
    }
    public function orderStsSrc($byrNmeSrch, $shipSts)
    {
        if ($byrNmeSrch == '-' && $shipSts == '-') {
            $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->where([['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        }
        if ($byrNmeSrch != '-' && $shipSts != '-') {
            $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->where([['customer_name', '=', $byrNmeSrch], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            if ($byrNmeSrch != '-') {
                $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->where([['customer_name', '=', $byrNmeSrch], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->where([['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            }
        }

        //$this->data['employees'] = Order::where($field, '=', $actionName)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('tna.tnaTable', $this->data);
    }
    //start autoCompltSrch
    public function autoCompltSrch($field, $searchKey)
    {
        $results = array();
        $data = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->where($field, 'like', '%'.$searchKey.'%')->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        foreach ($data as $query)
        {
            $results[] =  $query->$field;
            $results = array_unique($results);
        }
        return response()->json($results);
    }

    public function autoCompltRslt($field, $actionName, $from, $to)
    {
        if ('date_of_entry' != $field) {
            if (strpos($actionName, '-') !== false){
                $actionName = str_replace('-','/', $actionName);
            }
            if (strpos($actionName, '******') !== false){
                $actionName = str_replace('******', '-', $actionName);
            }
        }

        if ($from != '-') {
            $from = DateTime::createFromFormat('d-m-Y', $from);
            $to = DateTime::createFromFormat('d-m-Y', $to);
            $from = $from->format('Y-m-d');
            $to = $to->format('Y-m-d');
            $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$from, $to])->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        }
        $this->data['employeesActive'] = 'active';
        return view('tna.tnaTable', $this->data);
    }
    public function searchDateRange($from, $to, $customer_name, $shipSts)
    {
        //return $from.' |-| '.$to.' |-| '.$customer_name.' |-| '.$shipSts;
        $from = DateTime::createFromFormat('d-m-Y', $from);
        $to = DateTime::createFromFormat('d-m-Y', $to);
        $from = $from->format('Y-m-d');
        $to = $to->format('Y-m-d');
        if ($customer_name == '-' && $shipSts == '-') {
            $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$from, $to])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        }
        if ($customer_name != '-' && $shipSts != '-') {
            $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$from, $to])->where([['customer_name', '=', $customer_name], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            if ($customer_name != '-') {
                $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$from, $to])->where('customer_name', '=', $customer_name)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$from, $to])->where('order_status', '=', $shipSts)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
        }

        return view('tna.tnaTable', $this->data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));//knitDyeingSts
        $this->data['employees'] = Order::leftJoin('tnas', 'order_details.Id', '=', 'tnas.order_id')->whereBetween('date_of_ship', [$today, $hasDays])->where([['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        //$this->data['employees'] = Order::where([['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        //$this->data['employees'] = KnitDyeing::where('knitDyeingSts', '=', '1')->get()->sortBy("date");
        //dd($this->data['employees']);
        $this->data['employeesActive'] = 'active';
        return view('tna.tnaList', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['employeesActive'] = 'active';
        return view('tna.createTNA',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tnaInfo = $request->all();
        Tna::create($tnaInfo);
        //return $tnaInfo;
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
