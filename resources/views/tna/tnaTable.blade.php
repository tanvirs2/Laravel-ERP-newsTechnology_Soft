<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totCMperDz = 0; $totCmV = 0; $totSMV = 0;

function enDsView($fldName, $obj)
{
    if ($obj->$fldName == '1') {
        return 'En';
    }else{
        return 'Ds';
    }
}

function cmt_view($fldName, $obj)
{
    if (strlen($obj->$fldName) > 4) {
        $cmt = str_replace(" ", "_", $obj->$fldName);
        $date = date_create($cmt);
        return "<br> <span style='color: white'>---</span> <br><a onclick=CmtView('".$cmt."')>".date_format($date, 'd M')."<span class='lateDateClass' style='display:none'>".$cmt."</span></a>";
    }
}

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

function tnaDelayMark($formulaDigit, $obj)
{
    if(labDipFormula($formulaDigit, $obj)->tnaDate < date('Y-m-d')){
       return 'background: red; color: white; cursor: pointer' ;
       }
}
//@if(labDipFormula(2, $employee)->tnaDate < date('Y-m-d')) style="background: red; color: white; cursor: pointer" @endif
?>
@foreach ($employees as $employee)
    <tr class="orderRow @if($employee->prStatus) prSts @endif" id="row{{ $employee->order_number }}" orderId="{{ $employee->order_number }}">
        <td class="text-center">
            {{ $var++ }}

            <small class="text-aqua">{{ $employee->Id }}</small>

        </td>
        <td class="text-center">
            {{ $employee->customer_name }}
        </td>
        <td style="overflow: auto;" class="text-center">
            {{ $employee->orderID }}
        </td>
        <td class="text-center">
            {{ $employee->article_no }}
        </td>

        <td class="text-center">
            {{ $employee->style_description }}
        </td>
        <td class="text-center">
            <img class="imgPreview" src="{{ asset('') }}assets/garmentsImage/{{ $employee->garmentImg }}" alt="" height="50" width="50"/>
        </td>
        <td class="text-center">
            <?php
            $date_of_entry = $employee->date_of_entry;
            $date_of_entry = DateTime::createFromFormat('Y-m-d', $date_of_entry);
            $date_of_entry = $date_of_entry->format('d-m-Y');
            echo $date_of_entry;
            ?>
        </td>
        <td class="text-center btn btn-default">
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
                    $dateStr=$employee->date_of_ship;
                    $date=strtotime($dateStr);//Converted to a PHP date (a second count)
                    //Calculate difference
                    $diff=$date-strtotime($actualShipDate);//time returns current time in seconds
                    $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                    $hours=round(($diff-$days*60*60*24)/(60*60));
                    //Report
                    echo $days;
                } else {
                    //Remaining Days for Shipment Date
                    $dateStr=$employee->date_of_ship;
                    $date=strtotime($dateStr);//Converted to a PHP date (a second count)
                    //Calculate difference
                    $diff=$date-time();//time returns current time in seconds
                    $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                    $hours=round(($diff-$days*60*60*24)/(60*60));
                    //Report
                    echo $days+1;
                }
                ?>
            </span>
            <span>Days</span>
        </td>
        <td class="text-center">
            {{ $employee->order_quantity }}
            <?php $orderQtySum += $employee->order_quantity ?>
        </td>

        <td class="text-center shipmntSts clkAbl">
            {{ $employee->order_status }}
        </td>
        <td class="text-center clkAbl">
            <span class="">
            <?php
                $entryDate = strtotime($employee->date_of_entry);
                $shpDate = strtotime($employee->date_of_ship);
                $diff = $shpDate - $entryDate;
                $days = $diff / (60 * 60 * 24);

                echo $days;
                ?>
            </span>
            <span>Days</span>
        </td>
        <td class="" style="display: none">
            <table></table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(2, $employee) }}" class="tnaStart">
                        <p class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'LabDipApp_Start', 'Consumption calculation [Pattern Master] _Start')">
                            {!! labDipFormula(2, $employee)->tnaHtmlView !!}
                        </p>
                        <button ord-id="{{ $employee->Id }}" db-field="LabDipApp_Start" class="en-tna">{{ enDsView('LabDipApp_Start', $employee) }}</button>
                        <span>{!! cmt_view('LabDipApp_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(2, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'LabDipApp_Finish', 'Consumption calculation [Pattern Master] _Finish')">
                            {!! labDipFormula(2, $employee)->tnaHtmlView !!}
                        </p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="LabDipApp_Finish" class="en-tna">{{ enDsView('LabDipApp_Finish', $employee) }}</button>
                        <span>{!! cmt_view('LabDipApp_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(27, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'Fitsample_Start', 'Lab Dip Approval [Merchandiser]_Start')">
                            {!! labDipFormula(27, $employee)->tnaHtmlView !!}
                        </p>
                        <button ord-id="{{ $employee->Id }}" db-field="Fitsample_Start" class="en-tna">{{ enDsView('Fitsample_Start', $employee) }}</button>
                        <span>{!! cmt_view('Fitsample_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(27, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'Fitsample_Finish', 'Lab Dip Approval [Merchandiser]_Finish')">
                            {!! labDipFormula(27, $employee)->tnaHtmlView !!}
                        </p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="Fitsample_Finish" class="en-tna">{{ enDsView('Fitsample_Finish', $employee) }}</button>
                        <span>{!! cmt_view('Fitsample_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(4, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'FabBookKnit_Start', 'Fabric Booking Generation [Merchandiser]_Start')">
                            {!! labDipFormula(4, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="FabBookKnit_Start" class="en-tna">{{ enDsView('FabBookKnit_Start', $employee) }}</button>
                        <span>{!! cmt_view('FabBookKnit_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(4, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'FabBookKnit_Finish', 'Fabric Booking Generation [Merchandiser]_Finish')">
                            {!! labDipFormula(4, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="FabBookKnit_Finish" class="en-tna">{{ enDsView('FabBookKnit_Finish', $employee) }}</button>
                        <span>{!! cmt_view('FabBookKnit_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(6, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'YarnIssue_Start', 'PO issue for Trims [Merchandiser]_Start')">
                            {!! labDipFormula(6, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="YarnIssue_Start" class="en-tna">{{ enDsView('YarnIssue_Start', $employee) }}</button>
                        <span>{!! cmt_view('YarnIssue_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(6, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'YarnIssue_Finish', 'PO issue for Trims [Merchandiser]_Finish')">
                            {!! labDipFormula(6, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="YarnIssue_Finish" class="en-tna">{{ enDsView('YarnIssue_Finish', $employee) }}</button>
                        <span>{!! cmt_view('YarnIssue_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(20, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'TrimsBookSnF_Start', 'Size Set/Fit Sample Submission [Merchandiser]_Start')">
                            {!! labDipFormula(20, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="TrimsBookSnF_Start" class="en-tna">{{ enDsView('TrimsBookSnF_Start', $employee) }}</button>
                        <span>{!! cmt_view('TrimsBookSnF_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(20, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'TrimsBookSnF_Finish', 'Size Set/Fit Sample Submission [Merchandiser]_Finish')">
                            {!! labDipFormula(20, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="TrimsBookSnF_Finish" class="en-tna">{{ enDsView('TrimsBookSnF_Finish', $employee) }}</button>
                        <span>{!! cmt_view('TrimsBookSnF_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(58, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'PPSampleApp_Start', 'Seal/Approval of Sample [Merchandiser]_Start')">
                            {!! labDipFormula(58, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="PPSampleApp_Start" class="en-tna">{{ enDsView('PPSampleApp_Start', $employee) }}</button>
                        <span>{!! cmt_view('PPSampleApp_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(58, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'PPSampleApp_Finish', 'Seal/Approval of Sample [Merchandiser]_Finish')">
                            {!! labDipFormula(58, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="PPSampleApp_Finish" class="en-tna">{{ enDsView('PPSampleApp_Finish', $employee) }}</button>
                        <span>{!! cmt_view('PPSampleApp_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(50, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'KnitProd_Start', 'Receiving Fabric Shade Approval [Fabric Responsible]_Start')">
                            {!! labDipFormula(50, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="KnitProd_Start" class="en-tna">{{ enDsView('KnitProd_Start', $employee) }}</button>
                        <span>{!! cmt_view('KnitProd_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(50, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'KnitProd_Finish', 'Receiving Fabric Shade Approval [Fabric Responsible]_Finish')">
                            {!! labDipFormula(50, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="KnitProd_Finish" class="en-tna">{{ enDsView('KnitProd_Finish', $employee) }}</button>
                        <span>{!! cmt_view('KnitProd_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(50, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'GreyReceive_Start', 'Receiving of Print Approval [Printing Responsible] _Start')">
                            {!! labDipFormula(50, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="GreyReceive_Start" class="en-tna">{{ enDsView('GreyReceive_Start', $employee) }}</button>
                        <span>{!! cmt_view('GreyReceive_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(50, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'GreyReceive_Finish', 'Receiving of Print Approval [Printing Responsible] _Finish')">
                            {!! labDipFormula(50, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="GreyReceive_Finish" class="en-tna">{{ enDsView('GreyReceive_Finish', $employee) }}</button>
                        <span>{!! cmt_view('GreyReceive_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(50, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'DyeingProd_Start', 'Receiving of Embro. Approval [Embroidary Responsible] _Start')">
                            {!! labDipFormula(50, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="DyeingProd_Start" class="en-tna">{{ enDsView('DyeingProd_Start', $employee) }}</button>
                        <span>{!! cmt_view('DyeingProd_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(50, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'DyeingProd_Finish', 'Receiving of Embro. Approval [Embroidary Responsible] _Finish')">
                            {!! labDipFormula(50, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="DyeingProd_Finish" class="en-tna">{{ enDsView('DyeingProd_Finish', $employee) }}</button>
                        <span>{!! cmt_view('DyeingProd_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(58, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'FinFabRcv_Start', 'Bulk Fabrics In house [Fabric Responsible]_Start')">
                            {!! labDipFormula(58, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="FinFabRcv_Start" class="en-tna">{{ enDsView('FinFabRcv_Start', $employee) }}</button>
                        <span>{!! cmt_view('FinFabRcv_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(87, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'FinFabRcv_Finish', 'Bulk Fabrics In house [Fabric Responsible]_Finish')">
                            {!! labDipFormula(87, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="FinFabRcv_Finish" class="en-tna">{{ enDsView('FinFabRcv_Finish', $employee) }}</button>
                        <span>{!! cmt_view('FinFabRcv_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(62, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'PPMeeting_Start', 'Bulk Trims In house [Merchandiser]_Start')">
                            {!! labDipFormula(62, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="PPMeeting_Start" class="en-tna">{{ enDsView('PPMeeting_Start', $employee) }}</button>
                        <span>{!! cmt_view('PPMeeting_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(84, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'PPMeeting_Finish', 'Bulk Trims In house [Merchandiser]_Finish')">
                            {!! labDipFormula(84, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="PPMeeting_Finish" class="en-tna">{{ enDsView('PPMeeting_Finish', $employee) }}</button>
                        <span>{!! cmt_view('PPMeeting_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(60, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'SewTrimsRcv_Start', 'PP meeting [Merchandiser]_Start')">
                            {!! labDipFormula(60, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="SewTrimsRcv_Start" class="en-tna">{{ enDsView('SewTrimsRcv_Start', $employee) }}</button>
                        <span>{!! cmt_view('SewTrimsRcv_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(60, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'SewTrimsRcv_Finish', 'PP meeting [Merchandiser]_Finish')">
                            {!! labDipFormula(60, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="SewTrimsRcv_Finish" class="en-tna">{{ enDsView('SewTrimsRcv_Finish', $employee) }}</button>
                        <span>{!! cmt_view('SewTrimsRcv_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(64, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'Cutting_Start', 'Bulk Cutting [Cutting Manager] _Start')">
                            {!! labDipFormula(64, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="Cutting_Start" class="en-tna">{{ enDsView('Cutting_Start', $employee) }}</button>
                        <span>{!! cmt_view('Cutting_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(98, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'Cutting_Finish', 'Bulk Cutting [Cutting Manager] _Finish')">
                            {!! labDipFormula(98, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="Cutting_Finish" class="en-tna">{{ enDsView('Cutting_Finish', $employee) }}</button>
                        <span>{!! cmt_view('Cutting_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(66, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'PrintOrEmb_Start', 'Bulk Embroidery [Embroidery Responsible] _Start')">
                            {!! labDipFormula(66, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="PrintOrEmb_Start" class="en-tna">{{ enDsView('PrintOrEmb_Start', $employee) }}</button>
                        <span>{!! cmt_view('PrintOrEmb_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(97, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'PrintOrEmb_Finish', 'Bulk Embroidery [Embroidery Responsible] _Finish')">
                            {!! labDipFormula(97, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="PrintOrEmb_Finish" class="en-tna">{{ enDsView('PrintOrEmb_Finish', $employee) }}</button>
                        <span>{!! cmt_view('PrintOrEmb_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(66, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'FinTrimsRcv_Start', 'Bulk Printing [Printing Responsible] _Start')">
                            {!! labDipFormula(66, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="FinTrimsRcv_Start" class="en-tna">{{ enDsView('FinTrimsRcv_Start', $employee) }}</button>
                        <span>{!! cmt_view('FinTrimsRcv_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(97, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'FinTrimsRcv_Finish', 'Bulk Printing [Printing Responsible] _Finish')">
                            {!! labDipFormula(97, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="FinTrimsRcv_Finish" class="en-tna">{{ enDsView('FinTrimsRcv_Finish', $employee) }}</button>
                        <span>{!! cmt_view('FinTrimsRcv_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(68, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'SewingProd_Start', 'Bulk Sewing [Production Manager] _Start')">
                            {!! labDipFormula(68, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="SewingProd_Start" class="en-tna">{{ enDsView('SewingProd_Start', $employee) }}</button>
                        <span>{!! cmt_view('SewingProd_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(97, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'SewingProd_Finish', 'Bulk Sewing [Production Manager] _Finish')">
                            {!! labDipFormula(97, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="SewingProd_Finish" class="en-tna">{{ enDsView('SewingProd_Finish', $employee) }}</button>
                        <span>{!! cmt_view('SewingProd_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(87, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'GmtsFinish_Start', 'Packing Complete [Finishing Manager]_Start')">
                            {!! labDipFormula(87, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="GmtsFinish_Start" class="en-tna">{{ enDsView('GmtsFinish_Start', $employee) }}</button>
                        <span>{!! cmt_view('GmtsFinish_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(97, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'GmtsFinish_Finish', 'Packing Complete [Finishing Manager]_Finish')">
                            {!! labDipFormula(97, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="GmtsFinish_Finish" class="en-tna">{{ enDsView('GmtsFinish_Finish', $employee) }}</button>
                        <span>{!! cmt_view('GmtsFinish_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(88, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'Inspection_Start', 'Final Inspection [Quality Manager] _Start')">
                            {!! labDipFormula(88, $employee)->tnaHtmlView !!}</p>
                        <button ord-id="{{ $employee->Id }}" db-field="Inspection_Start" class="en-tna">{{ enDsView('Inspection_Start', $employee) }}</button>
                        <span>{!! cmt_view('Inspection_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(99, $employee) }}" style="{{ tnaDelayMark(99, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'Inspection_Finish', 'Final Inspection [Quality Manager] _Finish')">
                            {!! labDipFormula(99, $employee)->tnaHtmlView !!}</p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="Inspection_Finish" class="en-tna">{{ enDsView('Inspection_Finish', $employee) }}</button>
                        <span>{!! cmt_view('Inspection_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="">
            <table class="tnaClass table table-bordered">
                <thead>
                <tr>
                    <th>Start</th>
                    <th>Fnsh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="{{ tnaDelayMark(99, $employee) }}" class="tnaStart">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'ExFactory_Start', 'Ex-Factory [Finishing Manager]_Start')">
                            <?php
                            $date = date_create($employee->date_of_ship);
                            date_add($date, date_interval_create_from_date_string('-1 days'));
                            echo date_format($date, 'd M');
                            ?></p>
                        <button ord-id="{{ $employee->Id }}" db-field="ExFactory_Start" class="en-tna">{{ enDsView('ExFactory_Start', $employee) }}</button>
                        <span>{!! cmt_view('ExFactory_Start', $employee) !!}</span>
                    </td>
                    <td style="{{ tnaDelayMark(99, $employee) }}" class="tnaFinish">
                        <p href="#" class="popWindow" onclick="lapDipReport('{{ $employee->Id }}', 'ExFactory_Finish', 'Ex-Factory [Finishing Manager]_Finish')">
                            <?php
                            $date = date_create($employee->date_of_ship);
                            date_add($date, date_interval_create_from_date_string('-1 days'));
                            echo date_format($date, 'd M');
                            ?></p>
                        <button DS ord-id="{{ $employee->Id }}" db-field="ExFactory_Finish" class="en-tna">{{ enDsView('ExFactory_Finish', $employee) }}</button>
                        <span>{!! cmt_view('ExFactory_Finish', $employee) !!}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>


        <td class="">
            <p class="clkAbl">
                {{--ID: {{ $employee->Id }}--}}
                {{--<a href="{{ url('appointmentLetter') }}" id="printMe" data-toggle="tooltip" data-placement="left" title="Print Appointment Letter!" class="btn purple fa fa-pencil"><i class="fa fa-print"></i></a>--}}
                {{--<a style="" class="" id="showOrderInfo" onclick="showOrderInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="View Order Information. " href="#"><i class="fa fa-eye"></i> </a>
                <a style="" class="" id="editOrderInfo" onclick="editOrderInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="Edit Order Information. " href="#"><i class="fa fa-pencil-square-o"></i> </a>
                <a style="" class="" href="javascript:;" onclick="del('{{ $employee->order_number }}', '{{ $employee->order_number }}')" data-toggle="tooltip" title="Delete Order Information."><i class="fa fa-trash"></i> </a>
                <a style="" class="" href="javascript:;" onclick="cancelShp('{{ $employee->order_number }}');" data-toggle="tooltip" title="Cancel This Shipment."><i class="fa fa-window-close"></i> </a>--}}
            </p>

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
    <td></td>
    <td><b>TotOrdQty</b></td>

    <td></td>

    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr style="background-color: #34495e; color: whitesmoke; font-weight: bolder; font-size: 1.3em">
    <td></td>
    <td><b>Summary</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>{{ $orderQtySum }}</b></td>

    <td></td>

    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</tfoot>

<script>

    $(".tnaStart").each(function () {
        var actDate = $(this).find(".actDateClass").text();
        var lateDate = $(this).find(".lateDateClass").text();
        if (lateDate.length > 0) {
            if (lateDate > actDate) {
                $(this).css("background", "red");
            } else {
                $(this).css("background", "green");
            }
        }
    });
    $(".tnaFinish").each(function () {
        var actDate = $(this).find(".actDateClass").text();
        var lateDate = $(this).find(".lateDateClass").text();
        if (lateDate.length > 0) {
            if (lateDate > actDate) {
                $(this).css("background", "red");
            } else {
                $(this).css("background", "green");
            }
        }
    });

    $(".tnaStart span").click(function () {
        var actDate = $(this).parent().find(".actDateClass").text();
        var lateDate = $(this).parent().find(".lateDateClass").text();
        var d0 = new Date(lateDate);
        var d1 = new Date(actDate);
        var diff = new Date(+d1).setHours(12) - new Date(+d0).setHours(12);
        var diffDay = Math.round(diff/8.64e7);
        if (lateDate.length > 0) {
            if (diffDay == 0) {
                diffDay = "Work was done on by date";
            } else {
                if (diffDay > 0) {
                    diffDay = "Work was done "+diffDay+" days ago from start date";
                }else {
                    diffDay = diffDay + " days delay";
                }
            }
            swal({
                title: lateDate,
                text: '<b>'+diffDay+'</b>',
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                html: true
            });
        }
    });
    $(".tnaFinish span").click(function () {
        var actDate = $(this).parent().find(".actDateClass").text();
        var lateDate = $(this).parent().find(".lateDateClass").text();
        var d0 = new Date(lateDate);
        var d1 = new Date(actDate);
        var diff = new Date(+d1).setHours(12) - new Date(+d0).setHours(12);
        var diffDay = Math.round(diff/8.64e7);
        if (lateDate.length > 0) {
            if (diffDay == 0) {
                diffDay = "Work was done on by date";
            } else {
                if (diffDay > 0) {
                    diffDay = "Work was done "+diffDay+" days ago from start date";
                }else {
                    diffDay = diffDay + " days delay";
                }
            }
            swal({
                title: lateDate,
                text: '<b>'+diffDay+'</b>',
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                html: true
            });
        }
    });


    $('.en-tna').each(function () {
        var btnTxt = $(this).text();
        if (btnTxt == 'En') {
            $(this).closest('td').find('p').css('display', 'none');
            $(this).closest('td').css("background", "white");
        }
    });
    $('.en-tna').click(function () {
        var btnTxt = $(this).text();
        var btnTxtAlert;
        if (btnTxt == 'En') {
            $(this).text('Ds');
            btnTxtAlert = 'Enabled';
            $(this).closest('td').find('p').css('display', 'block');
            $(this).closest('td').css("background", "red");
        }else {
            $(this).text('En');
            btnTxtAlert = "Disabled";
            $(this).closest('td').find('p').css('display', 'none');
            $(this).closest('td').css("background", "white");
        }
        var ordId = $(this).attr('ord-id');
        var dbField = $(this).attr('db-field');
        $.ajax({
            url: '{{ url('tna/enDsTna')}}/'+ordId+'/'+dbField,
            global: false,
            success: function () {
                swal(btnTxtAlert, "This TNA", "success");
            },
            error: function () {
                alert('error');
            }
        });
    });

    /*function CmtView(cmt) {
     cmt = cmt.split('_').join(' ');
     swal({
     title: '',
     text: '<h3>'+cmt+'</h3>',
     showCancelButton: true,
     closeOnConfirm: false,
     animation: "slide-from-top",
     html: true
     });
     }*/

    $( ".shpDays" ).each(function(){
        var value = parseInt( $( this ).html() );
        if ( value <= 10 )
        {
            $( this ).parent().css('background-color', '#ff9900');
        }
        if ( value == 0 )
        {
            $(this).parent().attr('class', 'animated infinite pulse').css({"background-color": "#cc0000", "color": "#ffffff"});
        }
        if ( value < 0 )
        {
            $( this ).parent().css('background-color', 'red');
        }
    });
    $(".shpDays").closest('tr').find('.shipmntSts').each(function () {
        var value = $( this ).text().trim();
        if (value == "ShipOut") {
            $(this).closest('tr').find('.shpDays').parent().css({'color':'white', 'background-color' : '#8e44ad'});
        }
    });

    function lapDipReport(id, actionName, displayName) {
        swal({
            title: "input!",
            text: "<b>"+displayName+"</b>",
            type: "input",
            customClass: "swalInput",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Date",
            html: true,
        }, function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            } else {
                $.ajax({
                    url: '{{ url("tna/labDipFunc") }}'+'/'+id+'/'+actionName,
                    data: { inputValue: inputValue},
                    success: function (data) {
                        swal("Nice!", "You wrote: " + inputValue + ' on ' +displayName, "success");
                    },
                    error: function () {
                        //alert(url);
                    }
                });
            }
        });
    };

    $(document).on("focus", ".swalInput input", function () {
        $(this).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            onSelect: function () {
                $(this).focus();
            }
        });
    });
</script>
