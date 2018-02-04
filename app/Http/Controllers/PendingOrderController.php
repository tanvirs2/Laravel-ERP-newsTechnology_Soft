<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Po, App\BudgetFrOrder, App\KnitDyeing;
use App\Order;
use App\FabricDetails;
use App\SizeColor;
use App\FabricSample;
use App\LabdipInfo;
use App\YarnInfo;
use DateTime;
use App\Http\Requests;
use Excel;
use Image;


class PendingOrderController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autoAddVal()
    {
        KnitDyeing::where("grmntQTY", "=", "")->update(['grmntQTY' => 0]);
        /*BudgetFrOrder::where("yrnConsumption", "=", "")->update(['yrnConsumption' => 0]);
        BudgetFrOrder::where("yrnPrice", "=", "")->update(['yrnPrice' => 0]);
        BudgetFrOrder::where("kntngPrice", "=", "")->update(['kntngPrice' => 0]);
        BudgetFrOrder::where("dyngPrice", "=", "")->update(['dyngPrice' => 0]);
        BudgetFrOrder::where("aopPrint", "=", "")->update(['aopPrint' => 0]);
        BudgetFrOrder::where("accessories", "=", "")->update(['accessories' => 0]);
        BudgetFrOrder::where("testCost", "=", "")->update(['testCost' => 0]);
        BudgetFrOrder::where("print", "=", "")->update(['print' => 0]);
        BudgetFrOrder::where("bankCharge", "=", "")->update(['bankCharge' => 0]);
        BudgetFrOrder::where("commission", "=", "")->update(['commission' => 0]);
        BudgetFrOrder::where("buyingComssn", "=", "")->update(['buyingComssn' => 0]);
        BudgetFrOrder::where("fnshFabrcConsump", "=", "")->update(['fnshFabrcConsump' => 0]);
        BudgetFrOrder::where("freightChrge", "=", "")->update(['freightChrge' => 0]);
        BudgetFrOrder::where("others", "=", "")->update(['others' => 0]);*/

    }


    public function index()
    {
        //Order::where('order_status', 'Confirmed')->update(['order_status' => 'Running']);
        $grandPendingSum = Order::where(
            [
                ['shipStatus', '=', 'running'],
                ['date_of_ship', '<=', date('Y-m-d')],
                [function ($query) {
                    $query
                        ->leftJoin('production', 'order_details.Id', '=', 'production.order_id')
                        ->where('order_status', '=', 'Partial Shipment')
                        ->orWhere('order_status', '=', 'Running');
                    }
                ]
            ])->get();

        $grandPendingQty = [];
        $grandPendingValue = [];

        foreach ($grandPendingSum as $grandPending) {
            $grmntQty = $grandPending->order_quantity - $grandPending->shipmentQty;
            $grandPendingQty[] = $grmntQty;
            $grandPendingValue[] = $grandPending->unit_price*$grmntQty;
        }


        $this->data['grandPendingQty'] = array_sum($grandPendingQty);
        $this->data['grandPendingValue'] = array_sum($grandPendingValue);

        /*************************************************************/

        $firstDay = date('Y-01-01');
        $lastDay = date('Y-12-31');
        $forCharts = Order::whereBetween('date_of_ship', [$firstDay, $lastDay])->where(
            [
                ['shipStatus', '=', 'running'],
                ['date_of_ship', '<=', date('Y-m-d')],
                [function ($query) {
                    $query
                        ->where('order_status', '=', 'Partial Shipment')
                        ->orWhere('order_status', '=', 'Running');
                    }
                ]
            ])->get()->sortBy("date_of_ship");

        $januaryQty   = [];
        $februaryQty  = [];
        $marchQty     = [];
        $aprilQty     = [];
        $mayQty       = [];
        $juneQty      = [];
        $julyQty      = [];
        $augustQty    = [];
        $septemberQty = [];
        $octoberQty   = [];
        $novemberQty  = [];
        $decemberQty  = [];

        $januaryValue   = [];
        $februaryValue  = [];
        $marchValue     = [];
        $aprilValue     = [];
        $mayValue       = [];
        $juneValue      = [];
        $julyValue      = [];
        $augustValue    = [];
        $septemberValue = [];
        $octoberValue   = [];
        $novemberValue  = [];
        $decemberValue  = [];
        foreach ($forCharts as $chart) {
            $grmntQty = $chart->order_quantity - $chart->shipmentQty;
            if ($chart->date_of_ship <= date('Y-01-31')) {
                $januaryQty[] = $grmntQty;
                $januaryValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-02-28') && $chart->date_of_ship > date('Y-01-31')) {
                $februaryQty[] = $grmntQty;
                $februaryValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-03-31') && $chart->date_of_ship > date('Y-02-28')) {
                $marchQty[] = $grmntQty;
                $marchValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-04-30') && $chart->date_of_ship > date('Y-03-31')) {
                $aprilQty[] = $grmntQty;
                $aprilValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-05-31') && $chart->date_of_ship > date('Y-04-30')) {
                $mayQty[] = $grmntQty;
                $mayValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-06-30') && $chart->date_of_ship > date('Y-05-31')) {
                $juneQty[] = $grmntQty;
                $juneValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-07-31') && $chart->date_of_ship > date('Y-06-30')) {
                $julyQty[] = $grmntQty;
                $julyValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-08-31') && $chart->date_of_ship > date('Y-07-31')) {
                $augustQty[] = $grmntQty;
                $augustValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-09-30') && $chart->date_of_ship > date('Y-08-31')) {
                $septemberQty[] = $grmntQty;
                $septemberValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-10-31') && $chart->date_of_ship > date('Y-09-30')) {
                $octoberQty[] = $grmntQty;
                $octoberValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-11-30') && $chart->date_of_ship > date('Y-10-31')) {
                $novemberQty[] = $grmntQty;
                $novemberValue[] = $chart->unit_price*$grmntQty;
            }
            if ($chart->date_of_ship <= date('Y-12-31') && $chart->date_of_ship > date('Y-11-30')) {
                $decemberQty[] = $grmntQty;
                $decemberValue[] = $chart->unit_price*$grmntQty;
            }
        }

        $this->data['januaryQty']   = array_sum($januaryQty  );
        $this->data['februaryQty']  = array_sum($februaryQty );
        $this->data['marchQty']     = array_sum($marchQty    );
        $this->data['aprilQty']     = array_sum($aprilQty    );
        $this->data['mayQty']       = array_sum($mayQty      );
        $this->data['juneQty']      = array_sum($juneQty     );
        $this->data['julyQty']      = array_sum($julyQty     );
        $this->data['augustQty']    = array_sum($augustQty   );
        $this->data['septemberQty'] = array_sum($septemberQty);
        $this->data['octoberQty']   = array_sum($octoberQty  );
        $this->data['novemberQty']  = array_sum($novemberQty );
        $this->data['decemberQty']  = array_sum($decemberQty );

        $this->data['januaryValue']   = array_sum($januaryValue  );
        $this->data['februaryValue']  = array_sum($februaryValue );
        $this->data['marchValue']     = array_sum($marchValue    );
        $this->data['aprilValue']     = array_sum($aprilValue    );
        $this->data['mayValue']       = array_sum($mayValue      );
        $this->data['juneValue']      = array_sum($juneValue     );
        $this->data['julyValue']      = array_sum($julyValue     );
        $this->data['augustValue']    = array_sum($augustValue   );
        $this->data['septemberValue'] = array_sum($septemberValue);
        $this->data['octoberValue']   = array_sum($octoberValue  );
        $this->data['novemberValue']  = array_sum($novemberValue );
        $this->data['decemberValue']  = array_sum($decemberValue );

        $today = date('Y-m-d');
        $hasDays = date('2016-01-01');
        //$hasDays = date('Y-m-d', strtotime('-10 days', strtotime($today)));
        $this->data['employees'] =
            Order::whereBetween('date_of_ship', [$hasDays, $today])->where([['shipStatus', '=', 'running'], ['date_of_ship', '<=', date('Y-m-d')],
                [function ($query) {
                $query
                    ->where('order_status', '=', 'Partial Shipment')
                    ->orWhere('order_status', '=', 'Running');
                }]])->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('pendinOrder.pendingList', $this->data);
    }

    //start autoCompltSrch
    public function autoCompltSrch($field, $searchKey)
    {
        $results = array();
        $data = Order::where([['shipStatus', '=', 'running'], ['date_of_ship', '<=', date('Y-m-d')],
            [function ($query) {
                $query
                    ->where('order_status', '=', 'Partial Shipment')
                    ->orWhere('order_status', '=', 'Running');
            }]])->get()->sortBy("date_of_ship");
        foreach ($data as $query)
        {
            $results[] =  $query->$field;
            $results = array_unique($results);
        }
        return response()->json($results);
    }

    public function autoCompltRslt($field, $actionName, $from, $to)
    {
        //return $field.' / '.$actionName.' / '.$from.' / '.$to;

        if (strpos($actionName, '-') !== false){
            $actionName = str_replace('-', '/', $actionName);
        }
        if (strpos($actionName, '******') !== false){
            $actionName = str_replace('******', '-', $actionName);
        }

        //return $field.' / '.$actionName.' / '.$from.' / '.$to;

        if ($from != '-') {
            $from = DateTime::createFromFormat('d-m-Y', $from);
            $to = DateTime::createFromFormat('d-m-Y', $to);
            $from = $from->format('Y-m-d');
            $to = $to->format('Y-m-d');
            $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where([[$field, '=', $actionName], ['shipStatus', '=', 'running'], ['date_of_ship', '<=', date('Y-m-d')],
                [function ($query) {
                    $query
                        ->where('order_status', '=', 'Partial Shipment')
                        ->orWhere('order_status', '=', 'Running');
                }]])->get()->sortBy("date_of_ship");
        } else {
            $this->data['employees'] = Order::where([[$field, '=', $actionName], ['shipStatus', '=', 'running'], ['date_of_ship', '<=', date('Y-m-d')],
                [function ($query) {
                    $query
                        ->where('order_status', '=', 'Partial Shipment')
                        ->orWhere('order_status', '=', 'Running');
                }]])->get()->sortBy("date_of_ship");
        }
        $this->data['employeesActive'] = 'active';
        return view('pendinOrder.pendingTable', $this->data);
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

        //$this->data['employees'] = Order::where($field, '=', $actionName)->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('pendinOrder.pendingTable', $this->data);
    }

    //End autoCompltSrch

    public function searchDateRange($from, $to, $customer_name, $shipSts)
    {
        $from = DateTime::createFromFormat('d-m-Y', $from);
        $to = DateTime::createFromFormat('d-m-Y', $to);
        $from = $from->format('Y-m-d');
        $to = $to->format('Y-m-d');
        if ($customer_name == '-' && $shipSts == '-') {
            $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where([['shipStatus', '=', 'running'], ['date_of_ship', '<=', date('Y-m-d')],
                [function ($query) {
                    $query
                        ->where('order_status', '=', 'Partial Shipment')
                        ->orWhere('order_status', '=', 'Running');
                }]])->get()->sortBy("date_of_ship");
        }
        if ($customer_name != '-' && $shipSts != '-') {
            $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where([['customer_name', '=', $customer_name], ['order_status', '=', $shipSts], ['shipStatus', '=', 'running'], ['date_of_ship', '<=', date('Y-m-d')],
                [function ($query) {
                    $query
                        ->where('order_status', '=', 'Partial Shipment')
                        ->orWhere('order_status', '=', 'Running');
                }]])->get()->sortBy("date_of_ship");
        } else {
            if ($customer_name != '-') {
                $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where('customer_name', '=', $customer_name)->where('shipStatus', '=', 'running')->where(
        function ($query) {
            $query
                ->where('order_status', '=', 'Partial Shipment')
                ->orWhere('order_status', '=', 'Running');
        })->get()->sortBy("date_of_ship");
            }
            if ($shipSts != '-') {
                $this->data['employees'] = Order::whereBetween('date_of_ship', [$from, $to])->where(
                    [
                        ['order_status', '=', $shipSts],
                        ['shipStatus', '=', 'running'],
                        ['date_of_ship', '<=', date('Y-m-d')],
                        [function ($query) {
                        $query
                            ->where('order_status', '=', 'Partial Shipment')
                            ->orWhere('order_status', '=', 'Running');
                        }]
                    ])->get()->sortBy("date_of_ship");
            }
        }

        return view('pendinOrder.pendingTable', $this->data);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_number)
    {
        //edit request from order list
        if (strpos($order_number, '||EditReqFrmList') !== false) {
            $order_number = str_replace('||EditReqFrmList', "", $order_number);
            $data['isData'] = Order::where('order_number', $order_number)->get()->first();

            return view('pendinOrder.orderCreate', $data);
        }
        //edit request
        if (strpos($order_number, '||EditReq') !== false) {
            $order_number = str_replace('||EditReq', "", $order_number);
            $isData = Order::where('order_number', $order_number)->get()->first();
            if ($isData->order_number == true) {
                return 'Found';
            } else {
                return 'Not Found';
            }
        }

        if (strpos($order_number, '||getData') !== false) {
            $order_number = str_replace('||getData', "", $order_number);
            $data['isData'] = Order::where('order_number', $order_number)->first();
            $data['budget'] = BudgetFrOrder::where('order_id', $data['isData']->Id)->get()->first();
            /*if (count(BudgetFrOrder::where("order_id", $data['isData']->Id)->get()->first()) > 0) {

            }*/
            if ($data['isData']->order_number == true) {
                return $data;
            } else {
                return 'Not Found';
            }
        }

        $data['orderInfo']      = Order::where('order_number', '=', $order_number)->get()->first();

        $data['FabricDetails']  = FabricDetails::where('order_number', '=', $order_number)->get()->first();
        $data['sizeColorInfo']  = SizeColor::where('order_number', '=', $order_number)->get()->first();
        $data['sizeColorInfo']  = LabdipInfo::where('order_number', '=', $order_number)->get()->first();
        $data['sizeColorInfo']  = YarnInfo::where('order_number', '=', $order_number)->get()->first();

        return view('pendinOrder.orderInfo', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orderNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderNumber)
    {
        //return $orderNumber;
        Order::where('order_number', '=', $orderNumber)->delete();
        Po::where('order_number', '=', $orderNumber)->delete();
        SizeColor::where('order_number', '=', $orderNumber)->delete();
        FabricSample::where('order_number', '=', $orderNumber)->delete();
        LabdipInfo::where('order_number', '=', $orderNumber)->delete();
        YarnInfo::where('order_number', '=', $orderNumber)->delete();

        return $output['success'] = 'deleted';
    }
}
