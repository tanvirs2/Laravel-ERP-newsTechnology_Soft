<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\KnitDyeing;
use App\KnitDyeingProgram;
use App\KdConsumption;
use App\KdColorSizeFabricQty;
use DateTime;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KnitAndDyeingController extends Controller
{
    //$join = lefJoin('knitdyeing_prgrm', 'order_details.Id', 'knitdyeing_prgrm.order_id');

    protected function orderModelJoinObj()
    {
        $objArr['orderModelJoinObj'] = Order::leftJoin('knitdyeing_prgrm', 'order_details.Id', '=', 'knitdyeing_prgrm.order_id');



        $objArr['kdColorSizeFabricQty'] = Order::
              join('knitdyeing_prgrm', 'knitdyeing_prgrm.order_id', '=', 'order_details.Id' )
            ->join('kd_color_size_wise_fabric_qty', 'kd_color_size_wise_fabric_qty.KDprgrmId', '=', 'knitdyeing_prgrm.id' )
            ->join('colors', 'colors.id', '=', 'kd_color_size_wise_fabric_qty.colorID');

        return $objArr;
    }

    public function kdProgramColrSizeCnsmp(Request $request)
    {
        //$kdFbrcQtyClSz = $request->all();
        $fabQty = $request->input('fabQty');
        $colorID = $request->input('colorID');
        $sizeID = $request->input('sizeID');

        $bodyOrSlvFini              = $request->input('bodyOrSlvFini');
        $bodyOrSlvFini_ProcessLs    = $request->input('bodyOrSlvFini_ProcessLs');
        $ribFinish                  = $request->input('ribFinish');
        $ribFinish_ProcessLs        = $request->input('ribFinish_ProcessLs');
        $neckTapeFini               = $request->input('neckTapeFini');
        $neckTapeFini_ProcessLs     = $request->input('neckTapeFini_ProcessLs');

        foreach ($colorID as $k => $row) {
            $kdCnsmpArray[] =
                [
                    'colorID'                   => $row,
                    'bodyOrSlvFini'             => $bodyOrSlvFini[$k],
                    'bodyOrSlvFini_ProcessLs'   => $bodyOrSlvFini_ProcessLs[$k],
                    'ribFinish'                 => $ribFinish[$k],
                    'ribFinish_ProcessLs'       => $ribFinish_ProcessLs[$k],
                    'neckTapeFini'              => $neckTapeFini[$k],
                    'neckTapeFini_ProcessLs'    => $neckTapeFini_ProcessLs[$k]
                ];
        }

        $fabQtyNColrChankArr = array_chunk($fabQty,count($colorID));

        foreach ($fabQtyNColrChankArr as $k1=>$arr){
            foreach ($arr as $valKey=>$directVal){
                $kdColrSizeFabQtyArray[] =
                [
                    'colorID' => $colorID[$valKey],
                    'sizeID' => $sizeID[$k1],
                    'fabQty' => $directVal
                ];
            }
        }

        $completArray = 
            [
                'kdColrSizeFabQtyArray' => $kdColrSizeFabQtyArray,
                'kdCnsmpArray'          => $kdCnsmpArray,
            ];
        session(['kdProgramCompletArray' => $completArray]);
    }

    // strt not use this func
    public function preListTable()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = Order::whereBetween('date_of_ship', [$today, $hasDays])->where([['shipStatus', '=', 'running'], ['knitDyeingSts', '=', '0']])->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.preKnitDyeingTable', $this->data);
    }
    // finish  not use this func

    public function preOrderStsSrc($byrNmeSrch, $shipSts)
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

        //$this->data['employees'] = Order::where($field, '=', $actionName)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.preKnitDyeingTable', $this->data);
    }
    //start autoCompltSrch
    public function preAutoCompltSrch($field, $searchKey)
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

    public function preAutoCompltRslt($field, $actionName, $from, $to)
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
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        }
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.preKnitDyeingTable', $this->data);
    }
    public function preSearchDateRange($from, $to, $customer_name, $shipSts)
    {
        //return $from.' |-| '.$to.' |-| '.$customer_name.' |-| '.$shipSts;
        $from = DateTime::createFromFormat('d-m-Y', $from);
        $to = DateTime::createFromFormat('d-m-Y', $to);
        $from = $from->format('Y-m-d');
        $to = $to->format('Y-m-d');
        if ($customer_name == '-' && $shipSts == '-') {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        }
        if ($customer_name != '-' && $shipSts != '-') {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where([['customer_name', '=', $customer_name], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where([['customer_name', '=', $customer_name], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            if ($customer_name != '-') {
                $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where('customer_name', '=', $customer_name)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
                $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where('customer_name', '=', $customer_name)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where('order_status', '=', $shipSts)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
                $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where('order_status', '=', $shipSts)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
        }

        return view('knitDyeing.preKnitDyeingTable', $this->data);
    }
    /**********/
    public function listTable()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.knitDyeingTable', $this->data);
    }
    public function orderStsSrc($byrNmeSrch, $shipSts)
    {
        if ($byrNmeSrch == '-' && $shipSts == '-') {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        }
        if ($byrNmeSrch != '-' && $shipSts != '-') {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->where([['customer_name', '=', $byrNmeSrch], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->where([['customer_name', '=', $byrNmeSrch], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            if ($byrNmeSrch != '-') {
                $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->where([['customer_name', '=', $byrNmeSrch], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
                $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->where([['customer_name', '=', $byrNmeSrch], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->where([['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
                $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->where([['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            }
        }

        //$this->data['employees'] = Order::where($field, '=', $actionName)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.knitDyeingTable', $this->data);
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
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->where([[$field, '=', $actionName], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        }
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.knitDyeingTable', $this->data);
    }

    public function searchDateRange($from, $to, $customer_name, $shipSts)
    {
        //return $from.' |-| '.$to.' |-| '.$customer_name.' |-| '.$shipSts;
        $from = DateTime::createFromFormat('d-m-Y', $from);
        $to = DateTime::createFromFormat('d-m-Y', $to);
        $from = $from->format('Y-m-d');
        $to = $to->format('Y-m-d');
        //$this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->
        if ($customer_name == '-' && $shipSts == '-') {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where('shipStatus', '=', 'running')->get();
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        }
        if ($customer_name != '-' && $shipSts != '-') {
            $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where([['customer_name', '=', $customer_name], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get();
            $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where([['customer_name', '=', $customer_name], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running']])->get()->sortBy("date_of_ship");
        } else {
            if ($customer_name != '-') {
                $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where('customer_name', '=', $customer_name)->where('shipStatus', '=', 'running')->get();
                $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where('customer_name', '=', $customer_name)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$from, $to])->where('order_status', '=', $shipSts)->where('shipStatus', '=', 'running')->get();
                $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->whereBetween('date_of_ship', [$from, $to])->where('order_status', '=', $shipSts)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
            }
        }

        return view('knitDyeing.knitDyeingTable', $this->data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function kdDatePageSearchDateRange($from, $to)
    {
        $from = DateTime::createFromFormat('d-m-Y', $from)->format('Y-m-d');
        $to = DateTime::createFromFormat('d-m-Y', $to)->format('Y-m-d');

        $this->data['employees'] = KnitDyeing::join('order_details', 'knitdyeing.order_id', '=', 'order_details.Id')
            ->whereBetween('date', [$from, $to])
            ->get()->sortBy("date");

        return view('knitDyeing.dateKDtable', $this->data);
    }

    public function knitAndDyeingEntry()
    {
        //dd(Session::get('var'));
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('-1 days', strtotime($today)));//knitDyeingSts
        $this->data['employees'] = Order::whereBetween('date_of_ship', [$today, $hasDays])->where([['shipStatus', '=', 'running'], ['knitDyeingSts', '=', '0']])->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.preKnitDyeingList', $this->data);
    }

    public function index()
    {
        //, ['knitDyeingSts', '=', 1]
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));//knitDyeingSts

        //$today = '2017-01-01';
        //$hasDays = '2017-01-31';//knitDyeingSts

        $this->data['employees'] = $this->orderModelJoinObj()['orderModelJoinObj']->whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['kdColorSizeFabricQty'] = $this->orderModelJoinObj()['kdColorSizeFabricQty']->get();
        //$this->data['colorSelect'] = $this->orderModelJoinObj()['colorSelect']->get();

        $this->data['employeesActive'] = 'active';
        //return view('knitDyeing.test.test', $this->data);
        return view('knitDyeing.knitDyeingList', $this->data);
    }

    public function dateWiseKDdata()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('-10 days', strtotime($today)));
        /*$this->data['employees'] = KnitDyeing::join('order_details', 'knitdyeing.order_id', '=', 'order_details.Id')
            ->whereBetween('date', [$hasDays, $today])
            ->get()->sortBy("date");
        //$this->data['orders'] = Order::all();
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.dateKDdataList', $this->data);*/

        $this->data['employees'] = KnitDyeingProgram::
            /*leftJoin('yarn_receive_for_kd', function ($join){
                $join->on('yarn_receive_for_kd.kdPrgrmId', '=', 'knitdyeing_prgrm.id');
            })*/
              leftJoin('yarn_receive_for_kd', 'yarn_receive_for_kd.kdPrgrmId', '=', 'knitdyeing_prgrm.id')
            ->leftJoin('yarn_issue', 'yarn_issue.kdPrgrmId', '=', 'knitdyeing_prgrm.id')
            ->leftJoin('kd_knitting_qty', 'kd_knitting_qty.kdPrgrmId', '=', 'knitdyeing_prgrm.id')
            ->leftJoin('dying_qty_for_kd', 'dying_qty_for_kd.kdPrgrmId', '=', 'knitdyeing_prgrm.id')
            ->leftJoin('finish_fab_required', 'finish_fab_required.kdPrgrmId', '=', 'knitdyeing_prgrm.id')
            //->where('yarn_receive_for_kd.date', '!=', 'yarn_issue.date')
            //->select('knitdyeing_prgrm.*', 'yarn_receive_for_kd.date')
            ->whereBetween('yarn_receive_for_kd.date', [$hasDays, $today])
            //->select('knitdyeing_prgrm.*','yarn_issue.*','yarn_issue.date as yDate', 'yarn_receive_for_kd.*', 'yarn_receive_for_kd.date as nDate')
            /*->select('knitdyeing_prgrm.*',
                'yarn_receive_for_kd.*',
                'yarn_issue.*',
                'kd_knitting_qty.*',
                'dying_qty_for_kd.*',
                'finish_fab_required.*')*/
            ->get();
            //->sortBy("date");
        //$this->data['orders'] = Order::all();
        $this->data['employeesActive'] = 'active';
        return view('knitDyeing.dateKDdataList', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input('KD');
        $sccs = KnitDyeing::create($data);
        if ($sccs) {
            $order_id = $request->input('KD.order_id');
            Order::where('Id', $order_id)->update(['knitDyeingSts' => 1]);
            return redirect()->back();
        }
    }

    public function storeKdProgram(Request $request)
    {
        $array = session('kdProgramCompletArray');
        $data = $request->input('KD');
        $kdYrn = $request->input('kdYrn');
        $order_id = $request->input('KD.order_id');
        $data['sts'] = 1;

        if (!KnitDyeingProgram::where('order_id', $order_id)->first()) {
            $sccs = KnitDyeingProgram::create($data);
            if ($sccs) {
                //Order::where('Id', $order_id)->update(['knitDyeingSts' => 1]);
                if ($array) {
                    foreach ($array['kdColrSizeFabQtyArray'] as $row) {
                        $row['KDprgrmId'] = $sccs->id;
                        KdColorSizeFabricQty::create($row);
                    }
                    foreach ($array['kdCnsmpArray'] as $row) {
                        $row['KDprgrmId'] = $sccs->id;
                        KdConsumption::create($row);
                    }
                }
                foreach ($kdYrn['yrnDesc'] as $k=>$yrnDesc) {
                    if ($yrnDesc != '') {
                        $kdYrnArr[] = [
                            'order_id' => $order_id,
                            'KDprgrmId' => $sccs->id,
                            'yrnDesc' => $yrnDesc,
                            'yrnQty' => $kdYrn['yrnQty'][$k],
                            'cmnt' => $kdYrn['cmnt'][$k]
                        ];
                    }
                }

                if (isset($kdYrnArr)) {
                    foreach ($kdYrnArr as $kdYrnSngl) {
                        DB::table('kd_yrn_rqrd')->insert($kdYrnSngl);
                    }
                }

                Session::forget('kdProgramCompletArray');
            }
        }

        return 'Successfully save info';
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
        $data['order'] = Order::find($id);
        return view('knitDyeing.knitDyeingCreate', $data);
    }

    public function kntDyngEdit($id)
    {
        $data['knitDyeing'] = KnitDyeing::find($id);
        return view('knitDyeing.knitDyeingEdit', $data);
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
        $data = $request->input('KD');
        //dd($data);
        KnitDyeing::where('id', $id)->update($data);
        return redirect()->back();
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
