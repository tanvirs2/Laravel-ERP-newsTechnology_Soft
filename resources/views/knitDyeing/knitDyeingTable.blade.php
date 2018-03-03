<tbody id="childTable">
<?php $var = 1; $totYrnRcvSum=0; $sumYrnRcvSum=0; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totCMperDz = 0; $totCmV = 0; $totSMV = 0;
$KDgrmntQTY = 0; $KDcolorYarnRqrd = 0; $KDyarnIss = 0; $KDkntQty = 0; $KDdyeingQty = 0; $KDfnshFabRqrd = 0; $KDfnshFabRcv = 0; $kdFnshFabBlnc = 0; $KDfnshFabIss=0;
$totalKDgrmntQTY = 0; $totalKDcolorYarnRqrd = 0; $totalKDyarnIss = 0; $totalKDkntQty = 0; $totalKDdyeingQty = 0; $totalKDfnshFabRqrd = 0; $totalKDfnshFabRcv = 0; $totalkdFnshFabBlnc = 0; $totalKDfnshFabIss = 0;
$totMrktingQty = 0;

$allGraySum = []; $allFiniSum = []; $size = []; $color = []; $fabQtys = []; $bodySlvGray = [];

/*func start*/
function labDipFormula($formulaDigit, $obj)
{
    $entryDate = strtotime($obj->date_of_entry);
    $shpDate = strtotime($obj->date_of_ship);
    $diff = $shpDate - $entryDate;
    $days = $diff / (60 * 60 * 24);
    //echo $days;
    /*
      $days = $days+1;
      $formula = round($formulaDigit * $days / 60);
    */
    $formula = floor(($formulaDigit / 100) * $days);
    $date = date_create($obj->date_of_entry);
    date_add($date, date_interval_create_from_date_string($formula.' days'));

    $stdObject = new stdClass();
    $stdObject->tnaDate = date_format($date, 'Y-m-d');
    $stdObject->tnaHtmlView = date_format($date, 'd M').'<span class="actDateClass" style="display:none">'.date_format($date, 'Y-m-d').'</span>';

    return $stdObject;
}


function arraySumFromKey($arr, $key) //
{
    $tmp = array();
    $result = array();
    foreach ($arr as $childArr) {
        if (!in_array($childArr[$key], $tmp)) {
            array_push($tmp, $childArr[$key]);
            array_push($result, $childArr);
        }
    }
    $arrUnqByKyData = $result;
    foreach ($arrUnqByKyData as $sngl) {
        $cnt = 0;
        foreach ($arr as $item) {
            if ($sngl[$key] == $item[$key]) {
                $cnt++;
                if ($cnt > 1) {
                    $dupl[] = $item; //return only duplicate without main array
                }
            }
        }
    }
    if (isset($dupl)) {
        foreach ($dupl as $protiDupli) {
            foreach ($arrUnqByKyData as $k => $protiArrUnqByKyData) {
                if ($protiDupli[$key] == $protiArrUnqByKyData[$key]) {
                    $arrUnqByKyData[$k]['fabQty'] += $protiDupli['fabQty'];
                }
            }
        }
    }


    return $arrUnqByKyData;
}
/*func end*/

$factNamePrefix = DB::table('fact_settings')->first();
if ($factNamePrefix != true) {
    class FactNamePrefix2
    {
    }

    $factNamePrefix = new FactNamePrefix2();
    $factNamePrefix->prefix = 'NE';
}
//echo '<pre> ';
//var_dump($employees);
//exit()
?>
<style>
    .kd {
        background: rebeccapurple;
        color: white;
    }
    .kdr {
        background: #993f46;
        color: white;
    }
</style>
@foreach ($employees as $employee)
    <tr class="orderRow @if($employee->prStatus) prSts @endif" id="row{{ $employee->order_number }}"
        orderId="{{ $employee->order_number }}">
        <td class="text-center">
            {{ $var++ }}
            <small class="text-aqua">{{ $employee->Id }}</small>
        </td>
        <td class="text-center buyerName">
            {{ $employee->customer_name }}
        </td>
        <td style="overflow: auto;" class="text-center orderNo">
            {{ $employee->orderID }}
        </td>
        <td class="text-center styleDesc">
            {{ $employee->article_no }}
        </td>

        <td class="text-center">
            {{ $employee->style_description }}
        </td>
        <td class="text-center">
            <img class="imgPreview" src="{{ asset('') }}assets/garmentsImage/{{ $employee->garmentImg }}" alt=""
                 height="50" width="50"/>
        </td>
        <td class="text-center btn btn-default shipDate">
            <?php
            $date_of_ship = $employee->date_of_ship;
            $date_of_ship = DateTime::createFromFormat('Y-m-d', $date_of_ship);
            $date_of_ship = $date_of_ship->format('d-m-Y');
            echo $date_of_ship;
            ?>
        </td>
        <td class="text-center" id="">
            <span class="shpDays">
            <?php
                $order_status = $employee->order_status;
                $actualShipDate = $employee->actualShipDate;
                if ($order_status == 'ShipOut') {
                    //Remaining Days for Shipment Date
                    $dateStr = $employee->date_of_ship;
                    $date = strtotime($dateStr);//Converted to a PHP date (a second count)
                    //Calculate difference
                    $diff = $date - strtotime($actualShipDate);//time returns current time in seconds
                    $days = floor($diff / (60 * 60 * 24));//seconds/minute*minutes/hour*hours/day)
                    $hours = round(($diff - $days * 60 * 60 * 24) / (60 * 60));
                    //Report
                    echo $days;
                } else {
                    //Remaining Days for Shipment Date
                    $dateStr = $employee->date_of_ship;
                    $date = strtotime($dateStr);//Converted to a PHP date (a second count)
                    //Calculate difference
                    $diff = $date - time();//time returns current time in seconds
                    $days = floor($diff / (60 * 60 * 24));//seconds/minute*minutes/hour*hours/day)
                    $hours = round(($diff - $days * 60 * 60 * 24) / (60 * 60));
                    //Report
                    echo $days + 1;
                }
                ?>
            </span>
            <span>Days</span>
        </td>
        <td class="text-center orderQty">
            {{ $employee->order_quantity }}
            <?php $orderQtySum += $employee->order_quantity ?>
        </td>
        <td class="text-center shipmntSts clkAbl">
            {{ $employee->order_status }}
        </td>
        <td class="">
            <p>
                <span style="display: none">{{ $employee->Id }}</span>
                <?php
                $budgetData = DB::table('budgetfrorder')->where('order_id', $employee->Id)->first();
                $mrktingQty = ($employee->order_quantity*$budgetData->yrnConsumption)/12
                ?>
                @if ($employee->Id == $employee->order_id)
                    <mrktingQty style="display: none">{{ $mrktingQty }}</mrktingQty>
                    <a href="#" class="KDPrgrmPreview" onclick="javascript:previewKDPrgrm('{{ $employee->Id }}', '{{ $employee->id }}', '{{ $factNamePrefix->prefix.substr($employee->date, 0, 4).$employee->id }}')">
                        <button class="btn-primary" style="font-size: 9px">
                            {{ $factNamePrefix->prefix.substr($employee->date, 0, 4).$employee->id }}
                        </button>
                    </a>
                @endif
            </p>
        </td>
        <td>
            {{ round($mrktingQty, 2) }}
            {{--*/ $totMrktingQty += $mrktingQty /*--}}
        </td>
        <td>
            <table class="table">
                <tr>
                    <th>Sub</th>
                    <th>Lab</th>
                    <th>Fabric</th>
                    <th>FabApprvl</th>
                </tr>
                <tr>
                    <td>{{ $employee->date_of_entry }}</td>
                    <td> {!! labDipFormula(2, $employee)->tnaHtmlView !!} </td>
                    <td> {!! labDipFormula(4, $employee)->tnaHtmlView !!} </td>
                    <td> {!! labDipFormula(50, $employee)->tnaHtmlView !!} </td>
                </tr>
            </table>
            </td>
        <td class="">
            <?php
            $kdPrgrmData = App\KnitDyeingProgram::where('order_id', $employee->Id)->first();
            ?>
            @if(isset($kdPrgrmData))
                @php
                    $kkk = [];
                        foreach ($kdPrgrmData->kdColrSizeFabQty as $qty){
                            if ($qty->KDprgrmId == $employee->id) {
                            $kkk[] = [
                                'colorID'       => $qty->colorID,
                                'ordId'         => $employee->Id,
                                'KDprgrmIds'    => $qty->KDprgrmId,
                                'color_name'    => $qty->color_name,
                                'fabQty'        => $qty->fabQty,
                                ];
                            }
                        }
                        foreach (arraySumFromKey($kkk, 'colorID') as $kw => $qty2){
                            $bodyOrSlvFini  = $qty2['fabQty']/12* $kdPrgrmData->kdConsumption[$kw]->bodyOrSlvFini;
                            $ribFinish      = $qty2['fabQty']/12* $kdPrgrmData->kdConsumption[$kw]->ribFinish;
                            $neckTapeFini   = $qty2['fabQty']/12* $kdPrgrmData->kdConsumption[$kw]->neckTapeFini;

                            $bodyOrSlvFini_ProcessLs    = $bodyOrSlvFini + $bodyOrSlvFini * ($kdPrgrmData->kdConsumption[$kw]->bodyOrSlvFini_ProcessLs/100);
                            $ribFinish_ProcessLs        = $ribFinish + $ribFinish * ($kdPrgrmData->kdConsumption[$kw]->ribFinish_ProcessLs/100);
                            $neckTapeFini_ProcessLs     = $neckTapeFini + $neckTapeFini * ($kdPrgrmData->kdConsumption[$kw]->neckTapeFini_ProcessLs/100);

                            $totalFini = $bodyOrSlvFini + $ribFinish + $neckTapeFini;
                            $totalGray = $bodyOrSlvFini_ProcessLs + $ribFinish_ProcessLs + $neckTapeFini_ProcessLs;

                            $totalFiniArr[] = [
                                'colorID'   => $qty2['colorID'],
                                'KDprgrmId' => $qty2['KDprgrmIds'],
                                'totalFini' => round($totalFini, 2)
                            ];
                            $totalGrayArr[] = [
                                'colorID'   => $qty2['colorID'],
                                'KDprgrmId' => $qty2['KDprgrmIds'],
                                'totalGray' => round($totalGray, 2)
                            ];
                        }
                @endphp
            @endif

                <table class="table table-bordered kdTable">
                    <tr>
                        <td class="kd">
                            Color
                        </td>

                        <td class="kd">GrmntQty</td>
                        <td class="kd">
                            YarnRqrd
                        </td>
                        <td class="kd kdr">
                            YarnRcv
                        </td>
                        <td class="kd kdr">
                            YarnIssue
                        </td>
                        <td class="">
                            YarnBlnc
                        </td>
                        <td class="kd kdr">
                            KnitQTY
                        </td>
                        <td>KnitBlnc</td>
                        <td>DyeingQTY</td>
                        <td>DyeingBlnc</td>
                        <td class="kd">FinishFabRqrd</td>
                        <td>FinishFabRcv</td>
                        <td>FinishFabBalnc</td>
                        <td>FinishFabIss</td>
                        <td>IssueBlnc</td>
                    </tr>

                    <?php
                    $yrnQtySum = 0;
                    $yrnRcvSum = 0;
                    $knittingQtySum = 0;
                    $dyingQtySum = 0;
                    $finishFabRqrdSum = 0;
                    $finiFabIssueSum = 0;

                    $kk = [];
                    foreach ($kdColorSizeFabricQty as $qty) {
                        if ($qty->KDprgrmId == $employee->id) {
                            $kk[] = [
                                'colorID' => $qty->colorID,
                                'color_name' => $qty->color_name,
                                'fabQty' => $qty->fabQty,
                            ];
                        }
                    }
                    //$arrCount = count(arraySumFromKey($kk, 'colorID'));
                    ?>
                    @foreach (arraySumFromKey($kk, 'colorID') as $kw => $qty2)

                        <?php
                        $yarn_receives = DB::table('yarn_receive_for_kd')->where([['orderId', '=', $employee->Id], ['color', '=', $qty2['colorID']]])->get();

                        foreach ($yarn_receives as $yarn_rcv) {
                            $yrnRcvSum += $yarn_rcv->yarnRcvQTY;
                        }
                        $yarn_issues = DB::table('yarn_issue')->where([['orderId', '=', $employee->Id], ['colorId', '=', $qty2['colorID']]])->get();
                        foreach ($yarn_issues as $yarn_issue) {
                            $yrnQtySum += $yarn_issue->yrnQty;
                        }
                        $kdKnitQtys = DB::table('kd_knitting_qty')->where([['orderId', '=', $employee->Id], ['color', '=', $qty2['colorID']]])->get();
                        foreach ($kdKnitQtys as $kdKnitQty) {
                            $knittingQtySum += $kdKnitQty->knttngQTY;
                        }


                        $kdDyingQtys = DB::table('dying_qty_for_kd')->where([['orderId', '=', $employee->Id], ['colorID', '=', $qty2['colorID']]])->get();
                        foreach ($kdDyingQtys as $kdDyingQty) {
                            $dyingQtySum += $kdDyingQty->dyingQty;
                        }

                        $finishFabRqrds = DB::table('finish_fab_required')->where([['orderId', '=', $employee->Id], ['colorID', '=', $qty2['colorID']]])->get();
                        foreach ($finishFabRqrds as $finishFabRqrd) {
                            $finishFabRqrdSum += $finishFabRqrd->finishFabRqrd;
                        }
                        $finiFabIssues = DB::table('fini_fab_issue')->where([['orderId', '=', $employee->Id], ['colorID', '=', $qty2['colorID']]])->get();
                        foreach ($finiFabIssues as $finiFabIssue) {
                            $finiFabIssueSum += $finiFabIssue->finiFabIssue;
                        }
                        ?>
                        <tr>
                            <td class="kdColorName">{{ $qty2['color_name'] }}</td>
                            <td class="kdFabQty">{{ $qty2['fabQty'], $KDgrmntQTY+=$qty2['fabQty'] }}</td>
                            <td rowspan="">
                                @foreach ($totalGrayArr as  $gray)
                                    @if($gray['colorID'] == $qty2['colorID'] && $gray['KDprgrmId'] == $employee->id)
                                        {{ $grayQty = $gray['totalGray'], $KDcolorYarnRqrd += $gray['totalGray'] }}
                                    @endif
                                @endforeach
                            </td>
                                <td rowspan="">
                                    <a href="{{ route('yrnRcvKdProgrm.create', [$employee->Id, $employee->id, $qty2['colorID']]) }}" modalTitle=""
                                       data-toggle="modal" data-target=".myAjaxModal" data-remote="false" class="">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('yrnRcvKdProgrm.show', [$employee->id, $qty2['colorID']]) }}" modalTitle="" data-toggle="modal"
                                       data-target=".myAjaxModal" data-remote="false">
                                        {{ $yrnRcvSum, $totYrnRcvSum += $yrnRcvSum, $yrnRcvSum = 0 }}
                                    </a>
                                </td>

                                <td rowspan="">
                                    <a href="{{ route('yarnIssue.create', [$employee->Id, $employee->id, $qty2['colorID']]) }}" modalTitle=""
                                       data-toggle="modal" rowSpanTd="yes" data-target=".myAjaxModal" data-remote="false" class="">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('yarnIssue.show', [$employee->id, $qty2['colorID']]) }}" modalTitle="" data-toggle="modal"
                                       data-target=".myAjaxModal" data-remote="false">
                                        {{ $yrnQtySum, $KDyarnIss += $yrnQtySum }}
                                    </a>
                                </td>

                                <td>{{ $grayQty - $yrnQtySum, $yrnQtySum = 0}}</td>

                                <td rowspan="">
                                    <a href="{{ route('kdForKnitting.create', [$employee->Id, $employee->id, $qty2['colorID']]) }}" modalTitle=""
                                       data-toggle="modal" rowSpanTd="space" data-target=".myAjaxModal" data-remote="false" class="">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('kdForKnitting.show', [$employee->id, $qty2['colorID']]) }}" modalTitle="" data-toggle="modal"
                                       data-target=".myAjaxModal" data-remote="false">
                                     {{ $knittingQtySum, $KDkntQty += $knittingQtySum}}
                                    </a>
                                </td>

                                <td>{{ $grayQty - $knittingQtySum, $knittingQtySum=0}}</td>

                            <td>
                                <a href="{{ route('dyingQtyFrKd.create', [$employee->Id, $employee->id, $qty2['colorID']]) }}" modalTitle=""
                                   data-toggle="modal" rowSpanTd="space" data-target=".myAjaxModal" data-remote="false" class="">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('dyingQtyFrKd.show', [$employee->id, $qty2['colorID']]) }}" modalTitle=""
                                   data-toggle="modal" data-target=".myAjaxModal" data-remote="false">
                                    {{ $dyingQtySum, $KDdyeingQty +=$dyingQtySum }}
                                </a>
                            </td>
                            <td>{{ $grayQty - $dyingQtySum, $dyingQtySum = 0 }}</td>
                            <td rowspan="">
                                @foreach ($totalFiniArr as  $fini)
                                    @if($fini['colorID'] == $qty2['colorID'] && $fini['KDprgrmId'] == $employee->id)
                                        {{ $fini['totalFini'], $KDfnshFabRqrd += $fini['totalFini'] }}
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                <a href="{{ route('finisFabRqrd.create', [$employee->Id, $employee->id, $qty2['colorID']]) }}" modalTitle=""
                                   data-toggle="modal" rowSpanTd="space2" data-target=".myAjaxModal" data-remote="false" class="">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>

                                <a href="{{ route('finisFabRqrd.show', [$employee->id, $qty2['colorID']]) }}" modalTitle=""
                                   data-toggle="modal" data-target=".myAjaxModal" data-remote="false">{{ $finishFabRqrdSumForMinus = $finishFabRqrdSum, $KDfnshFabRcv+=$finishFabRqrdSum, $finishFabRqrdSum = 0 }}
                                </a>
                            </td>
                            <td>
                                @foreach ($totalFiniArr as  $fini)
                                    @if($fini['colorID'] == $qty2['colorID'] && $fini['KDprgrmId'] == $employee->id)
                                        {{ $fnshFabBlnc = $fini['totalFini']- $finishFabRqrdSumForMinus, $kdFnshFabBlnc += $fnshFabBlnc }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('finisFabIss.create', [$employee->Id, $employee->id, $qty2['colorID']]) }}" modalTitle=""
                                   data-toggle="modal" rowSpanTd="space" data-target=".myAjaxModal" data-remote="false" class="">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('finisFabIss.show', [$employee->id, $qty2['colorID']]) }}" modalTitle=""
                                   data-toggle="modal" data-target=".myAjaxModal" data-remote="false">{{ $finiFabIssueSumForMinus = $finiFabIssueSum, $KDfnshFabIss+=$finiFabIssueSum, $finiFabIssueSum = 0 }}
                                </a>
                            </td>
                            <td>
                                @foreach ($totalFiniArr as  $fini)
                                    @if($fini['colorID'] == $qty2['colorID'] && $fini['KDprgrmId'] == $employee->id)
                                        {{ $fnshFabBlnc = $fini['totalFini']- $finishFabRqrdSumForMinus, $kdFnshFabBlnc += $fnshFabBlnc }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach

                    <tr style="background: #bdd6f5">
                        <td><b>Total</b></td>

                        <td>
                            {{ $KDgrmntQTY }}
                            {{--*/$totalKDgrmntQTY += $KDgrmntQTY/*--}}
                            {{--*/$KDgrmntQTY = 0/*--}}
                        </td>
                        <td class="totGrey">

                            {{ $KDcolorYarnRqrd }}
                            {{--*/$totalKDcolorYarnRqrd += $KDcolorYarnRqrd/*--}}
                            {{--*/$KDcolorYarnRqrd = 0/*--}}
                        </td>
                        <td>
                            {{ $totYrnRcvSum }}
                            {{--*/$sumYrnRcvSum += $totYrnRcvSum/*--}}
                            {{--*/$totYrnRcvSum = 0/*--}}
                        </td>
                        <td>
                            {{ $KDyarnIss }}
                            {{--*/$totalKDyarnIss += $KDyarnIss/*--}}
                            {{--*/$KDyarnIss = 0/*--}}
                        </td>

                        <td></td>

                        <td>
                            {{ $KDkntQty }}
                            {{--*/$totalKDkntQty += $KDkntQty/*--}}
                            {{--*/$KDkntQty=0/*--}}
                        </td>

                        <td></td>

                        <td>
                            {{ $KDdyeingQty }}
                            {{--*/$totalKDdyeingQty += $KDdyeingQty/*--}}
                            {{--*/$KDdyeingQty=0/*--}}
                        </td>

                        <td></td>

                        <td>
                            {{ $KDfnshFabRqrd }}

                            {{--*/$totalKDfnshFabRqrd += $KDfnshFabRqrd/*--}}
                            {{--*/$KDfnshFabRqrd=0/*--}}
                        </td>
                        <td>
                            {{ $KDfnshFabRcv }}
                            {{--*/$totalKDfnshFabRcv += $KDfnshFabRcv/*--}}
                            {{--*/$KDfnshFabRcv=0/*--}}
                        </td>
                        <td>
                            {{ $kdFnshFabBlnc }}
                            {{--*/$totalkdFnshFabBlnc += $kdFnshFabBlnc/*--}}
                            {{--*/$kdFnshFabBlnc = 0/*--}}
                        </td>
                        <td>
                            {{ $KDfnshFabIss }}
                            {{--*/$totalKDfnshFabIss += $KDfnshFabIss/*--}}
                            {{--*/$KDfnshFabIss=0/*--}}
                        </td>
                        <td>

                        </td>

                    </tr>
                </table>
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr style="color: #233446; background: #a5b6b7; text-shadow: 0 0 4px #fffdfe">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>TotOrdQty</b></td>

    <td></td>
    <td></td>
    <td><b>Tot Mrktng Yarn Rqrd</b></td>
    <td></td>
    <td>
        <table class="table table-bordered">
            <tr>
                <td></td>
                <td>GrmntQty</td>
                <td>YarnRqrd</td>
                <td>YarnRcv</td>
                <td>YarnIssue</td>
                <td>YarnBlnc</td>
                <td>KnitQTY</td>
                <td>KnitBlnc</td>
                <td>DyeingQTY</td>
                <td>DyeingBlnc</td>
                <td>FinishFabRqrd</td>
                <td>FinishFabRcv</td>
                <td>FinishFabBalnc</td>
                <td>FinishFabIss</td>
                <td>IssueBlnc</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $totalKDgrmntQTY }}</td>
                <td id="bookedYrn">{{ $totalKDcolorYarnRqrd }}</td>
                <td id="totYrnRcv">{{ $sumYrnRcvSum }}</td>
                <td id="totYrnIss">{{ $totalKDyarnIss }}</td>
                <td></td>
                <td id="totalKDkntQty">{{ $totalKDkntQty }}</td>
                <td></td>
                <td id="totalKDdyeingQty">{{ $totalKDdyeingQty }}</td>
                <td></td>
                <td id="totalKDfnshFabRqrd">{{ $totalKDfnshFabRqrd }}</td>
                <td id="totalKDfnshFabRcv">{{ $totalKDfnshFabRcv }}</td>
                <td>{{ $totalkdFnshFabBlnc }}</td>
                <td id="totalKDfnshFabIss">{{ $totalKDfnshFabIss }}</td>
                <td></td>
            </tr>
        </table>
    </td>
</tr>
<tr style="background-color: #34495e; color: whitesmoke; font-weight: bolder; font-size: 1em">
    <td></td>
    <td><b>Summary</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b id="orderQty">{{ $orderQtySum }}</b></td>

    <td></td>
    <td></td>
    <td id="mrktngYrnRqrd">{{ round($totMrktingQty, 2) }}</td>
    <td></td>
    <td></td>
</tr>
</tfoot>
<!-- Default bootstrap modal example -->
<div class="modal fade myAjaxModal" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div style="display: none" class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade myAjaxModalChild" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div style="display: none" class="modal-footer" myModalFooter>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var orderQty = $("#orderQty").html();
        $("#orderQtySum").html(orderQty);

        var orderTotalValue = $("#mrktngYrnRqrd").html();
        $("#mrktngYrnRqrdSum").html(orderTotalValue);

        var bookedYrn = $("#bookedYrn").html();
        $("#bookedYrnSum").html(bookedYrn);

        /*rslt*/
        /*Yarn received*/
        var totYrnRcv = $("#totYrnRcv").html();
        //$("#totYrnRcvSum").html(totYrnRcv);
        $("#totYrnRcvSum").html(bookedYrn);
        $("#yrnRcvQty").html(totYrnRcv);
        //var totYrnRcvSum = parseInt($("#totYrnRcvSum").text());
        //var yrnRcvBlnceKg = totYrnRcvSum - totYrnRcv;
        var yrnRcvBlnceKg = bookedYrn - totYrnRcv;
        $('#yrnRcvBlnceKg').html(Math.round(yrnRcvBlnceKg *100)/100);
        var yrnRcvBlncePerc = (yrnRcvBlnceKg/bookedYrn)*100;
        $('#yrnRcvBlncePerc').html(Math.round(yrnRcvBlncePerc *100)/100);


        /*Yarn Issued*/
        var totYrnIss = $("#totYrnIss").html();
        //$("#totYrnIssSum").html(totYrnIss);
        $("#totYrnIssQtyKg").html(totYrnIss);
        $("#totYrnIssSum").html(bookedYrn);
        var yrnIssBlnceKg = bookedYrn - totYrnIss;
        $('#yrnIssBlnceKg').html(Math.round(yrnIssBlnceKg *100)/100);
        var yrnIssBlncePerc = (yrnIssBlnceKg/bookedYrn)*100;
        $('#yrnIssBlncePerc').html(Math.round(yrnIssBlncePerc *100)/100);

        /*Knitting*/
        var totalKDkntQty = $("#totalKDkntQty").html();
        //$("#totalKDkntQtySum").html(totalKDkntQty);
        $("#totalKDkntIssQtyKg").html(totalKDkntQty);
        $("#totalKDkntQtySum").html(bookedYrn);
        var totalKDkntQtyBlnceKg = bookedYrn - totalKDkntQty;
        $('#totalKDkntQtyBlnceKg').html(Math.round(totalKDkntQtyBlnceKg *100)/100);
        var totalKDkntQtyBlncePerc = (totalKDkntQtyBlnceKg/bookedYrn)*100;
        $('#totalKDkntQtyBlncePerc').html(Math.round(totalKDkntQtyBlncePerc *100)/100);

        /*Dyeing*/
        var totalKDdyeingQty = $("#totalKDdyeingQty").html();
        //$("#totalKDdyeingQtySum").html(totalKDdyeingQty);
        $("#totalKDdyeingIssQtyKg").html(totalKDdyeingQty);
        $("#totalKDdyeingQtySum").html(bookedYrn);
        var totalKDdyeingQtyBlnceKg = bookedYrn - totalKDdyeingQty;
        $('#totalKDdyeingQtyBlnceKg').html(Math.round(totalKDdyeingQtyBlnceKg *100)/100);
        var totalKDdyeingQtyBlncePerc = (totalKDdyeingQtyBlnceKg/bookedYrn)*100;
        $('#totalKDdyeingQtyBlncePerc').html(Math.round(totalKDdyeingQtyBlncePerc *100)/100);

        /*Finish fabric received*/
        var totalKDfnshFabRqrd = $("#totalKDfnshFabRqrd").html();
        var totalKDfnshFabRcv = $("#totalKDfnshFabRcv").html();
        $("#totalKDfnshFabRcvSum").html(totalKDfnshFabRcv);
        $("#totalKDfnshFabRqrdSum").html(totalKDfnshFabRqrd);
        //$("#totalKDfnshFabRcvSum").html(totalKDfnshFabRcv);
        var totalKDfnshFabRcvBlnceKg = totalKDfnshFabRqrd - totalKDfnshFabRcv;
        $('#totalKDfnshFabRcvBlnceKg').html(Math.round(totalKDfnshFabRcvBlnceKg *100) / 100);
        var totalKDfnshFabRcvBlncePerc = (totalKDfnshFabRcvBlnceKg/totalKDfnshFabRqrd)*100;
        $('#totalKDfnshFabRcvBlncePerc').html(Math.round(totalKDfnshFabRcvBlncePerc *100)/100);

        /*Finish fabric Issue*/
        var totalKDfnshFabIss = $("#totalKDfnshFabIss").html();//
        $("#totalKDfnshFabIssSum").html(totalKDfnshFabIss);
        $("#totalKDfnshFabRqrdSum1").html(totalKDfnshFabRqrd);
        var totalKDfnshFabIssBlnceKg = totalKDfnshFabRqrd - totalKDfnshFabIss;
        $('#totalKDfnshFabIssBlnceKg').html(Math.round(totalKDfnshFabIssBlnceKg *100)/100);
        var totalKDfnshFabIssBlncePerc = (totalKDfnshFabIssBlnceKg/totalKDfnshFabRqrd)*100;
        $('#totalKDfnshFabIssBlncePerc').html(Math.round(totalKDfnshFabIssBlncePerc *100)/100);

    });

    $('mrktingQty').each(function () {
        var totGrey = parseInt($(this).closest('tr').find('.totGrey').text());
        var mrktingQty = parseInt($(this).text());

        if (totGrey > mrktingQty) {
            $(this).siblings().children().css('background', 'red');
        }
    });

    $(".kdPrgCalDiv").remove();
    var kdEntryQty;
    var prevKdEntryQty;

    function kdEntryValid(obj, number) {
        var index = $(obj).parent().index();
        kdEntryQty = $(obj).closest('tr').find('td:nth-child('+ (index + number) +')').text().trim();
        prevKdEntryQty = $(obj).closest('td').text().trim();
    }

    $('[rowSpanTd="space"]').click(function () {
        kdEntryValid(this, -1);
    });
    $('[rowSpanTd="space2"]').click(function () {
        kdEntryValid(this, -2);
    });
    $('[rowSpanTd="yes"]').click(function () {
        kdEntryValid(this, 0);
    });

    $(".myAjaxModal").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        var modalTitle = link.attr("modalTitle");
        //myModalFooter
        var objModal = $(this);
        $.ajax({
            url: link.attr("href"),
            global: false,
            success: function (data) {
                objModal.find(".modal-title").html(modalTitle);
                objModal.find(".modal-body").html(data);
                $(".dPick").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd',
                });
            }
        });
    });

    $(".myAjaxModalChild").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        var modalTitle = link.attr("modalTitle");
        var objModal = $(this);
        $.ajax({
            url: link.attr("href"),
            global: false,
            success: function (data) {
                objModal.find(".modal-title").html(modalTitle);
                objModal.find(".modal-body").html(data);
                $(".dPick").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd',
                });
            }
        });
    });

    $(".totYrnRqr:not(:eq(0))").remove();

    $(".shpDays").each(function () {
        var value = parseInt($(this).html());
        if (value <= 10) {
            $(this).parent().css('background-color', '#ff9900');
        }
        if (value == 0) {
            $(this).parent().attr('class', 'animated infinite pulse').css({
                "background-color": "#cc0000",
                "color": "#ffffff"
            });
        }
        if (value < 0) {
            $(this).parent().css('background-color', 'red');
        }
    });
    $(".shpDays").closest('tr').find('.shipmntSts').each(function () {
        var value = $(this).text().trim();
        if (value == "ShipOut") {
            $(this).closest('tr').find('.shpDays').parent().css({'color': 'white', 'background-color': '#8e44ad'});
        }
    });
    $(".KDPrgrmPreview").click(function () {
        var buyerName = $(this).parent().parent().parent().find(".buyerName").text();
        buyerName = buyerName.trim();
        $(".modalBuyerName").html(buyerName);

        var orderNo = $(this).parent().parent().parent().find(".orderNo").text();
        orderNo = orderNo.trim();
        $(".modalOrderNo").html(orderNo);

        var styleDesc = $(this).parent().parent().parent().find(".styleDesc").text();
        styleDesc = styleDesc.trim();
        $(".modalStyleDesc").html(styleDesc);

        var orderQty = $(this).parent().parent().parent().find(".orderQty").text();
        orderQty = orderQty.trim();
        $(".modalOrderQty").html(orderQty);

        var shipDate = $(this).parent().parent().parent().find(".shipDate").text();
        shipDate = shipDate.trim();
        $(".modalShipDate").html(shipDate);
    });
</script>
