<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0;

function arraySumFromKey($arr, $key, $qtyFld) //
{
    $tmp = array();
    $result = array();
    foreach ($arr->prCutFunc as $childArr) {
        if (!in_array($childArr[$key], $tmp)) {
            array_push($tmp, $childArr[$key]);
            array_push($result, $childArr);
        }
    }

    /*echo '<pre>';
    print_r($result);
    echo '</pre>';*/

    $arrUnqByKyData = $result;
    foreach ($arrUnqByKyData as $sngl) {
        $cnt = 0;
        foreach ($arr->prCutFunc as $item) {
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
                    $arrUnqByKyData[$k][$qtyFld] += $protiDupli[$qtyFld];
                }
            }
        }
    }


    return $arrUnqByKyData;
}

?>
{{--*/ $prCut=0; $prSwIn=0; $prSwOut=0; $prIron=0; $prCarton=0; /*--}}
{{--*/ $prCutSum=0; $prSwInSum=0; $prSwOutSum=0; $prIronSum=0; $prCartonSum=0; /*--}}



@foreach ($employees as $employee)
    <tr class="orderRow" id="row{{ $employee->order_number }}" orderId="{{ $employee->order_number }}">
        <td class="text-center">
            {{ $var++ }}
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
            <img class="primgPreview" src="{{ asset('') }}assets/garmentsImage/{{ $employee->garmentImg }}" alt="" height="50" width="50"/>
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
        <td class="text-center">
            {{ $employee->shipmentQty }}
            <?php
            if ($employee->shipmentQty > 0) {
                $totShipQty += $employee->shipmentQty;
            }
            ?>
        </td>





        <td>
            <table class="table table-bordered kdTable">
                <tr  style="background: #e9e0d5">
                    <td class="kd">
                        Color
                    </td>

                    <td class="kd">
                        cutting
                    </td>
                    <td class="kd">
                        Cutting%
                    </td>
                    <td class="kd">
                        SwingIn
                    </td>
                    <td class="kd kdr">
                        SwingOut
                    </td>
                    <td class="kd kdr">
                        Iron
                    </td>
                    <td class="">
                        Poly
                    </td>
                    <td class="">
                        Carton
                    </td>
                </tr>

                {{--@foreach($employee->prCutFunc as $key => $pr)--}}

                @foreach(arraySumFromKey($employee, 'colorId', 'cut') as $pr)

                    <?php
                    $prSwingIn = 0;
                    $prSwingOut = 0;
                    $prIron = 0;
                    $prPoly = 0;
                    $prCarton = 0;

                    foreach ($employee->prSwingFunc as $prSwI) {
                        if ($pr->colorId == $prSwI->colorId) {
                            $prSwingIn += $prSwI->swingIn;
                        }
                    }

                    foreach ($employee->prSwingOutFunc as $prSwO) {
                        if ($pr->colorId == $prSwO->colorId) {
                            $prSwingOut += $prSwO->swingOut;
                        }
                    }
                    foreach ($employee->prIronFunc as $prIr) {
                        if ($pr->colorId == $prIr->colorId) {
                            $prIron += $prIr->iron;
                        }
                    }
                    foreach ($employee->prPolyFunc as $prPl) {
                        if ($pr->colorId == $prPl->colorId) {
                            $prPoly += $prPl->poly;
                        }
                    }
                    foreach ($employee->prCartonFunc as $prCrtn) {
                        if ($pr->colorId == $prCrtn->colorId) {
                            $prCarton += $prCrtn->swingIn;
                        }
                    }
                    ?>
                <tr>
                    <td class="kd">
                        {{  $pr->color->color_name }}
                    </td>

                    <td class="kd">
                        {{  $pr->cut }}
                        {{--*/$prCut += $pr->cut/*--}}
                    </td>
                    @if($employee->order_quantity != 0)
                        {{--*/ $cutPerc = round(($prCut - $employee->order_quantity)/$employee->order_quantity*100, 2).'%' /*--}}
                    @else
                        {{--*/$cutPerc = 'Order Qty is 0'/*--}}
                    @endif
                    <td style="background: #cec9cb" @if($cutPerc > 5) style="background: red; color: white" @endif class="text-center blackCol">
                        {{ $cutPerc }}
                    </td>
                    <td class="kd">
                        {{ $prSwingIn }}
                        {{--*/$prSwIn += $prSwingIn/*--}}
                    </td>
                    <td class="kd kdr">
                        {{ $prSwingOut }}
                        {{--*/$prSwOut += $prSwingOut/*--}}
                    </td>
                    <td class="kd kdr">
                        {{ $prIron }}
                        {{--*/$prIron += $prIron/*--}}
                    </td>
                    <td class="">
                        {{ $prPoly }}
                    </td>
                    <td class="">
                        {{ $prCarton }}
                        {{--*/$prCarton += $prCarton/*--}}

                    </td>
                </tr>

                @endforeach
                <tr style="background: #d2d1b0">
                    <td class="kd">

                    </td>

                    <td class="kd">
                        {{ $prCut }}
                        {{--*/ $prCutSum += $prCut /*--}}
                        {{--*/ $prCut = 0 /*--}}
                    </td>
                    <td class="kd">

                    </td>
                    <td class="kd">
                        {{ $prSwIn }}
                        {{--*/ $prSwInSum += $prSwIn /*--}}
                        {{--*/ $prSwIn = 0 /*--}}
                    </td>
                    <td class="kd kdr">
                        {{ $prSwOut }}
                        {{--*/ $prSwOutSum += $prSwOut /*--}}
                        {{--*/ $prSwOut = 0 /*--}}
                    </td>
                    <td class="kd kdr">
                        {{ $prIron }}
                        {{--*/ $prIronSum += $prIron /*--}}
                        {{--*/ $prIron = 0 /*--}}
                    </td>
                    <td class="">
                        Poly
                    </td>
                    <td class="">
                        {{ $prCarton }}
                        {{--*/ $prCartonSum += $prCarton /*--}}
                        {{--*/ $prCarton = 0 /*--}}
                    </td>
                </tr>
            </table>
        </td>





        <td class="text-center shipmntSts clkAbl">
            {{ $employee->order_status }}
        </td>
        <td class="">
            <a target="_blank" data-toggle="tooltip" title="" href="{{ route('production.edit', $employee->Id ) }}"><i class="fa fa-pencil-square-o fa-2x"></i> </a>
            <a target="_blank" data-toggle="tooltip" title="Details Production Information." href="{{ route('production.show', $employee->Id ) }}"><i class="fa fa-window-restore"></i> </a>
            {{--<a style="" class="" id="editOrderInfo" onclick="editProdInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="Edit Order Information. " href=""><i class="fa fa-pencil-square-o"></i> </a>--}}
            {{--<a style="" class="" id="showOrderInfo" onclick="saveProduction('row'+'{{ $employee->order_number }}');" data-toggle="tooltip" title="View Order Information. " href="#"><i class="fa fa-floppy-o"></i> </a>--}}
            {{--<p class="clkAbl"> --}}{{--<a href="{{ url('appointmentLetter') }}" id="printMe" data-toggle="tooltip" data-placement="left" title="Print Appointment Letter!" class="btn purple fa fa-pencil"><i class="fa fa-print"></i></a>--}}{{--
                <a style="" class="" id="showOrderInfo" onclick="showOrderInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="View Order Information. " href="#"><i class="fa fa-eye"></i> </a>

                <a style="" class="" href="javascript:;" onclick="del('{{ $employee->order_number }}', '{{ $employee->order_number }}')" data-toggle="tooltip" title="Delete Order Information."><i class="fa fa-trash"></i> </a>
                <a style="" class="" href="javascript:;" onclick="cancelShp('{{ $employee->order_number }}');" data-toggle="tooltip" title="Cancel This Shipment."><i class="fa fa-window-close"></i> </a>
            </p>--}}

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
    <td><b>TotShpQty</b></td>
    <td>
        <table class="table table-bordered">
            <tr>
                <td><b>TotCut</b></td>
                <td><b>TotCut%</b></td>
                <td><b>TotSwIn</b></td>
                <td><b>TotSwOut</b></td>
                <td><b>TotIron</b></td>
                <td><b>TotPoly</b></td>
                <td><b>TotCart</b></td>
            </tr>
            <tr>
                <td><b>{{ $prCutSum }}</b></td>
                <td><b>0%</b></td>
                <td><b>{{ $prSwInSum }}</b></td>
                <td><b>{{ $prSwOutSum }}</b></td>
                <td><b>{{ $prIronSum }}</b></td>
                <td><b>TotPol</b></td>
                <td><b>{{ $prCartonSum }}</b></td>
            </tr>
        </table>
    </td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr style="background-color: #34495e; color: whitesmoke; font-weight: bolder; font-size: 1.3em">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>{{ $orderQtySum }}</b></td>
    <td><b>{{ round($totShipQty, 2) }}</b></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</tfoot>

<script>
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
</script>
