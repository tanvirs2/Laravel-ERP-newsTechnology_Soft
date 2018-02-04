/**
 * Created by Tanvir on 11/30/2016.
 */
/*Base URL*/
var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var laravelBaseUrl = baseUrl + "/public";
/*Base URL*/
$(document).ready(function () {
    $("#shpmntTable").on('dblclick', ".shipmntSts", function () {
        var orderId = $(this).closest("tr").attr("orderId");
        var shipmntStsElm = $(this).html('<select class="shipmntStsChng"> <option>Select...</option> <option>Running</option> <option>Partial Shipment</option> <option>ShipOut</option></select>')

        $(".shipmntStsChng").change(function () {
            var shipmntSts = $(this).val();
            var url = laravelBaseUrl + "/Order/chngShpmntSts/" + shipmntSts +"/"+ orderId;
            $.ajax({
                url: url,
                cache: false,
                global: false,
                success: function(data){
                    $('.shipmntStsChng').hide();
                    $(shipmntStsElm).text(shipmntSts);
                },
                error: function(){
                    //alert('faild !');
                }
            });
        });
    });

    /*var ctrl = false;
    var alt = false;
    $(document).on('keyup keydown', function (e) {
        alt = e.altKey;
        if (alt) {
            $(".orderRow").css({"background": "white", "color": "black"});
        }
        ctrl = e.ctrlKey;
    });

    $(function () {
        $("#shpmntTable").on('click', ".orderRow", function () {
            if (ctrl) {
                $(this).css({"background": "#95a5a6", "color": "black"});
            } else {
                $(this).css({"background": "green", "color": "white"});
                $(".shipmntSts").css("color", "black");
            }
        });
    });*/

    $("#shpmntTable").on('click', ".orderRow", function () {
        $(this).css({"background": "#27ae60", "color": "white"});
        $(this).find("table").css({"background": "#27ae60", "color": "white"});
        $(this).find("a").css({"background": "#27ae60", "color": "white", "text-decoration": "none"});
        $(".shipmntSts").css("color", "black");
        $(this).dblclick(function () {
            $(this).css({"background": "white", "color": "black"});
            $(this).find("table").css({"background": "white", "color": "black"});
            $(this).find("a").css({"background": "white", "color": "black", "text-decoration": "none"});
        })
    });

    $("#shpmntTable").on("mouseenter", ".imgPreview", function () {
        $(this).hoverpulse({
            size: 140,  // number of pixels to pulse element (in each direction)
            speed: 400 // speed of the animation
        })
    });

    $("#shpmntTable").on("dblclick", ".shipQty", function () {
        var orderId = $(this).closest("tr").attr("orderId");
        var shipQtyinput = $(this).html('<input id="shipQtyVal" type="text" style="width: 5em; color: black">');
        $("#shipQtyVal").keyup(function (event) {
            if (event.keyCode == 13) {
                var shipQty = $(this).val();
                var url = laravelBaseUrl + "/Order/shipQty/" + shipQty +"/"+ orderId;
                $.ajax({
                    url: url,
                    cache: false,
                    global: false,
                    success: function(data){
                        $("#shipQtyVal").remove();
                        $(shipQtyinput).text(shipQty);
                    }
                });
            }
        });

    });

    $("#shpmntTable").on("dblclick", ".acShipDate", function () {
        var orderId = $(this).closest("tr").attr("orderId");
        var acShipDateId = $(this).html("<input id='acShipDateId' class='dPick' readonly type='text' style='width: 5em; color: black'>");
        $("#acShipDateId").focus();
        $("#acShipDateId").keyup(function (event) {
            if (event.keyCode == 13) {
                var acShipDate = $(this).val();
                var url = laravelBaseUrl + "/Order/actualShipDate/" + acShipDate +"/"+ orderId;
                $.ajax({
                    url: url,
                    cache: false,
                    global: false,
                    success: function(data){
                        $("#acShipDateId").remove();
                        $(acShipDateId).text(acShipDate);
                    }
                });
            }
        });
    });

    $(function() {
       $("#shpmntTable").on("focus", ".dPick", function () {
           $(this).datepicker({
               changeMonth: true,
               changeYear: true,
               dateFormat: 'dd-mm-yy',
               onSelect: function () {
                   $(this).focus();
               }
           });
       });
    });
    $("#ShpmReloadBtn").click(function () {
        $("#shipmentS").click();
    });
    $("#shipSts").change(function () {
        var byrNmeSrch = $("#byrNmeSrch").val();

        if (byrNmeSrch.length < 2) {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        //alert(byrNmeSrch);
        var shipSts = $(this).val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        var url = laravelBaseUrl + "/Order/orderStsSrc/"+ byrNmeSrch +"/"+ shipSts;
        $.ajax({
            url: url,
            cache: false,
            success: function(data){
                // alert(data);
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
            }
        });
    });
    $("#shipStsFrPr").change(function () {
        var byrNmeSrch = $("#byrNmeSrch").val();

        if (byrNmeSrch.length < 2) {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        //alert(byrNmeSrch);
        var shipSts = $(this).val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        var url = laravelBaseUrl + "/production/orderStsSrc/"+ byrNmeSrch +"/"+ shipSts;
        $.ajax({
            url: url,
            cache: false,
            success: function(data){
                // alert(data);
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
            }
        });
    });

    $("#shipStsFrKnitDyeing").change(function () {
        var byrNmeSrch = $("#byrNmeSrch").val();

        if (byrNmeSrch.length < 2) {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        //alert(byrNmeSrch);
        var shipSts = $(this).val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        var url = laravelBaseUrl + "/knitAndDyeing/orderStsSrc/"+ byrNmeSrch +"/"+ shipSts;
        $.ajax({
            url: url,
            cache: false,
            success: function(data){
                // alert(data);
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
            }
        });
    });
    $("#shipStsFrPreKnitDyeing").change(function () {
        var byrNmeSrch = $("#byrNmeSrch").val();

        if (byrNmeSrch.length < 2) {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        //alert(byrNmeSrch);
        var shipSts = $(this).val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        var url = laravelBaseUrl + "/knitAndDyeing/preOrderStsSrc/"+ byrNmeSrch +"/"+ shipSts;
        $.ajax({
            url: url,
            cache: false,
            success: function(data){
                // alert(data);
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
            }
        });
    });
    $("#shipStsFrmTna").change(function () {
        var byrNmeSrch = $("#byrNmeSrch").val();

        if (byrNmeSrch.length < 2) {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        //alert(byrNmeSrch);
        var shipSts = $(this).val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        var url = laravelBaseUrl + "/tna/orderStsSrc/"+ byrNmeSrch +"/"+ shipSts;
        $.ajax({
            url: url,
            cache: false,
            success: function(data){
                // alert(data);
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
            }
        });
    });
});



function cancelShp(id) {
    swal({
            title: "Are you sure?",
            text: "Cancel this Shipment!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "No !",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Cancel this!",
            closeOnConfirm: false
        },
        function(){
            var url = laravelBaseUrl + "/Order/cancelShipDate/" + id;
            $.ajax({
                url: url,
                cache: false,
                global: false,
                success: function(data){
                    swal("Canceled!", "This Shipment has been Canceled.", "success");
                    $('#row'+id).closest('tr').remove();
                }
            });
        });
}