<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totCMperDz = 0; $totCmV = 0; $totSMV = 0;

$yrnConSum=0; $yrnPrce=0; $bgtYrnCstSum=0; $knitngPrcSum=0; $bgtKntCstSum=0; $dyngPrcSum=0; $bgtDyngCstSum=0;
$aopPrntSum=0; $bgtAopSum=0; $prntSum=0; $bgtPrintSum=0; $accessSum=0; $bgtAccCstSum=0; $tstCstSum=0; $bgtTstCstSum=0;
$cmPrDzSum=0; $bgtCmCstSum=0; $bnkChrgeSum=0; $totBnkChrgSum=0; $cmmssionSum=0; $totCmmssnSum=0; $otherCstSum=0;
$ttlOtherCstSum=0; $budgetCostSum=0; $prftOrLossSum=0;
?>
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
            {{ $employee->cmPerDz }}
            {{--*/$cmPrDzSum += $employee->cmPerDz/*--}}
        </td>
        <td class="text-center">
            {{ round($bgtCmCst = $employee->cmPerDz*$employee->order_quantity/12, 2) }}
            {{--*/$bgtCmCstSum += $bgtCmCst/*--}}
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
            {{ $employee->bankCharge }}
            {{--*/$bnkChrgeSum += $employee->bankCharge/*--}}
        </td>
        <td class="text-center">
            {{ round($totBnkChrg = $employee->bankCharge*$employee->order_quantity/12, 2) }}
            {{--*/$totBnkChrgSum += $totBnkChrg/*--}}
        </td>
        <td class="text-center">
            {{ $employee->commission }}
            {{--*/$cmmssionSum += $employee->commission/*--}}
        </td>
        <td class="text-center">
            {{ round($totCmmssn = $employee->commission*$employee->order_quantity/12, 2) }}
            {{--*/$totCmmssnSum += $totCmmssn/*--}}
        </td>
        <td class="text-center">
            {{ $employee->others }}
            {{--*/$otherCstSum += $employee->others/*--}}
        </td>
        <td class="text-center">
            {{ round($ttlOtherCst = $employee->others*$employee->order_quantity/12, 2) }}
            {{--*/$ttlOtherCstSum += $ttlOtherCst/*--}}
        </td>
        <td class="text-center">
            {{ round($budgetCost = $bgtYrnCst+$bgtKntCst+$bgtDyngCst+$bgtAop+$bgtPrint+$bgtAccCst+$bgtTstCst
            +$bgtCmCst+$totBnkChrg+$totCmmssn+$ttlOtherCst, 2) }}
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
    <td><b id="orderQty">{{ $orderQtySum }}</b></td>
    <td><b id="orderTotalValue">{{ $orderTotalValue }}</b></td>

    <td></td>

    <td></td>

    <td>{{ $yrnConSum }}</td>
    <td>{{ $yrnPrce }}</td>
    <td id="yrnPric">{{ round($bgtYrnCstSum, 2) }}</td>
    <td>{{ $knitngPrcSum }}</td>
    <td id="knittingPrc">{{ round($bgtKntCstSum, 2) }}</td>
    <td>{{ $dyngPrcSum }}</td>
    <td id="dyingPrice">{{ round($bgtDyngCstSum, 2) }}</td>
    <td>{{ $cmPrDzSum }}</td>
    <td id="cmPrice">{{ round($bgtCmCstSum, 2) }}</td>
    <td>{{ $aopPrntSum }}</td>
    <td id="aopPrice">{{ round($bgtAopSum, 2) }}</td>
    <td>{{ $prntSum }}</td>
    <td id="printAndEmbro">{{ round($bgtPrintSum, 2) }}</td>
    <td>{{ $accessSum }}</td>
    <td id="accessoriesPrice">{{ round($bgtAccCstSum, 2) }}</td>
    <td>{{ $tstCstSum }}</td>
    <td id="tstPrice">{{ round($bgtTstCstSum, 2) }}</td>

    <td>{{ $bnkChrgeSum }}</td>
    <td id="commPrice">{{ round($totBnkChrgSum, 2) }}</td>
    <td>{{ $cmmssionSum }}</td>
    <td id="cmmssnPrice">{{ round($totCmmssnSum, 2) }}</td>

    <td>{{ $otherCstSum }}</td>
    <td id="ttlOtherCstSum">{{ round($ttlOtherCstSum, 2) }}</td>

    <td>{{ round($budgetCostSum) }}</td>
    <td id="profitOrLoss">{{ round($prftOrLossSum) }}</td>
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

    $(document).ready(function () {
        var orderQty = $("#orderQty").html();
        $("#orderQtySum").html(orderQty);

        var orderTotalValue = $("#orderTotalValue").html();
        $("#orderTotalValueSum").html(orderTotalValue);

        /*Calculation Start*/
        var yrnPric = $("#yrnPric").html();
        $("#yrnPricPrc").html(yrnPric);
        var yrnPricPercen = yrnPric/orderTotalValue*100;
        $("#yrnPricPrcData").html(Number((yrnPricPercen).toFixed(2))+'%');

        var knittingPrc = $("#knittingPrc").html();
        $("#knitPricPrc").html(knittingPrc);
        var knittPricPercen = knittingPrc/orderTotalValue*100;
        $("#knittPricPercen").html(Number((knittPricPercen).toFixed(2))+'%');

        var dyingPrice = $("#dyingPrice").html();
        $("#dyingPriceFrBSt").html(dyingPrice);
        var dyingPriceFrBStPercn = dyingPrice/orderTotalValue*100;
        $("#dyingPriceFrBStPercn").html(Number((dyingPriceFrBStPercn).toFixed(2))+'%');

        var aopPrice = $("#aopPrice").html();
        $("#aopPriceFrBSt").html(aopPrice);
        var aopPriceFrBStPercn = aopPrice/orderTotalValue*100;
        $("#aopPriceFrBStPercn").html(Number((aopPriceFrBStPercn).toFixed(2))+'%');

        var printAndEmbro = $("#printAndEmbro").html();
        $("#printPriceFrBSt").html(printAndEmbro);
        var printPriceFrBStPercn = printAndEmbro/orderTotalValue*100;
        $("#printPriceFrBStPercn").html(Number((printPriceFrBStPercn).toFixed(2))+'%');

        var accessoriesPrice = $("#accessoriesPrice").html();
        $("#accesPriceFrBSt").html(accessoriesPrice);
        var accesPriceFrBStPercn = accessoriesPrice/orderTotalValue*100;
        $("#accesPriceFrBStPercn").html(Number((accesPriceFrBStPercn).toFixed(2))+'%');

        var tstPrice = $("#tstPrice").html();
        $("#tstPriceFrBSt").html(tstPrice);
        var tstPriceFrBStPercn = tstPrice/orderTotalValue*100;
        $("#tstPriceFrBStPercn").html(Number((tstPriceFrBStPercn).toFixed(2))+'%');

        var cmPrice = $("#cmPrice").html();
        $("#cmPriceFrBSt").html(cmPrice);
        var cmPriceFrBStPercn = cmPrice/orderTotalValue*100;
        $("#cmPriceFrBStPercn").html(Number((cmPriceFrBStPercn).toFixed(2))+'%');

        var commPrice = $("#commPrice").html();
        $("#commerPriceFrBSt").html(commPrice);
        var commerPriceFrBStPercn = commPrice/orderTotalValue*100;
        $("#commerPriceFrBStPercn").html(Number((commerPriceFrBStPercn).toFixed(2))+'%');

        var cmmssnPrice = $("#cmmssnPrice").html();
        $("#ComissionPriceFrBSt").html(cmmssnPrice);
        var ComissionPriceFrBStPercn = cmmssnPrice/orderTotalValue*100;
        $("#ComissionPriceFrBStPercn").html(Number((ComissionPriceFrBStPercn).toFixed(2))+'%');

        var ttlOtherCstSum = $("#ttlOtherCstSum").html();
        $("#otherCstFrBSt").html(ttlOtherCstSum);
        var otherCstFrBStPercn = ttlOtherCstSum/orderTotalValue*100;
        $("#otherCstFrBStPercn").html(Number((otherCstFrBStPercn).toFixed(2))+'%');

        var profitOrLoss = $("#profitOrLoss").html();
        $("#profitFrBSt").html(profitOrLoss);
        var profitFrBStPercn = profitOrLoss/orderTotalValue*100;
        $("#profitFrBStPercn").html(Number((profitFrBStPercn).toFixed(2))+'%');


        var bst = parseFloat(yrnPric) + parseFloat(knittingPrc) + parseFloat(dyingPrice) + parseFloat(aopPrice)
            + parseFloat(printAndEmbro) + parseFloat(accessoriesPrice) + parseFloat(tstPrice) + parseFloat(cmPrice)
            + parseFloat(commPrice) + parseFloat(cmmssnPrice) + parseFloat(ttlOtherCstSum) + parseFloat(profitOrLoss);

        var BStPercn = parseFloat(yrnPricPercen) + parseFloat(knittPricPercen) + parseFloat(dyingPriceFrBStPercn)
            + parseFloat(aopPriceFrBStPercn) + parseFloat(printPriceFrBStPercn) + parseFloat(accesPriceFrBStPercn)
            + parseFloat(tstPriceFrBStPercn) + parseFloat(cmPriceFrBStPercn) + parseFloat(commerPriceFrBStPercn)
            + parseFloat(ComissionPriceFrBStPercn) + parseFloat(otherCstFrBStPercn) + parseFloat(profitFrBStPercn);

        $("#bstOrderVal").html(Number((bst).toFixed(2)));
        $("#bstOrderValPercn").html(Number((BStPercn).toFixed(2)));
    });

    /*// set up the custom event handler
    $mydiv.bind("contentchange", function() {
        var t = $mydiv.html();
        $("#orderQtySum").html(t);
        //alert(t);
    });
    // change the content and trigger a custom event
    $mydiv.trigger("contentchange");*/


</script>
