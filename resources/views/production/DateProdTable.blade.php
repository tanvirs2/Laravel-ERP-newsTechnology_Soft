<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totSMV=0; ?>
{{--*/ $prCut=0; $prSwIn=0; $prSwOut=0; $prIron=0; $prCarton=0; $prCmSum=0; $prSwInVal=0; /*--}}
@foreach ($employees as $employee)
    <tr class="orderRow" id="row" orderId="" style="">
        <td class="text-center">
            {{ $var++ }}
        </td>

        <td class="text-center blackCol">
                {{ $employee->order->customer_name}}
        </td>
        <td style="overflow: auto;" class="text-center">
            {{ $employee->order->orderID }}
        </td>
        <td class="text-center">
            {{ $employee->order->article_no }}
        </td>

        <td class="text-center">
            {{ $employee->order->style_description }}
        </td>
        <td class="text-center">
            <img class="imgPreview" src="{{ asset('') }}assets/garmentsImage/{{ $employee->order->garmentImg }}" alt="" height="50" width="50"/>
        </td>
        <td class="text-center btn btn-default">
            <?php
            $date_of_ship = $employee->order->date_of_ship;
            $date_of_ship = DateTime::createFromFormat('Y-m-d', $date_of_ship);
            $date_of_ship = $date_of_ship->format('d-m-Y');
            echo $date_of_ship;
            ?>
        </td>
        <td class="text-center" id="">
            <span class="shpDays">
                <?php
                $order_status = $employee->order->order_status;
                $actualShipDate = $employee->order->actualShipDate;
                if ($order_status == 'ShipOut') {
                //Remaining Days for Shipment Date
                $dateStr=$employee->order->date_of_ship;
                $date=strtotime($dateStr);//Converted to a PHP date (a second count)
                //Calculate difference
                $diff=$date-strtotime($actualShipDate);//time returns current time in seconds
                $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                $hours=round(($diff-$days*60*60*24)/(60*60));
                //Report
                echo $days;
                } else {
                //Remaining Days for Shipment Date
                $dateStr=$employee->order->date_of_ship;
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
            {{ $employee->order->order_quantity }}
            <?php $orderQtySum += $employee->order->order_quantity ?>
        </td>
        <td class="text-center">
            {{ $employee->prDate }}
        </td>

        <td class="text-center blackCol">
            {{ $employee->prCut }}
            {{--*/$prCut += $employee->prCut /*--}}
        </td>

        <td class="text-center blackCol">
            {{ $employee->line }}
        </td>
        <td class="text-center blackCol">
            {{ $employee->prSwIn}}
            {{--*/$prSwIn += $employee->prSwIn /*--}}
        </td>
        <td class="text-center blackCol">
            {{ $employee->prSwOut}}
            {{--*/$prSwOut += $employee->prSwOut /*--}}
        </td>
        <td class="text-center blackCol">
            {{ $employee->prSwOut*$employee->order->unit_price }}
            {{--*/ $prSwInVal += $employee->prSwOut*$employee->order->unit_price /*--}}
        </td>
        <td class="text-center blackCol">
            {{ round(($employee->order->cmPerDz*$employee->prSwOut)/12) }}
            {{--*/ $prCm = ($employee->order->cmPerDz*$employee->prSwOut)/12 /*--}}
            {{--*/ $prCmSum += $prCm /*--}}
        </td>
        <td class="text-center blackCol">
            {{ $employee->order->smv * $employee->prSwOut }}
            {{--*/ $totSMV += $employee->order->smv /*--}}
        </td>
        <td class="text-center blackCol">
            {{ $employee->prIron}}
            {{--*/$prIron += $employee->prIron /*--}}
        </td>
        <td class="text-center blackCol">
            {{ $employee->prCarton}}
            {{--*/$prCarton += $employee->prCarton /*--}}
        </td>
        <td class="">
            <a style="" class="" id="" data-toggle="tooltip" title="Edit Order Information." href=""><i class="fa fa-pencil-square-o fa-2x"></i> </a>
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

    <td><b></b></td>
    <td><b>TotCut</b></td>
    <td><b></b></td>
    <td><b>TotSwIn</b></td>
    <td><b>TotSwOut</b></td>
    <td><b>Value</b></td>
    <td><b>CM</b></td>
    <td><b>SMV</b></td>
    <td><b>TotIron</b></td>
    <td><b>TotPoly</b></td>
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

    <td><b></b></td>
    <td><b>{{ $prCut }}</b></td>
    <td><b></b></td>
    <td><b>{{ $prSwIn }}</b></td>
    <td><b>{{ $prSwOut }}</b></td>
    <td><b>{{ $prSwInVal }}</b></td>
    <td><b>{{ round($prCmSum) }}</b></td>
    <td><b>{{ $totSMV }}</b></td>
    <td><b>{{ $prIron }}</b></td>
    <td><b>{{ $prCarton }}</b></td>
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
