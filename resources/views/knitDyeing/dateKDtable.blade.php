<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0;?>
{{--*/ $totalKDgrmntQTY=0; $totalKDcolorYarnRqrd=0; $totalKDyarnIss=0; $totalKDkntQty=0; $totalKDdyeingQty=0; $totalKDfnshFabRqrd=0; $totalKDfnshFabRcv=0; $totalkdFnshFabBlnc=0; $totYrnRqrdMrktng=0; /*--}}
@foreach ($employees as $employee)
    <tr class="orderRow" id="row" orderId="">
        <td class="text-center">
            {{ $var++ }}
        </td>

        <td class="text-center blackCol">
            <?php
            /*$order = App\Order::find($employee->order_id);
            echo $order->customer_name;*/
            ?>
            {{ $employee->orderDetails->customer_name}}

        </td>
        <td style="overflow: auto;" class="text-center">
            {{ $employee->orderDetails->orderID }}
        </td>
        <td class="text-center">
            {{ $employee->orderDetails->article_no }}
        </td>

        <td class="text-center">
            {{ $employee->orderDetails->style_description }}
        </td>
        <td class="text-center">
            <img class="primgPreview" src="{{ asset('') }}assets/garmentsImage/{{ $employee->orderDetails->garmentImg }}" alt="" height="50" width="50"/>
        </td>
        <td class="text-center btn btn-default">
            <?php
            $date_of_ship = $employee->orderDetails->date_of_ship;
            $date_of_ship = DateTime::createFromFormat('Y-m-d', $date_of_ship);
            $date_of_ship = $date_of_ship->format('d-m-Y');
            echo $date_of_ship;
            ?>
        </td>

        <td class="text-center" id="">
            <span class="shpDays">
                <?php
                $order_status = $employee->orderDetails->order_status;
                $actualShipDate = $employee->orderDetails->actualShipDate;
                if ($order_status == 'ShipOut') {
                //Remaining Days for Shipment Date
                $dateStr=$employee->orderDetails->date_of_ship;
                $date=strtotime($dateStr);//Converted to a PHP date (a second count)
                //Calculate difference
                $diff=$date-strtotime($actualShipDate);//time returns current time in seconds
                $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                $hours=round(($diff-$days*60*60*24)/(60*60));
                //Report
                echo $days;
                } else {
                    //Remaining Days for Shipment Date
                    $dateStr=$employee->orderDetails->date_of_ship;
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
            {{ $employee->orderDetails->order_quantity }}
            <?php $orderQtySum += $employee->orderDetails->order_quantity ?>
        </td>
        <td>{{ $employee->finish_fab_required['date'] }}</td>
        <td>{{ $employee->yarnRcvQTY }}</td>
        <td>{{ $employee->yrnQty }}</td>
        <td>{{ $employee->knttngQTY }}</td>
        <td>{{ $employee->dyingQty }}</td>
        <td>{{ $employee->finishFabRqrd }}</td>
        <td></td>
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
    <td><b></b></td>
    <td><b></b></td>
    <td><b></b></td>
    <td><b></b></td>
    <td><b></b></td>
    <td><b></b></td>
    <td><b></b></td>
    <td><b></b></td>
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

    <td>{{ $totalKDgrmntQTY }}</td>
    <td>{{ $totalKDcolorYarnRqrd }}</td>

    </td>
    <td>{{ $totalKDyarnIss }}</td>
    <td>{{ $totalKDkntQty }}</td>
    <td>{{ $totalKDdyeingQty }}</td>
    <td>{{ $totalKDfnshFabRqrd }}</td>
    <td>{{ $totalKDfnshFabRcv }}</td>
    <td>{{ $totalkdFnshFabBlnc }}</td>
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
