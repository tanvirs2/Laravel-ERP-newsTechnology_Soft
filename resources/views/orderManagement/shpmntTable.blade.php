<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totCMperDz = 0; $totCmV = 0; $totSMV = 0; $totSMVintoQty = 0;?>

<?php
$pieChartMaterials = array();
$orderArray = [];
?>

@if(count($employees) > 0)


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
            {{ $employee->date_of_entry }}
        </td>
        <td class="text-center btn btn-default shpDate">
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
            {{ $pieChartMaterials[$employee->customer_name]['qty'][] = $employee->order_quantity }}
            <?php $orderQtySum += $employee->order_quantity ?>
        </td>
        <td class="text-center">
            {{ $employee->unit_price }}
        </td>
        <td class="text-center">
            {{--Total Value--}}
            {{ $pieChartMaterials[$employee->customer_name]['value'][] = $employee->order_quantity*$employee->unit_price }}
            <?php
            $orderTotalValue += $employee->order_quantity*$employee->unit_price;
            ?>
        </td>
        <td class="text-center clkAbl">
            <i onclick="openPartialQtyTable({{ $employee->Id }})" class="fa fa-list"></i>
            <span>
                <i onclick="openPartialQtyInput(this, {{ $employee->Id }})">
                    {{ $pieChartMaterials[$employee->customer_name]['shipmentQty'][] = $employee->partialShipmentQty->sum('qty') }}
                </i>
            </span>

            <?php
            if ($employee->partialShipmentQty->sum('qty') > 0) {
                $totShipQty += $employee->partialShipmentQty->sum('qty');
            }
            ?>
        </td>
        <td class="text-center shipVal">
            @if ($employee->partialShipmentQty->sum('qty') > 0)
                {{ $employee->partialShipmentQty->sum('qty')*$employee->unit_price }}
                {{--*/ $shipVal = $employee->partialShipmentQty->sum('qty')*$employee->unit_price;
                $totShipVal += $shipVal; /*--}}
            @endif
        </td>
        <td class="text-center shrtShipVal">
            @if($employee->partialShipmentQty->sum('qty') > 0)
                {{ round(($employee->partialShipmentQty->sum('qty')*$employee->unit_price)-($employee->order_quantity*$employee->unit_price), 2) }}
                {{--*/ $shrtShipVal = ($employee->order_quantity*$employee->unit_price)-($employee->partialShipmentQty->sum('qty')*$employee->unit_price) /*--}}
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
        <td class="text-center">
            {{ $employee->cmPerDz }}
            {{--*/ $totCMperDz += $employee->cmPerDz /*--}}
        </td>
        <td class="text-center">
            {{ round(($employee->cmPerDz*$employee->order_quantity)/12) }}
            {{--*/ $cmv = ($employee->cmPerDz*$employee->order_quantity)/12 /*--}}
            {{--*/ $totCmV += $cmv /*--}}
        </td>
        <td class="text-center">
            {{ $employee->budget->yrnConsumption }}
        </td>
        <td class="text-center">
            {{ $orderArray['yrnConsumption'][] = round(($employee->budget->yrnConsumption * $employee->order_quantity)/12, 2) }}
        </td>
        <td class="text-center">
            {{ $employee->smv }}
            {{--*/ $totSMV += $employee->smv /*--}}
        </td>
        <td class="text-center">
            {{ $employee->order_quantity*$employee->smv }}
            {{--*/ $totSMVintoQty += $employee->order_quantity*$employee->smv /*--}}
        </td>
        <td class="text-center">
            {{ $employee->lcOrSalsePrsn }}
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
    <td><b>YrnConsum</b></td>
    <td><b>TotYrn</b></td>
    <td><b>SMV</b></td>
    <td><b>TotSMV</b></td>
    <td><b></b></td>
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
    <td>{{ round((array_sum($orderArray['yrnConsumption']) * 12)/$employee->order_quantity, 3) }}</td>
    <td>{{ array_sum($orderArray['yrnConsumption']) }}</td>
    <td>{{ round($totSMV) }}</td>
    <td>{{ round($totSMVintoQty) }}</td>
    <td></td>
    <td></td>
</tr>
</tfoot>

@endif


<div id="partial-qty-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body" id="info">

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Colse</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openPartialQtyTable(order_id) {
        $.ajax({
            global:false,
            url: '{{ route('partial-shipment-tbl') }}/'+order_id,
            success: function (data) {
                $('#info').html(data);
                $('#partial-qty-modal').modal();
            }
        });
    }
    function openPartialQtyInput(elem, $orderId) {

        if ($('.clkAbl input').length) {
            $('.clkAbl input').remove();
        }
        var $input = $(elem).find('input');
        if (!$input.length){
            $(elem).append('<input style="color: #000000;" size="6" >');
        }
        var shpQtyVal, i = 0;
        $input = $(elem).find('input');
        $input.focus();
        $input.keyup(function (e) {
            shpQtyVal = $input.val();
            if (e.key == 'Enter' && i<1) {
                ++i;
                $.ajax({
                    url: '{{ route('partial-ship-qty') }}/'+shpQtyVal+'/'+$orderId,
                    success: function () {
                        var prevVal = $input.parent().text();
                        $input.parent().html(' '+ (parseInt(prevVal) + parseInt(shpQtyVal)));
                    }
                });
            }
        });
    }

    //cou++;
    if (cou > 0){
        cou = 0;
        @php($summeryCount=0)
        let summeryHtml = `
            <table id="summeryTable" class="table table-striped table-bordered table-hover dataTable no-footer" >
                <tr>
                    <th>SL</th>
                    <th>BuyerName</th>
                    <th>OrderQty</th>
                    <th>%</th>
                    <th>TotalValue</th>
                    <th>%</th>
                    <th>ShipQty</th>
                    <th>%</th>
                </tr>
            @foreach($pieChartMaterials as $name=>$pieChartMaterial)
                <tr class='summery-row'>
                    <td>{{ ++$summeryCount }}</td>
                    <td>{{ $name }}</td>
                    <td>{{ array_sum($pieChartMaterial['qty']) }}</td>
                    <td>{{ $summeryMaterials['qtyPerc'][] = round((array_sum($pieChartMaterial['qty'])/$orderQtySum)*100, 2) }}%</td>
                    <td>{{ array_sum($pieChartMaterial['value']) }}</td>
                    <td>{{ $summeryMaterials['valuePerc'][] = round((array_sum($pieChartMaterial['value'])/$orderTotalValue)*100, 2) }}%</td>
                    <td>{{ array_sum($pieChartMaterial['shipmentQty']) }}</td>
                    <td>{{ round((array_sum($pieChartMaterial['shipmentQty'])/array_sum($pieChartMaterial['qty']))*100, 2) }}%</td>
                </tr>
            @endforeach
                <tr style='color: white; background: #777'>
                    <th>Tot</th>
                    <th></th>
                    <th>TotOrderQty</th>
                    <th>Tot %</th>
                    <th>TotalValue</th>
                    <th>Tot %</th>
                    <th>TotShipQty</th>
                    <th>Tot %</th>
                </tr>
                <tr style='color: blue; background: #d2d6de'>
                    <td>{{ $summeryCount }}</td>
                    <td></td>
                    <td>{{ $orderQtySum }}</td>
                    <td>{{ isset($summeryMaterials['qtyPerc'])? array_sum($summeryMaterials['qtyPerc']): 0 }}%</td>
                    <td>{{ round($orderTotalValue, 2) }}</td>
                    <td>{{ isset($summeryMaterials['valuePerc'])?array_sum($summeryMaterials['valuePerc']):0 }}%</td>
                    <td>{{ round($totShipQty, 2) }}</td>
                    <td>{{ ($totShipQty>0 && $orderQtySum>0) ? round(($totShipQty/$orderQtySum)*100, 2):0 }}%</td>
                </tr>
            </table>
`;


        $('.box-success').html('<div style="height: 400px; overflow-y: scroll" id="append-tbl"> <div style="border: 1px solid #ebebeb" class="col-md-6" id="buyer-order-qty"></div> <div style="border: 1px solid #ebebeb" class="col-md-6" id="buyer-order-value"></div> </div>');




        Highcharts.chart('buyer-order-qty', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Buyer Wise Order Quantity'
            },
            tooltip: {
                pointFormat: '<b>{series.name} : {point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Qty',
                colorByPoint: true,
                data: [
                        @foreach($pieChartMaterials as $name=>$pieChartMaterial)
                        ['{{ $name }}', {{ array_sum($pieChartMaterial['qty']) }}],
                        @endforeach
                    ]
            }]
        });

        Highcharts.chart('buyer-order-value', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Buyer Wise Order Value'
            },
            tooltip: {
                pointFormat: '<b>{series.name} : {point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Value',
                colorByPoint: true,
                data: [

                    @foreach($pieChartMaterials as $name=>$pieChartMaterial)
                    ['{{ $name }}', {{ array_sum($pieChartMaterial['value']) }}],
                    @endforeach
                    ]
            }]
        });
        $('#append-tbl').append(summeryHtml);
    }



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

<script>

    $(document).ready(function () {
        sortTable();
    });

    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("summeryTable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[4];
                y = rows[i + 1].getElementsByTagName("TD")[4];
                //check if the two rows should switch place:
                if (Number(x.innerHTML) < Number(y.innerHTML)) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>
