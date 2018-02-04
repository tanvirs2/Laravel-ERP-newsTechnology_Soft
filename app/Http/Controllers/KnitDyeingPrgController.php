<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\KnitDyeingProgram;
use DB;
use App\KdColorSizeFabricQty;
use App\KdConsumption;
use App\BudgetFrOrder;
use App\Http\Requests;

class KnitDyeingPrgController extends Controller
{

    /*Ajax Modal Start*/
    public function ajxYrnIssForm($orderId, $kdPrgrmId)
    {
        $data = [
            'orderId' => $orderId,
            'kdPrgrmId' => $kdPrgrmId,
        ];
        return view('ajaxFile/KDprgrm/ajxYrnIssForm', $data);
    }
    /*Ajax Modal End*/

    public function index()
    {
        return 'tan';
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['ordId'] = $id;
        $data['kdPrgrmData'] = KnitDyeingProgram::where('order_id', $id)->first();
        $data['orderData'] = Order::where('Id', $id)->first();
        $data['budgetData'] = BudgetFrOrder::where('order_id', $id)->first();
        return view('modal.kdProg', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order_id)
    {
        $data['orderData'] = Order::where('Id', $order_id)->first();
        $data['kdHeadData'] = KnitDyeingProgram::where('order_id', $order_id)->first();

        $kdPrgrm = $data['kdHeadData'];

        $data['kdPrgrmYrnInfo'] = DB::table('kd_yrn_rqrd')->where('KDprgrmId', $kdPrgrm->id)->get();
        $data['KdColorSizeFabricQty'] = KdColorSizeFabricQty::where('KDprgrmId', $kdPrgrm->id)->get();
        $data['KdConsumption'] = KdConsumption::where('KDprgrmId', $kdPrgrm->id)->get();

        return view("knitDyeing/kdProgramEdit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order_id)
    {
        $KD = $request->input('KD');
        $clrSzFb = $request->input('clrSzFb');
        $consump = $request->input('consump');
        $kdYrn = $request->input('kdYrn');
        $data['kdHeadData'] = KnitDyeingProgram::where('order_id', $order_id)->update($KD);

        foreach ($clrSzFb['id'] as $key=>$id) {
            $clrSzFbArr[] = [
                'id' => $id,
                'colorID' => $clrSzFb['colorID'][$key],
                'sizeID' => $clrSzFb['sizeID'][$key],
                'fabQty' => $clrSzFb['fabQty'][$key],
            ];
        }

        foreach ($clrSzFbArr as $clrSz) {
            KdColorSizeFabricQty::where('id', $clrSz['id'])->update($clrSz);
        }

        foreach ($consump['id'] as $key=>$id) {
            $consumpArr[] = [
                'id' => $id,
                'colorID'                   => $consump['colorID'][$key],
                'bodyOrSlvFini'             => $consump['bodyOrSlvFini'][$key],
                'bodyOrSlvFini_ProcessLs'   => $consump['bodyOrSlvFini_ProcessLs'][$key],
                'ribFinish'                 => $consump['ribFinish'][$key],
                'ribFinish_ProcessLs'       => $consump['ribFinish_ProcessLs'][$key],
                'neckTapeFini'              => $consump['neckTapeFini'][$key],
                'neckTapeFini_ProcessLs'    => $consump['neckTapeFini_ProcessLs'][$key],
            ];
        }
        foreach ($consumpArr as $cons) {
            KdConsumption::where('id', $cons['id'])->update($cons);
        }
        if (isset($kdYrn)) {
            foreach ($kdYrn['id'] as $key=>$id) {
                $kdYrnArr[] = [
                    'id' => $id,
                    'yrnDesc' => $kdYrn['yrnDesc'][$key],
                    'yrnQty' => $kdYrn['yrnQty'][$key],
                    'cmnt' => $kdYrn['cmnt'][$key],
                ];
            }

            foreach ($kdYrnArr as $kdYr) {
                DB::table('kd_yrn_rqrd')->where('id', $kdYr['id'])->update($kdYr);
            }
        }
        //return view("knitDyeing/kdProgramEdit", $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_id = $id;
        $data['kdHeadData'] = KnitDyeingProgram::where('order_id', $order_id)->delete();

        $kdPrgrm = $data['kdHeadData'];

        DB::table('kd_yrn_rqrd')->where('KDprgrmId', $kdPrgrm->id)->delete();
        KdColorSizeFabricQty::where('KDprgrmId', $kdPrgrm->id)->delete();
        KdConsumption::where('KDprgrmId', $kdPrgrm->id)->delete();

        //return view("knitDyeing/kdProgramEdit", $data);
    }


    public function delete_kd($id)
    {
        $order_id = $id;
        $data['kdHeadData'] = KnitDyeingProgram::where('order_id', $order_id)->first();
        KnitDyeingProgram::where('order_id', $order_id)->delete();

        $kdPrgrm = $data['kdHeadData'];

        KdColorSizeFabricQty::where('KDprgrmId', $kdPrgrm->id)->delete();
        KdConsumption::where('KDprgrmId', $kdPrgrm->id)->delete();
        DB::table('kd_yrn_rqrd')->where('KDprgrmId', $kdPrgrm->id)->delete();

        //return true;
    }
}
