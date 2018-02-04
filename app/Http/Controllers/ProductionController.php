<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Production;
use DateTime;

use App\Http\Requests;

class ProductionController extends Controller
{
    public function listTable()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = Order::whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('production.prodTable', $this->data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = Order::whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('production.productionList', $this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('200 days', strtotime($today)));
        $this->data['employees'] = Order::where('shipStatus', '=', 'running')->where('prStatus', '=', '')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('production.preProductionList', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('order_id');
        $val['prStatus'] = 'run';
        $val['prDate'] = $request->input('prDate');
        Order::where('Id', $id)->update($val);
        $data = $request->all();
        if (Production::where(['order_id', '=', $id], ['prDate', $val['prDate']])) {
            Production::where(['order_id', '=', $id], ['prDate', $val['prDate']])->update($data);
        }else{
            Production::create($data);
        }
        //$data['prDate'] = $request->input('prDate');
        //return redirect('production');
    }

    public function storePrData(Request $request)
    {
        $this->validate($request, [
            'prDate' => 'required',
        ]);

        $id = $request->input('order_id');
        $val['prStatus'] = 'run';
        $val['prDate'] = date('Y-m-d');
        Order::where('Id', $id)->update($val);
        $data = $request->all();
        //dd(Production::where([['order_id', '=', $id], ['prDate', '=', $val['prDate']]])->first());
        Production::create($data);
        return redirect('production');
        /*$prData = Production::where([['order_id', '=', $id], ['prDate', '=', $data['prDate']]])->first();

        if ($prData) {
            if ($data['prCut'] == '') {
                $data['prCut'] = $prData->prCut;
            }
            if ($data['prSwIn'] == '') {
                $data['prSwIn'] = $prData->prSwIn;
            }
            if ($data['prSwOut'] == '') {
                $data['prSwOut'] = $prData->prSwOut;
            }
            if ($data['prIron'] == '') {
                $data['prIron'] = $prData->prIron;
            }
            if ($data['prCarton'] == '') {
                $data['prCarton'] = $prData->prCarton;
            }
        }
        if ($data) {
            //($data['prCut'] >= $data['prSwIn']) && ($data['prSwIn'] >= $data['prSwOut']) && ($data['prSwOut'] >= $data['prIron']) && ($data['prIron'] >= $data['prCarton'])
            if ($prData == null) {
                Production::create($data);
            }else{
                if ($prData->prCut) {
                    unset($data['prCut']);
                }
                if ($prData->prSwIn) {
                    unset($data['prSwIn']);
                }
                if ($prData->prSwOut) {
                    unset($data['prSwOut']);
                }
                if ($prData->prIron) {
                    unset($data['prIron']);
                }
                if ($prData->prCarton) {
                    unset($data['prCarton']);
                }
                unset($data['_token']);
                Production::where([['order_id', '=', $id], ['prDate', '=', $data['prDate']]])->update($data);
            }
            return redirect('production');
        }else{
            $request->session()->flash('flash_msg', 'Something Error !');
            return redirect()->back();
        }*/
    }

    /*public function updateSnglPrData(Request $request, $id)
    {
        $id = $request->input('prId');
        $prData = Production::where('id', $id)->first();
    }*/

    public function dateWisePrData()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = Production::whereBetween('prDate', [$today, $hasDays])->get()->sortBy("prDate");
        //$this->data['orders'] = Order::all();
        $this->data['employeesActive'] = 'active';
        return view('production.DateProductionList', $this->data);
    }

    public function searchDateRange($from, $to)
    {
        $from = DateTime::createFromFormat('d-m-Y', $from)->format('Y-m-d');
        $to = DateTime::createFromFormat('d-m-Y', $to)->format('Y-m-d');

        $this->data['employees'] = Production::whereBetween('prDate', [$from, $to])->get()->sortBy("prDate");

        return view('production.DateProdTable', $this->data);
    }

    public function orderPrSearchDateRange($from, $to, $customer_name, $shipSts)
    {
        $from = DateTime::createFromFormat('d-m-Y', $from)->format('Y-m-d');
        $to = DateTime::createFromFormat('d-m-Y', $to)->format('Y-m-d');
        if ($customer_name == '-' && $shipSts == '-') {
            $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        }
        if ($customer_name != '-' && $shipSts != '-') {
            $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where([['customer_name', '=', $customer_name], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            if ($customer_name != '-') {
                $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where('customer_name', '=', $customer_name)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where('order_status', '=', $shipSts)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
        }

        $this->data['prData'] = Production::get();

        return view('production.prodTable', $this->data);
    }
    public function orderStsSrc($byrNmeSrch, $shipSts)
    {
        if ($byrNmeSrch == '-' && $shipSts == '-') {
            $this->data['employees'] = Order::where([['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        }
        if ($byrNmeSrch != '-' && $shipSts != '-') {
            $this->data['employees'] = Order::where([['customer_name', '=', $byrNmeSrch], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            if ($byrNmeSrch != '-') {
                $this->data['employees'] = Order::where([['customer_name', '=', $byrNmeSrch], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = Order::where([['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            }
        }
        $this->data['prData'] = Production::get();
        //$this->data['employees'] = Order::where($field, '=', $actionName)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('production.prodTable', $this->data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    filtering for DateWise Production Report
    public function srchFrDtPrPage($field, $searchKey)
    {
        $results = array();
        $data = Production::where($field, 'like', '%'.$searchKey.'%')->get()->sortBy("prDate");
        //Production::where($field, '=', $actionName)->get()->sortBy("prDate");
        foreach ($data as $query)
        {
            $results[] =  $query->$field;
            $results = array_unique($results);
        }
        return response()->json($results);
    }

    public function rsltFrDtPrPage($field, $actionName, $from, $to)
    {
        if (strpos($actionName, '-') !== false){
            $actionName = str_replace('-', '/', $actionName);
        }
        if (strpos($actionName, '******') !== false){
            $actionName = str_replace('******', '-', $actionName);
        }

        if ($from != '-') {
            $from = DateTime::createFromFormat('d-m-Y', $from);
            $to = DateTime::createFromFormat('d-m-Y', $to);
            $from = $from->format('Y-m-d');
            $to = $to->format('Y-m-d');
            $this->data['employees'] = Production::whereBetween('prDate', [$from, $to])->where($field, '=', $actionName)->get()->sortBy("prDate");
        } else {
            $this->data['employees'] = Production::where($field, '=', $actionName)->get()->sortBy("prDate");
        }

        /*$this->data['prData'] = Production::get();
        $this->data['employeesActive'] = 'active';*/
        //return 'dss';


        //$ordDataArr = Order::where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");

        //$this->data['employees'] = Production::where($field, '=', $actionName)->get()->sortBy("prDate");

        return view('production.DateProdTable', $this->data);
        /*foreach ($ordDataArr as $ordData) {
           //echo $ordData->Id;
            //Production::where('order_id', $ordData->Id)->get()->sortBy("prDate");
        }*/
    }

    //start autoCompltSrch
    public function autoCompltSrch($field, $searchKey)
    {
        $results = array();
        $data = Order::where($field, 'like', '%'.$searchKey.'%')->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        foreach ($data as $query)
        {
            $results[] =  $query->$field;
            $results = array_unique($results);
        }
        return response()->json($results);
    }

    public function autoCompltRslt($field, $actionName, $from, $to)
    {
        if (strpos($actionName, '-') !== false){
            $actionName = str_replace('-', '/', $actionName);
        }
        if (strpos($actionName, '******') !== false){
            $actionName = str_replace('******', '-', $actionName);
        }

        if ($from != '-') {
            $from = DateTime::createFromFormat('d-m-Y', $from);
            $to = DateTime::createFromFormat('d-m-Y', $to);
            $from = $from->format('Y-m-d');
            $to = $to->format('Y-m-d');
            $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            $this->data['employees'] = Order::where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        }

        $this->data['prData'] = Production::get();
        $this->data['employeesActive'] = 'active';
        return view('production.prodTable', $this->data);
    }
    //End autoCompltSrch

    //start autoCompltSrch
    public function dateAutoCompltSrch($field, $searchKey)
    {
        $results = array();
        $data = Order::where($field, 'like', '%'.$searchKey.'%')->where('prStatus', '=', 'run')->get()->sortBy("date_of_ship");
        foreach ($data as $query)
        {
            $results[] =  $query->$field;
            $results = array_unique($results);
        }
        return response()->json($results);
    }

    public function dateAutoCompltRslt($field, $actionName)
    {
        if (strpos($actionName, '-') !== false){
            $actionName = str_replace('-', '/', $actionName);
        }
        if (strpos($actionName, '******') !== false){
            $actionName = str_replace('******', '-', $actionName);
        }
    }
    //End autoCompltSrch
    public function show($order_id)
    {
        $data['buyerDetails'] = Order::where('Id', $order_id)->first();
        $data['dvProduction'] = Production::where('order_id', $order_id)->get()->sortByDesc("prDate");
        return view('production.dvProductionList', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //crete or edit production data
        $data['order'] = Order::find($id);
        return view('production.productionCreate', $data);
    }

    public function editPrData($id)
    {
        $data = Production::find($id);
        return view('production.productionCreate', $data);
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
        $data['prDate'] = $request->input('prDate');
        $data['prCut'] = $request->input('prCut');
        $data['prSwIn'] = $request->input('prSwIn');
        $data['prSwOut'] = $request->input('prSwOut');
        $data['prIron'] = $request->input('prIron');
        $data['prCarton'] = $request->input('prCarton');

        $prod = Production::find($id);

        $val['prStatus'] = 'run';
        $val['prDate'] = date('Y-m-d');
        Order::where('Id', $prod->order_id)->update($val);
        Production::where('id', $id)->update($data);

        return redirect('production');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delPrData($id)
    {
        Production::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = Production::findOrFail($id);
        $data->delete();

        //return redirect('product');
    }
}
