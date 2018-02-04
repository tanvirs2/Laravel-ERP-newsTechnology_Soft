<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totCMperDz = 0; $totCmV = 0; $totSMV = 0;?>
@foreach ($employees as $employee)
    <tr class="orderRow @if($employee->prStatus) prSts @endif" id="row{{ $employee->order_number }}" orderId="{{ $employee->order_number }}">
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
            <img class="imgPreview" src="{{ asset('') }}assets/garmentsImage/{{ $employee->garmentImg }}" alt="" height="50" width="50"/>
        </td>
        <td class="text-center">
            {{ $employee->date_of_entry }}
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
            {{ $employee->unit_price }}
        </td>
        <td class="text-center">
            {{--Total Value--}}
            {{ $employee->order_quantity*$employee->unit_price }}
            <?php
            $orderTotalValue += $employee->order_quantity*$employee->unit_price;
            ?>
        </td>
        <td class="text-center shipQty clkAbl">
            {{ $employee->shipmentQty }}
            <?php
            if ($employee->shipmentQty > 0) {
                $totShipQty += $employee->shipmentQty;
            }
            ?>
        </td>
        <td class="text-center shipVal">
            @if ($employee->shipmentQty > 0)
                {{ $employee->shipmentQty*$employee->unit_price }}
                {{--*/ $shipVal = $employee->shipmentQty*$employee->unit_price;
                $totShipVal += $shipVal; /*--}}
            @endif
        </td>
        <td class="text-center shrtShipVal">
            @if($employee->shipmentQty > 0)
                {{ round(($employee->shipmentQty*$employee->unit_price)-($employee->order_quantity*$employee->unit_price), 2) }}
                {{--*/ $shrtShipVal = ($employee->order_quantity*$employee->unit_price)-($employee->shipmentQty*$employee->unit_price) /*--}}
                {{--*/ $totShrtShipVal += $shrtShipVal /*--}}
            @endif
        </td>
        <td class="text-center acShipDate clkAbl">
            <?php
            if ($employee->actualShipDate) {
                $actualShipDate = DateTime::createFromFormat('Y-m-d', $employee->actualShipDate)->format('d-m-Y');
                echo $actualShipDate;
            }
            ?>
        </td>
        <td class="text-center shipmntSts clkAbl">
            {{ $employee->order_status }}
        </td>
        <td class="text-center acShipDate">
            {{ $employee->cmPerDz }}
            {{--*/ $totCMperDz += $employee->cmPerDz /*--}}
        </td>
        <td class="text-center acShipDate">
            {{ round(($employee->cmPerDz*$employee->order_quantity)/12) }}
            {{--*/ $cmv = ($employee->cmPerDz*$employee->order_quantity)/12 /*--}}
            {{--*/ $totCmV += $cmv /*--}}
        </td>
        <td class="text-center acShipDate ">
            {{ $employee->smv }}
            {{--*/ $totSMV += $employee->smv /*--}}
        </td>
        <td class="">
            <p class="clkAbl"> {{--<a href="{{ url('appointmentLetter') }}" id="printMe" data-toggle="tooltip" data-placement="left" title="Print Appointment Letter!" class="btn purple fa fa-pencil"><i class="fa fa-print"></i></a>--}}
                <a style="" class="" id="showOrderInfo" onclick="showOrderInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="View Order Information. " href="#"><i class="fa fa-eye"></i> </a>
                <a style="" class="" id="editOrderInfo" onclick="editOrderInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="Edit Order Information. " href="#"><i class="fa fa-pencil-square-o"></i> </a>
                <a style="" class="" href="javascript:;" onclick="del('{{ $employee->order_number }}', '{{ $employee->order_number }}')" data-toggle="tooltip" title="Delete Order Information."><i class="fa fa-trash"></i> </a>
                <a style="" class="" href="javascript:;" onclick="cancelShp('{{ $employee->order_number }}');" data-toggle="tooltip" title="Cancel This Shipment."><i class="fa fa-window-close"></i> </a>
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
    <td><b>Price</b></td>
    <td><b>OrdTotVal</b></td>
    <td><b>TotShipQty</b></td>
    <td><b>TotShipVal</b></td>
    <td><b>TotSrtShpV</b></td>
    <td></td>
    <td></td>
    <td><b>TotCM/Dz</b></td>
    <td><b>TotCmV</b></td>
    <td><b>TotSMV</b></td>
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
    <td>
        <b>$
            <?php
            if ($orderTotalValue && $orderQtySum) {
                $averageValue = $orderTotalValue / $orderQtySum;
                echo round($averageValue, 2);
            }
            ?>
        </b>
    </td>
    <td><b>$ {{ round($orderTotalValue, 2) }}</b></td>
    <td><b>{{ round($totShipQty, 2) }}</b></td>
    <td><b>{{ round($totShipVal, 2) }}</b></td>
    <td><b>{{ round($totShrtShipVal, 2) }}</b></td>
    <td></td>
    <td></td>
    <td>{{ round($totCMperDz) }}</td>
    <td>{{ round($totCmV) }}</td>
    <td>{{ round($totSMV) }}</td>
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
