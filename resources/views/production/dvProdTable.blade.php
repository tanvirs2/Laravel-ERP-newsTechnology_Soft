<tbody id="childTable">

<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0;?>
{{--*/ $prCut=0; $prSwIn=0; $prSwOut=0; $prIron=0; $prCarton=0; /*--}}
@foreach ($dvProduction as $employee)
    <tr class="orderRow" id="row" orderId="">
        <td class="text-center">
            {{ $var++ }}
        </td>

        <td class="text-center blackCol">
            {{ $employee->prDate }}
        </td>
        <td class="text-center blackCol">
            {{ $employee->prCut}}
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
            {{ $employee->prIron}}
            {{--*/$prIron += $employee->prIron /*--}}
        </td>
        <td class="text-center blackCol">
            {{ $employee->prCarton}}
            {{--*/$prCarton += $employee->prCarton /*--}}
        </td>
        <td class="">
            <a style="" class="" id="" data-toggle="tooltip" title="Edit Order Information." href="{{ url('production/editPrData/'.$employee->id) }}"><i class="fa fa-pencil-square-o fa-2x"></i></a>
            <a style="" class="" onclick="return confirm('Are sure to delete this !')" href="{{ url('production/delPrData/'.$employee->id) }}" data-toggle="tooltip" title="Delete Order Information."><i class="fa fa-trash fa-2x"></i> </a>
            {{--<a style="" class="" id="editOrderInfo" onclick="editProdInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="Edit Order Information. " href=""><i class="fa fa-pencil-square-o"></i> </a>--}}
            {{--<a style="" class="" id="showOrderInfo" onclick="saveProduction('row'+'{{ $employee->order_number }}');" data-toggle="tooltip" title="View Order Information. " href="#"><i class="fa fa-floppy-o"></i> </a>--}}
            {{--<p class="clkAbl"> --}}{{--<a href="{{ url('appointmentLetter') }}" id="printMe" data-toggle="tooltip" data-placement="left" title="Print Appointment Letter!" class="btn purple fa fa-pencil"><i class="fa fa-print"></i></a>--}}{{--
                <a style="" class="" id="showOrderInfo" onclick="showOrderInfo('{{ $employee->order_number }}');" data-toggle="tooltip" title="View Order Information. " href="#"><i class="fa fa-eye"></i> </a>
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

    <td><b>TotCut</b></td>
    <td><b></b></td>
    <td><b>TotSwIn</b></td>
    <td><b>TotSwOut</b></td>
    <td><b>TotIron</b></td>
    <td><b>TotPoly</b></td>
    <td></td>
</tr>
<tr style="background-color: #34495e; color: whitesmoke; font-weight: bolder; font-size: 1.3em">
    <td></td>
    <td></td>

    <td><b>{{ $prCut }}</b></td>
    <td><b></b></td>
    <td><b>{{ $prSwIn }}</b></td>
    <td><b>{{ $prSwOut }}</b></td>
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
</script>
