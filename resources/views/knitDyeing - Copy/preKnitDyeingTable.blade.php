<tbody id="childTable">
<?php $var = 1; $orderQtySum = 0; $orderTotalValue = 0; $totShipQty = 0; $totShipVal = 0; $totShrtShipVal = 0; $totCMperDz = 0; $totCmV = 0; $totSMV = 0;?>
@foreach ($employees as $employee)
    <tr class="orderRow @if($employee->prStatus) prSts @endif" id="row{{ $employee->order_number }}" orderId="{{ $employee->order_number }}">
        <td class="text-center">
            {{ $var++ }}
            <small class="text-aqua">{{ $employee->Id }}</small>
        </td>
        <td class="text-center buyerName" >
            {{ $employee->customer_name }}
        </td>
        <td style="overflow: auto;" class="text-center orderNo">
            {{ $employee->orderID }}
        </td>
        <td class="text-center styleDesc">
            {{ $employee->article_no }}
        </td>

        <td class="text-center">
            {{ $employee->style_description }}
        </td>
        <td class="text-center">
            <img class="imgPreview" src="{{ asset('') }}assets/garmentsImage/{{ $employee->garmentImg }}" alt="" height="50" width="50"/>
        </td>
        <td class="text-center btn btn-default shipDate">
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
        <td class="text-center orderQty">
            {{ $employee->order_quantity }}
            <?php $orderQtySum += $employee->order_quantity ?>
        </td>
        <td class="text-center shipmntSts clkAbl">
            {{ $employee->order_status }}
        </td>
        <td class="">
            <p class="KDclkAbl"> {{--<a href="{{ url('appointmentLetter') }}" id="printMe" data-toggle="tooltip" data-placement="left" title="Print Appointment Letter!" class="btn purple fa fa-pencil"><i class="fa fa-print"></i></a>--}}
                {{--<a style="" class="" id="editOrderInfo" data-toggle="tooltip" title="" href="{{ route('knitDying.edit', $employee->Id) }}"><i class="fa fa-pencil-square-o fa-2x"></i> </a>--}}

                <a {{ $hasData = DB::table('knitdyeing_prgrm')->where('order_id', $employee->Id)->first() ? '1':'0' }} class="KDEntry KDcl{{$hasData}}" data-toggle="tooltip" title="" onclick="KDEntry('{{ $employee->Id }}', '{{ $hasData }}', '{{ $employee->order_quantity }}')"><i class="{{ $hasData == 1 ? 'fa fa-align-center':'fa fa-address-book' }}"></i> </a> &nbsp;
                <a class="KDPrgrmPreview" data-toggle="tooltip" title="" onclick="javascript:previewKDPrgrm({{ $employee->Id }});" href="#{{--{{ route("knitDyingProg.show", $employee->Id) }}--}}"><i class="fa fa-print"></i> </a>
                <a onclick="javascript:deleteKDPrgrm({{ $employee->Id }});" href="#"><i class="fa fa-trash-o"></i> </a>
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
    <td><b>TotOrdQty</b></td>

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
    <td><b>{{ $orderQtySum }}</b></td>

    <td></td>
    <td></td>
</tr>
</tfoot>

<script>

    function deleteKDPrgrm(ordId) {

        var kd = confirm("are you delete this !");
        if (kd == true) {
            var url = "{{ url('knitDyingProg/delete_kd/:ordId') }}";
            url = url.replace(":ordId", ordId);

            $.ajax({
                url: url,
                success: function () {
                    swal("Deleted !", "KD program has been Deleted ! "+id, "success");
                },
                error: function () {
                    alert('error');

                }
            });
        }
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

    var ordQtyFromFun;

    function KDEntry(id, trueOrFalse, ordQty) {
        //id = orderId
        ordQtyFromFun = ordQty;
        if (trueOrFalse == 0) {
            $("#kdEntryDiv").modal();
            $('[name="KD[order_id]"]').val(id);
        } else {
            var $wholePage = $("#wholeSection").detach();
            var url = "{{ route('knitDyingProg.edit', ':ordId') }}";
            url = url.replace(":ordId", id);

            $.ajax({
                url: url,
                success: function (data) {
                    $(".content-wrapper").html(data);

                    $(".backward").click(function () {
                        $(".child-wrap").remove();
                        $(".content-wrapper").html($wholePage);
                    });

                    $("#kdPEdit").ajaxForm({
                        success: function () {
                            $(".child-wrap").remove();
                            $(".content-wrapper").html($wholePage);
                            swal("Updated !", "KD program has been Updated ! "+id, "success");
                        },
                        error: function () {
                            alert("Error");
                        }
                    });
                }
            });
            //$(".content-wrapper").html($wholePage);
        }
        //$("#loadingDiv").modal();
    }

    $(".fa-address-book").click(function () {
        $(this).hide();
    });

    $(".KDEntry, .KDPrgrmPreview").click(function () {
        var buyerName = $(this).parent().parent().parent().find(".buyerName").text();
        buyerName = buyerName.trim();
        $(".modalBuyerName").html(buyerName);

        var orderNo = $(this).parent().parent().parent().find(".orderNo").text();
        orderNo = orderNo.trim();
        $(".modalOrderNo").html(orderNo);

        var styleDesc = $(this).parent().parent().parent().find(".styleDesc").text();
        styleDesc = styleDesc.trim();
        $(".modalStyleDesc").html(styleDesc);

        var orderQty = $(this).parent().parent().parent().find(".orderQty").text();
        orderQty = orderQty.trim();
        $(".modalOrderQty").html(orderQty);

        var shipDate = $(this).parent().parent().parent().find(".shipDate").text();
        shipDate = shipDate.trim();
        $(".modalShipDate").html(shipDate);



    });
</script>
