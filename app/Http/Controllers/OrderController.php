<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Po, App\BudgetFrOrder;
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


class OrderController extends Controller
{
    public function __construct()
    {

    }

    public function listTable()
    {
        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = Order::whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('orderManagement.shpmntTable', $this->data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$firstDay = date(isset($_GET['chart']) ? $_GET['chart'].'-01-01':'Y-01-01');
        $lastDay = date(isset($_GET['chart']) ? $_GET['chart'].'-01-01':'Y-12-31');*/
        //Order::where('order_status', 'Confirmed')->update(['order_status' => 'Running']);
        $chrtYr = $_GET['chart'];
        $firstDay = date($chrtYr.'-01-01');
        $lastDay = date($chrtYr.'-12-31');
        $forCharts = Order::whereBetween('date_of_ship', [$firstDay, $lastDay])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");

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
            if ($chart->date_of_ship <= date($chrtYr.'-01-31')) {
                $januaryQty[] = $chart->order_quantity;
                $januaryValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-02-28') && $chart->date_of_ship > date($chrtYr.'-01-31')) {
                $februaryQty[] = $chart->order_quantity;
                $februaryValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-03-31') && $chart->date_of_ship > date($chrtYr.'-02-28')) {
                $marchQty[] = $chart->order_quantity;
                $marchValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-04-30') && $chart->date_of_ship > date($chrtYr.'-03-31')) {
                $aprilQty[] = $chart->order_quantity;
                $aprilValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-05-31') && $chart->date_of_ship > date($chrtYr.'-04-30')) {
                $mayQty[] = $chart->order_quantity;
                $mayValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-06-30') && $chart->date_of_ship > date($chrtYr.'-05-31')) {
                $juneQty[] = $chart->order_quantity;
                $juneValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-07-31') && $chart->date_of_ship > date($chrtYr.'-06-30')) {
                $julyQty[] = $chart->order_quantity;
                $julyValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-08-31') && $chart->date_of_ship > date($chrtYr.'-07-31')) {
                $augustQty[] = $chart->order_quantity;
                $augustValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-09-30') && $chart->date_of_ship > date($chrtYr.'-08-31')) {
                $septemberQty[] = $chart->order_quantity;
                $septemberValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-10-31') && $chart->date_of_ship > date($chrtYr.'-09-30')) {
                $octoberQty[] = $chart->order_quantity;
                $octoberValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-11-30') && $chart->date_of_ship > date($chrtYr.'-10-31')) {
                $novemberQty[] = $chart->order_quantity;
                $novemberValue[] = $chart->unit_price*$chart->order_quantity;
            }
            if ($chart->date_of_ship <= date($chrtYr.'-12-31') && $chart->date_of_ship > date($chrtYr.'-11-30')) {
                $decemberQty[] = $chart->order_quantity;
                $decemberValue[] = $chart->unit_price*$chart->order_quantity;
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
        $this->data['yr']  = $chrtYr;

        $today = date('Y-m-d');
        $hasDays = date('Y-m-d', strtotime('10 days', strtotime($today)));
        $this->data['employees'] = Order::whereBetween('date_of_ship', [$today, $hasDays])->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
        $this->data['employeesActive'] = 'active';
        return view('orderManagement.orderList', $this->data);
    }

    //start autoCompltSrch
    public function autoCompltSrch($field, $searchKey)
    {
        $results = array();
        $data = Order::where($field, 'like', $searchKey.'%')->where('shipStatus', '=', 'running')->get()->sortBy("date_of_ship");
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
        $this->data['employeesActive'] = 'active';
        return view('orderManagement.shpmntTable', $this->data);
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
        return view('orderManagement.shpmntTable', $this->data);
    }

    //End autoCompltSrch

    public function searchDateRange($from, $to, $customer_name, $shipSts)
    {
        $from = DateTime::createFromFormat('d-m-Y', $from);
        $to = DateTime::createFromFormat('d-m-Y', $to);
        $from = $from->format('Y-m-d');
        $to = $to->format('Y-m-d');
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

        return view('orderManagement.shpmntTable', $this->data);
    }

    public function exportExcel()
    {
        $order = Order::select(
            'customer_name',
            'orderID',
            'article_no',
            'style_description',
            'date_of_ship',
            'order_quantity',
            'unit_price')->get();
        Excel::create('Shipment schedule', function($excel) use($order) {
            $excel->sheet('Sheet 1', function($sheet) use($order) {
                $sheet->fromArray($order);
            });
        })->export('xls');
    }

    public function chngShpmntSts($shipmntSts, $orderId)
    {
//        return $orderId; orderStsDate
        Order::where('order_number', $orderId)->update(['order_status' => $shipmntSts]);
    }

    public function shipQty($shipQty, $orderId)
    {
        Order::where('order_number', $orderId)->update(['shipmentQty' => $shipQty]);
    }

    public function actualShipDate($acShipDate, $orderId)
    {
        $acShipDate = DateTime::createFromFormat('d-m-Y', $acShipDate);
        $acShipDate = $acShipDate->format('Y-m-d');

        //return $acShipDate;
        Order::where('order_number', $orderId)->update(['actualShipDate' => $acShipDate]);
    }

    public function cancelShipDate($orderId)
    {
        //return $orderId . 'fff';
        Order::where('order_number', $orderId)->update(['shipStatus' => 'cancel']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->data['employeesActive'] =   'active';
        //$this->data['department']      =     Department::lists('deptName','id');

        return view('orderManagement.orderCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'yrnPrice' => 'required',
            'kntngPrice' => 'required',
            'dyngPrice' => 'required',
            'aopPrint' => 'required',
            'accessories' => 'required',
            'print' => 'required',
            'bankCharge' => 'required',
            'commission' => 'required',
            'fnshFabrcConsump' => 'required',
            'yrnConsumption' => 'required',
        ]);*/
        $data = $request->all();
        $budget = $request->input("budget");
        $date_of_ship = $request->input("date_of_ship");
        $dateFmt = DateTime::createFromFormat('d/m/Y', $date_of_ship);
        $data['date_of_ship'] = $dateFmt->format('Y-m-d');
        $data['garmentImg'] = 'tShirt.png';
        if ($request->hasFile('garmentImg')) {
            $file = $request->file('garmentImg');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(250, 300)->save(public_path('assets/garmentsImage/'. $fileName));
            $data['garmentImg'] = $fileName;//return $data['garmentImg'];
        }
        $order = Order::create($data);
        $budget['order_id'] = $order->id;
        BudgetFrOrder::create($budget);

        return 'Successfully save info';
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

            return view('orderManagement.orderCreate', $data);
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

        return view('orderManagement.orderInfo', $data);
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
        $date_of_ship = $request->input("date_of_ship");
        $dateFmt = DateTime::createFromFormat('d/m/Y', $date_of_ship);
        $val['date_of_ship'] = $dateFmt->format('Y-m-d');

        $val['orderID'] = $request->input('orderID');
        $val['customer_name'] = $request->input('customer_name');
        //$val['date_of_entry'] = $request->input('date_of_entry');
        $val['order_type'] = $request->input('order_type');
        $val['season'] = $request->input('season');
        $val['order_status'] = $request->input('order_status');
        $val['apparel_type'] = $request->input('apparel_type');
        $val['order_quantity'] = $request->input('order_quantity');
        $val['unit_price'] = $request->input('unit_price');
        $val['article_no'] = $request->input('article_no');
        $val['style_description'] = $request->input('style_description');
        $val['fabric_description'] = $request->input('fabric_description');
        $val['cmPerDz'] = $request->input('cmPerDz');
        $val['smv'] = $request->input('smv');
        $val['sales_person'] = $request->input('sales_person');
        if ($request->hasFile('garmentImg')) {
            $file = $request->file('garmentImg');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(250, 300)->save(public_path('assets/garmentsImage/'. $fileName));
            $val['garmentImg'] = $fileName;//return $data['garmentImg'];
        }

        $order = Order::where('order_number', $orderNumber)->get()->first();
        $budget = $request->input("budget");
        $budget['order_id'] = $order->Id;
        if (count(BudgetFrOrder::where("order_id", $budget['order_id'])->get()->first()) > 0) {
            BudgetFrOrder::where("order_id", $budget['order_id'])->update($budget);
        } else {
            BudgetFrOrder::create($budget);
        }
        Order::where('order_number', $orderNumber)->update($val);
        return "Information Updated Successfully !";/*Information Updated Successfully !*/
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
