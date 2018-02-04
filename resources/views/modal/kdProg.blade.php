{{--@extends('layouts.app')

@section('content')--}}
{{--<div class="col-md-3"></div>--}}


<div class="col-md-12">
    {{--<pre>--}}
    <?php
    $tn = [];
    foreach ($kdPrgrmData->kdColrSizeFabQty as $rows) {
        $fabQtys[] = $rows['fabQty'];
        $size[] = $rows['sizeID'];
        $color[] = $rows['colorID'];
    }

    $sizeID = array_unique($size);
    $colorID = array_unique($color);

    /***** Start Column for size *****/
    foreach ($sizeID as $siz) {
        $sizSort[] = DB::table("sizes")->where("id", $siz)->value("size_name");
    }
    /***** End Column for size *****/

    $fabQtyChnk = array_chunk($fabQtys, count($colorID));
    ?>

    <div class="col-md-5 panel panel-default">
        <table class="table table-striped">
            <tr>
                <td>Buyer Name</td>
                <td class="modalBuyerName">{{ $orderData->customer_name }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Style</td>
                <td class="modalStyleDesc">{{ $orderData->article_no }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Order No</td>
                <td class="modalOrderNo">{{ $orderData->orderID }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Order Qty</td>
                <td class="modalOrderQty">{{ $orderData->order_quantity }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ship Date</td>
                <td class="modalShipDate">{{ $orderData->date_of_ship }}</td>
                <td></td>
                <td></td>
            </tr>

        </table>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-5 panel panel-default">
        <table>
            <tr>
                <td>
                    <table class="table table-striped">
                        <tr>
                            <td>BODY/ SLV FABRICATION</td>
                            <td></td>
                            <td>{{ $kdPrgrmData->bodyOrSlvDesc }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>INSERTER/ RIB FABRICATION</td>
                            <td></td>
                            <td>{{ $kdPrgrmData->inserterRibDesc }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>NECK TAPE</td>
                            <td></td>
                            <td>{{ $kdPrgrmData->neckTapeDesc }}</td>
                            <td></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </div>
    <table class="table" id="kdTblForJs">

        <tr>
            <td class="text-center">
                COLOR/ SIZE ORDER QTY
            </td>
        </tr>

        <tr>
            <td>
                <table class="table table-striped table-bordered">
                    {{--*/ $sl = 0; $colorSumArr /*--}}
                    <tr>
                        <td style="">🠟SZ/CL🠞</td>
                        @foreach($colorID as $colrRow)
                            <td class="colorTd">{{ $color_name[] = DB::table("colors")->where("id", $colrRow)->value("color_name") }}</td>
                        @endforeach
                    </tr>
                    @foreach($fabQtyChnk as $fabQty)
                        <tr>
                            <td class="sizeTd">{{ $sizSort[$sl++] }}</td>
                            @foreach($fabQty as $fabRow)
                                <td>{{ $fabRow }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr style="">
                        <td class="text-center">
                            Total ->
                        </td>

                        @foreach($colorID as $colrRow)
                            <td class="">{{ $colorSumArr[] = DB::table('kd_color_size_wise_fabric_qty')->where([['colorID', '=', $colrRow], ['KDprgrmId', '=', $kdPrgrmData->id]])->sum('fabQty') }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="text-center">
                            CONSUMPTION
                        </td>
                    </tr>
                    <tr>
                        <td>BODY/ SLV FINI</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            <td>{{ $cnsmptionCol->bodyOrSlvFini }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>PROCESS LOSS(%)</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            <td>{{ $cnsmptionCol->bodyOrSlvFini_ProcessLs }}</td>
                        @endforeach
                    </tr>
                    <tr class="yellTd" style="">
                        <td>BODY/ SLV GREY</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            @php
                                $percentage = $cnsmptionCol->bodyOrSlvFini_ProcessLs;
                                $totalWidth = $cnsmptionCol->bodyOrSlvFini;
                                $new_width = $totalWidth+($percentage / 100) * $totalWidth;
                            @endphp
                            <td>{{ round($new_width, 2) }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>RIB FINI</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            <td>{{ $cnsmptionCol->ribFinish }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>PROCESS LOSS(%)</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            <td>{{ $cnsmptionCol->ribFinish_ProcessLs }}</td>
                        @endforeach
                    </tr>
                    <tr style="">
                        <td>RIB GREY</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            @php
                                $percentage = $cnsmptionCol->ribFinish_ProcessLs;
                                $totalWidth = $cnsmptionCol->ribFinish;
                                $new_width = $totalWidth+($percentage / 100) * $totalWidth;
                            @endphp
                            <td>{{ round($new_width, 2) }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>NECK TAPE FINI</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            <td>{{ $cnsmptionCol->neckTapeFini }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>PROCESS LOSS(%)</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            <td>{{ $cnsmptionCol->neckTapeFini_ProcessLs }}</td>
                        @endforeach
                    </tr>
                    <tr style="">
                        <td>NECK TAPE GREY</td>
                        @foreach($kdPrgrmData->kdConsumption as $cnsmptionCol)
                            @php
                                $percentage = $cnsmptionCol->neckTapeFini_ProcessLs;
                                $totalWidth = $cnsmptionCol->neckTapeFini;
                                $new_width = $totalWidth+($percentage / 100) * $totalWidth;
                            @endphp
                            <td>{{ $new_width }}</td>
                        @endforeach
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                FABRICS
            </td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered" id="fabricsTab">
                    <tr>
                        <td></td>
                        <td></td>
                        @foreach($color_name as $colrRow)
                            <td class="colorTd">{{ $colrRow }}</td>
                        @endforeach
                        <td>Total</td>
                    </tr>

                    <tr>
                        <td>BODY/ SLV FINI</td>
                        <td rowspan="2">{{ $kdPrgrmData->bodyOrSlvDesc }}</td>
                        @foreach($kdPrgrmData->kdConsumption as $k => $cnsmptionCol)
                            <td>{{ $bodySlvFini[] = round($colorSumArr[$k]/12*$cnsmptionCol->bodyOrSlvFini, 2) }}</td>
                        @endforeach
                        <td>{{ array_sum($bodySlvFini) }}</td>
                    </tr>

                    <tr>
                        <td>BODY/ SLV GREY</td>
                        @foreach($kdPrgrmData->kdConsumption as $k => $cnsmptionCol)
                            <td>{{ $bodySlvGray[] = round($bodySlvFini[$k] + $bodySlvFini[$k] * ($cnsmptionCol->bodyOrSlvFini_ProcessLs/100), 2) }}</td>
                        @endforeach
                        <td>{{ array_sum($bodySlvGray) }}</td>
                    </tr>
                    <tr>
                        <td>RIB FINI</td>
                        <td rowspan="2">{{ $kdPrgrmData->inserterRibDesc }}</td>
                        @foreach($kdPrgrmData->kdConsumption as $k => $cnsmptionCol)
                            <td>{{ $ribFini[] = round($colorSumArr[$k]/12*$cnsmptionCol->ribFinish, 2) }}</td>
                        @endforeach
                        <td>{{ array_sum($ribFini) }}</td>
                    </tr>

                    <tr>
                        <td>RIB GREY</td>
                        @foreach($kdPrgrmData->kdConsumption as $k => $cnsmptionCol)
                            <td>{{ $ribGray[] = round($ribFini[$k]+ $ribFini[$k] * ($cnsmptionCol->ribFinish_ProcessLs/100), 2) }}</td>
                        @endforeach
                        <td>{{ array_sum($ribGray) }}</td>
                    </tr>
                    <tr>
                        <td>NECK TAPE FINI</td>
                        <td rowspan="2">{{ $kdPrgrmData->neckTapeDesc }}</td>
                        @foreach($kdPrgrmData->kdConsumption as $k => $cnsmptionCol)
                            <td>{{ $nekFini[] = round($colorSumArr[$k]/12*$cnsmptionCol->neckTapeFini, 2) }}</td>
                        @endforeach
                        <td>{{ array_sum($nekFini) }}</td>
                    </tr>

                    <tr>
                        <td>NECK TAPE GREY</td>
                        @foreach($kdPrgrmData->kdConsumption as $k => $cnsmptionCol)
                            <td>{{ $nekGray[] = round($nekFini[$k]+ $nekFini[$k] * ($cnsmptionCol->neckTapeFini_ProcessLs/100), 2) }}</td>
                        @endforeach
                        <td>{{ array_sum($nekGray) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        @foreach($kdPrgrmData->kdConsumption as $k => $cnsmptionCol)
                            <td></td>
                        @endforeach
                        <td></td>
                    </tr>
                    <tr>
                        <td>TOTAL FINI</td>
                        <td rowspan=""></td>
                        @foreach($bodySlvFini as $k => $cnsmptionCol)
                            <td>{{ $allFiniSum[] = $bodySlvFini[$k] + $ribFini[$k] + $nekFini[$k] }}</td>
                        @endforeach
                        <td>{{ array_sum($allFiniSum) }}</td>
                    </tr>
                    <tr>
                        <td>TOTAL GREY</td>
                        <td></td>
                        @foreach($bodySlvFini as $k => $cnsmptionCol)
                            <td>{{ $allGraySum[] = $bodySlvGray[$k] + $ribGray[$k] + $nekGray[$k] }}</td>
                        @endforeach
                        <td>{{ array_sum($allGraySum) }}</td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                FABRICS SUMMERY
            </td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Garments Part</th>
                        <th>Fabrication</th>
                        <th>Dyeing Color</th>
                        <th>Finish Fab Qty/ Kg</th>
                        <th>Grey Fab Qty/ Kg</th>
                        <th>LD Ref</th>
                    </tr>
                    <tr style="display: none">
                        @foreach($color_name as $colrRow)
                            <td class="colorTd">{{ $colrRow }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>BODY/ SLV FABRICATION</td>
                        <td>{{ $kdPrgrmData->bodyOrSlvDesc }}</td>
                        <td>All Color</td>
                        <td>{{ $finiFabSum[] = round(array_sum($bodySlvFini)) }}</td>
                        <td>{{ $graFabSum[] = array_sum($bodySlvGray) }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>INSERTER/ RIB FABRICATION</td>
                        <td>{{ $kdPrgrmData->inserterRibDesc }}</td>
                        <td>All Color</td>
                        <td>{{ $finiFabSum[] = round(array_sum($ribFini)) }}</td>
                        <td>{{ $graFabSum[] = array_sum($ribGray) }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>NECK TAPE</td>
                        <td>{{ $kdPrgrmData->neckTapeDesc }}</td>
                        <td>All Color</td>
                        <td>{{ $finiFabSum[] = round(array_sum($nekFini)) }}</td>
                        <td>{{ $graFabSum[] = array_sum($nekGray) }}</td>
                        <td></td>
                    </tr>

                    <tr style="font-weight: bold">
                        <td></td>
                        <td></td>
                        <td>Total-></td>
                        <td></td>
                        <td id="finishFabRqrSum">{{ array_sum($finiFabSum) }}</td>
                        <td id="grayFabSum">{{ array_sum($graFabSum) }}</td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>YarnDesc(COMP+COUNT)</th>
                        <th>Quantity</th>
                        <th>COMMENTS</th>
                    </tr>
                    @php($sl = 1)
                    @foreach(DB::table('kd_yrn_rqrd')->where('order_id', $ordId)->get() as $kd_yrn_rqrd)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $kd_yrn_rqrd->yrnDesc }}</td>
                            <td>{{ $kd_yrn_rqrd->yrnQty }}</td>
                            <td>{{ $kd_yrn_rqrd->cmnt }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                Comment
            </td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>Order Qty</th>
                        <th>Marketing Qty</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <th>{{ $ordQty = $orderData->order_quantity }}</th>
                        <th>{{ $mrktingQty = ($orderData->order_quantity*$budgetData->yrnConsumption)/12 }}</th>
                        <th>
                            @if(array_sum($allGraySum) > $mrktingQty)
                                <h4><b>CONSUMPTION OVER</b></h4>
                            @else
                                Under Consumption from marketing
                            @endif
                        </th>
                    </tr>

                </table>

            </td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>
                            <span class="pull-left"><u>Merchandiser</u></span>
                        </th>
                        <th>
                            <span style="margin-left: 30%"><u>AGM (MKT. Merchandising)</u></span>
                        </th>
                        <th>
                            <span class="pull-right"><u>CEO/ Chairman</u></span>
                        </th>
                    </tr>
                </table>
            </td>
        </tr>

        {{--<tr>
            <td>
                <div class="row">
                    <div class="col-sm-4">
                        <span class="pull-left">
                            <u>Merchandiser</u>
                        </span>
                    </div>

                    <div class="col-sm-4">
                        <span>
                            <u>AGM (MKT. Merchandising)</u>
                        </span>
                    </div>

                    <div class="col-sm-4">
                        <span class="pull-right">
                            <u>CEO/ Chairman</u>
                        </span>
                    </div>

                </div>
            </td>
        </tr>--}}
    </table>

</div>