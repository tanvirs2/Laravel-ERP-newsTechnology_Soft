<tbody style="" id="">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totCMperDz = 0; $totCmV = 0; $totSMV = 0;

$yrnConSum=0; $yrnPrce=0; $bgtYrnCstSum=0; $knitngPrcSum=0; $bgtKntCstSum=0; $dyngPrcSum=0; $bgtDyngCstSum=0;
$aopPrntSum=0; $bgtAopSum=0; $prntSum=0; $bgtPrintSum=0; $accessSum=0; $bgtAccCstSum=0; $tstCstSum=0; $bgtTstCstSum=0;
$cmPrDzSum=0; $bgtCmCstSum=0; $bnkChrgeSum=0; $totBnkChrgSum=0; $budgetCostSum=0; $prftOrLossSum=0;
?>
@foreach ($employees as $employee)
    <tr class="orderRow @if($employee->prStatus) prSts @endif" id="" orderId="{{ $employee->order_number }}">
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
        <td class="text-center">
            {{--Total Value--}}
            {{ $employee->order_quantity*$employee->unit_price }}
            <?php
            $orderTotalValue += $employee->order_quantity*$employee->unit_price;
            ?>
        </td>
        <td class="text-center shipmntSts clkAbl">
            {{ $employee->order_status }}
        </td>
        <td class="text-center clkAbl">
            <span class="shpDays">
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
        <td class="text-center">
            {{ $employee->yrnConsumption }}
            {{--*/$yrnConSum += $employee->yrnConsumption/*--}}
        </td>
        <td class="text-center">
            {{ $employee->yrnPrice }}
            {{--*/$yrnPrce += $employee->yrnPrice /*--}}
        </td>
        <td class="text-center">
            {{ round($bgtYrnCst = $employee->yrnConsumption*$employee->yrnPrice*$employee->order_quantity/12, 2) }}
            {{--*/$bgtYrnCstSum += $bgtYrnCst/*--}}
        </td>
        <td class="text-center">
            {{ $employee->kntngPrice }}
            {{--*/$knitngPrcSum += $employee->kntngPrice/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtKntCst = $employee->yrnConsumption*$employee->kntngPrice*$employee->order_quantity/12, 2) }}
            {{--*/$bgtKntCstSum += $bgtKntCst/*--}}
        </td>
        <td class="text-center">
            {{ $employee->dyngPrice }}
            {{--*/$dyngPrcSum += $employee->dyngPrice/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtDyngCst = $employee->yrnConsumption*$employee->dyngPrice*$employee->order_quantity/12, 2) }}
            {{--*/$bgtDyngCstSum += $bgtDyngCst/*--}}
        </td>
        <td class="text-center">
            {{ $employee->aopPrint }}
            {{--*/$aopPrntSum += $employee->aopPrint/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtAop = $employee->yrnConsumption*$employee->aopPrint*$employee->order_quantity/12, 2) }}
            {{--*/$bgtAopSum += $bgtAop/*--}}
        </td>
        <td class="text-center">
            {{ $employee->print }}
            {{--*/$prntSum += $employee->print/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtPrint = $employee->print*$employee->order_quantity/12, 2) }}
            {{--*/$bgtPrintSum += $bgtPrint/*--}}
        </td>
        <td class="text-center">
            {{ $employee->accessories }}
            {{--*/$accessSum += $employee->accessories/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtAccCst = $employee->accessories*$employee->order_quantity/12, 2) }}
            {{--*/$bgtAccCstSum += $bgtAccCst/*--}}
        </td>
        {{--Where Is Test Cost???--}}
        <td class="text-center">
            {{ $employee->testCost }}
            {{--*/$tstCstSum += $employee->testCost/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtTstCst = $employee->testCost*$employee->order_quantity/12, 2) }}
            {{--*/$bgtTstCstSum += $bgtTstCst/*--}}
        </td>
        <td class="text-center">
            {{ $employee->cmPerDz }}
            {{--*/$cmPrDzSum += $employee->cmPerDz/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtCmCst = $employee->cmPerDz*$employee->order_quantity/12, 2) }}
            {{--*/$bgtCmCstSum += $bgtCmCst/*--}}
        </td>
        <td class="text-center">
            {{ $employee->bankCharge }}
            {{--*/$bnkChrgeSum += $employee->bankCharge/*--}}
        </td>
        <td class="text-center">
            {{ round($totBnkChrg = $employee->bankCharge*$employee->order_quantity/12, 2) }}
            {{--*/$totBnkChrgSum += $totBnkChrg/*--}}
        </td>

        <td class="text-center">
            {{ round($budgetCost = $bgtYrnCst+$bgtKntCst+$bgtDyngCst+$bgtAop+$bgtPrint+$bgtAccCst+$bgtTstCst+$bgtCmCst+$totBnkChrg, 2) }}
            {{--*/$budgetCostSum += $budgetCost/*--}}
        </td>
        <td class="text-center">
            {{ round($prftOrLoss = ($employee->order_quantity*$employee->unit_price)-$budgetCost, 2) }}
            {{--*/$prftOrLossSum += $prftOrLoss/*--}}
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
    <td><b>{{ $orderTotalValue }}</b></td>

    <td></td>

    <td></td>
    <td>{{ $yrnConSum }}</td>
    <td>{{ $yrnPrce }}</td>
    <td>{{ round($bgtYrnCstSum) }}</td>
    <td>{{ $knitngPrcSum }}</td>
    <td>{{ round($bgtKntCstSum) }}</td>
    <td>{{ $dyngPrcSum }}</td>
    <td>{{ round($bgtDyngCstSum) }}</td>
    <td>{{ $aopPrntSum }}</td>
    <td>{{ round($bgtAopSum) }}</td>
    <td>{{ $prntSum }}</td>
    <td>{{ round($bgtPrintSum) }}</td>
    <td>{{ $accessSum }}</td>
    <td>{{ round($bgtAccCstSum) }}</td>
    <td>{{ $tstCstSum }}</td>
    <td>{{ round($bgtTstCstSum) }}</td>
    <td>{{ $cmPrDzSum }}</td>
    <td>{{ round($bgtCmCstSum) }}</td>
    <td>{{ $bnkChrgeSum }}</td>
    <td>{{ round($totBnkChrgSum) }}</td>
    <td>{{ round($budgetCostSum) }}</td>
    <td>{{ round($prftOrLossSum) }}</td>
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
