<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0;?>
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
                //Remaining Days for Shipment Date
                $dateStr=$employee->date_of_ship;
                $date=strtotime($dateStr);//Converted to a PHP date (a second count)
                //Calculate difference
                $diff=$date-time();//time returns current time in seconds
                $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                $hours=round(($diff-$days*60*60*24)/(60*60));
                //Report
                echo $days+1;
                ?>
            </span>
            <span>Days</span>
        </td>
        <td class="text-center">
            {{ $employee->order_quantity }}
            <?php $orderQtySum += $employee->order_quantity ?>
        </td>
        {{--<td class="text-center blackCol">

        </td>
        <td class="text-center blackCol">

        </td>
        <td class="text-center blackCol">

        </td>
        <td class="text-center blackCol">

        </td>
        <td class="text-center blackCol">

        </td>
        <td class="text-center blackCol">

        </td>--}}
        <td class="">
            <a style="" class="" id="" data-toggle="tooltip" title="Edit Order Information." href="{{ route('production.edit', $employee->Id ) }}"><i class="fa fa-pencil-square-o fa-2x"></i> Entry </a>
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
    {{--<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>--}}
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
    {{--<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>--}}
    <td></td>
</tr>
</tfoot>

<script>

    /*$( ".shpDays" ).each(function(){
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
    });*/
</script>
