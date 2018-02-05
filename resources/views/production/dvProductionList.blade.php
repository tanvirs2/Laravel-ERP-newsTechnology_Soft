@extends('layouts.app')

@section('content')
<script src="{{ asset('') }}assets/jQuery/jquery.floatThead.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    @include('tools.scrollBtn.scrollBtn')

        <!-- Default box -->
        <div class="box">

            <div class="box-body">
                <div class="page-content" style="min-height:602px">


                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        Production
                        <small>Production</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="/hrm_demo/admin/dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="/hrm_demo/admin/employees">Order</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Production</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div id="load">


                            </div>
                            {{--<a id="OrderC" class="btn green">
                                Add New Order <i class="fa fa-user-plus"></i>
                            </a>--}}
                            <script>
                                $('#OrderC').click(function () {
                                    $('.content-wrapper:eq(0)').load('{{ route('Order.create') }}');
                                    $('.content-wrapper:eq(1)').remove();
                                });
                            </script>
                            <hr>
                            <div class="portlet box blue">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-street-view"></i>Production
                                    </div>
                                    <div class="tools">
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <!--DWLayoutTable-->
                                        <tbody>
                                        <tr>
                                            <td width="537" height="31">
                                                <table style="display: none" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td class="form-group">
                                                            <select style="width: 7em;" name="sYear" class="form-control">
                                                                <option value="2015">2015</option>
                                                                <option value="2016" selected>2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                            </select>
                                                        </td>
                                                        <td valign="top"><input value="Jan" onclick="transferT('01-01-','31-01-');" class="urg1 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Feb" onclick="transferT('01-02-','28-02-'); " class="urg2 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Mer" onclick="transferT('01-03-','31-03-');" class="urg3 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Apr" onclick="transferT('01-04-','30-04-');" class="urg4 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="May" onclick="transferT('01-05-','31-05-');" class="urg5 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Jun" onclick="transferT('01-06-','30-06-');" class="urg1 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Jul" onclick="transferT('01-07-','31-07-');" class="urg2 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Aug" onclick="transferT('01-08-','31-08-');" class="urg3 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Sept" onclick="transferT('01-09-','30-09-');" class="urg4 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Oct" onclick="transferT('01-10-','31-10-');" class="urg5 btn btn-default" type="button"></td>
                                                        <td></td>
                                                        <td valign="top"><input value="Nov" onclick="transferT('01-11-','30-11-');" class="urg1 btn btn-default" type="button"></td>
                                                        <td>&nbsp;</td>
                                                        <td valign="top"><input value="Dec" onclick="transferT('01-12-','31-12-');" class="urg2 btn btn-default" type="button"></td>
                                                        <td></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="">
                                        <span class="text-center"><button class="print btn btn-success">PrintSheet</button> <button class="btn btn-success" id="tblToexcel">ExportExcel</button></span>
                                        <span id="buyerNmShow" style="font-size: 1.1em; font-weight: bold; color: #457ac2;"></span>
                                        <span class="pull-right form-inline" style="display: none">
                                                <label>
                                                    <input style="width: 6em; display: none" id="prodReloadBtn" value="Reload" class="btn btn-warning" readonly>
                                                </label>
                                                <label>
                                                    <input style="width: 8em" id="from" placeholder="From" class="dPick form-control" readonly>
                                                </label>
                                                <label>
                                                    <input style="width: 8em" id="to" placeholder="To" class="dPick form-control" readonly>
                                                </label>
                                                <button id="fromToSearch" style="" class="btn btn-danger">DateSearch</button>
                                        </span>
                                    </div>
                                    <div id="sample_employees_wrapper" class="dataTables_wrapper no-footer">
                                        <div class="table-scrollable" id="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <th colspan="">Buyer</th>
                                                    <th colspan="">OrderNo</th>
                                                    <th colspan="">StyleNo</th>
                                                    <th colspan="">StyleDesc</th>
                                                    <th colspan="">Shipping</th>
                                                    <th colspan="">OrdQty</th>
                                                    <th colspan="">LastUpdate</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="">{{ $buyerDetails->customer_name }} | </th>
                                                    <th colspan="">{{ $buyerDetails->orderID }} | </th>
                                                    <th colspan="">{{ $buyerDetails->article_no }} | </th>
                                                    <th colspan="">{{ $buyerDetails->style_description }} | </th>
                                                    <th colspan="">{{ $buyerDetails->date_of_ship }} | </th>
                                                    <th colspan="">{{ $buyerDetails->order_quantity }} | </th>
                                                    <th colspan="">{{ $buyerDetails->prDate }}</th>
                                                </tr>
                                            </table>
                                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="shpmntTable" role="grid" aria-describedby="sample_employees_info">
                                                <thead class="bg-primary" id="ShpmntHead">
                                                <tr role="row">
                                                    <th style="text-align: center; width: 10px;" class="sorting"
                                                        tabindex="0" aria-controls="sample_employees" rowspan="1"
                                                        colspan="1" aria-label="
                                                            Name
                                                            : activate to sort column ascending">

                                                    </th>

                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 19px;">
                                                        PrDate
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 19px;">
                                                        Cutting
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 19px;">
                                                        Line
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 19px;">
                                                        SwingIn
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 19px;">
                                                        SwingOut
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 19px;">
                                                        Iron
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 19px;">
                                                        Poly
                                                    </th>
                                                    <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                        style="width: 50px;" aria-label="Action">
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <thead class="bg-primary" id="hiddenTHead" style="display: none">
                                                <tr role="row">
                                                    <th>#</th>

                                                    <th>Date</th>
                                                    <th>Cutting</th>
                                                    <th>line</th>
                                                    <th>SwingIn</th>
                                                    <th>SwingOut</th>
                                                    <th>Poly</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                @include("production.dvProdTable")
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->

                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->

                    <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static"
                         data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body" id="info">
                                    <p>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn red" id="delete">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
                <div id="printout">  </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<script>
    $(document).ready(function(){
        $("#tblToexcel").click(function () {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10) {
                dd='0'+dd
            }
            if(mm<10) {
                mm='0'+mm
            }
            today = mm+'-'+dd+'-'+yyyy;
            var ShpmntHead = $("#ShpmntHead").detach();
            $("#shpmntTable").table2excel({
                name: "table",
                filename: "Production_" + today,
                fileext: ".xls"
            });
            $("#shpmntTable").append(ShpmntHead);
        });

        $(".print").click(function () {
            var ShpmntHead = $("#ShpmntHead").detach();
            $("#hiddenTHead").removeAttr("style");
            var divToPrint=document.getElementById("table-scrollable");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
            $("#hiddenTHead").css("display", "none");
            $("#shpmntTable").append(ShpmntHead);
        });

        var $table = $("#shpmntTable");
        $table.floatThead({
            scrollingTop: 0,
            position: 'absolute'
        });
        /*var table = $('#sample_employees').DataTable();
         $('.dateClick').on( 'keyup keypress blur change paste click', function () {
         var s = $('#customSearch').val();
         table.search( s ).draw();
         } );

         //Buyer Name
         var arr = table.columns().data()[1];
         var cusName = arr.filter(function(elem, index, self) {
         return index == self.indexOf(elem);
         });
         $.each(cusName, function (index, value) {
         $('#opFrmJs').append("<option value="+ value +">"+ value +"</option>");
         });
         $('#opFrmJs').on('change', function (){
         var selVal = $(this).val();
         table.search( selVal ).draw();
         });

         //Order No
         var arr = table.columns().data()[2];
         var orderNo = arr.filter(function(elem, index, self) {
         return index == self.indexOf(elem);
         });
         $.each(orderNo, function (index, value) {
         $('#orderNo').append("<option value="+ value +">"+ value +"</option>");
         });
         $('#orderNo').on('change', function (){
         var selVal = $(this).val();
         table.search( selVal ).draw();
         });

         //Style Description
         var arr = table.columns().data()[4];
         var styleDes = arr.filter(function(elem, index, self) {
         return index == self.indexOf(elem);
         });
         $.each(styleDes, function (index, value) {
         $('#styleDes').append("<option value="+ value +">"+ value +"</option>");
         });
         $('#styleDes').on('change', function (){
         var selVal = $(this).val();
         table.search( selVal ).draw();
         });*/

        function libSearch(selector, field) {
            $(selector).autocomplete({
                source: function (request, response) {
                    var DTO = {"terms" : request.term};
                    var getNameURL = "{{ url('Order/autoCompltSrch')}}/" + field + "/" + DTO.terms;
                    $.ajax({
                        data: DTO,
                        global: false,
                        type: "GET",
                        url: getNameURL,
                        success: function (data) {
                            if (data == false) {
                                swal({
                                    title: "",
                                    text: "<span style='color: red'><b>Data not Found !</b></span>",
                                    timer: 1000,
                                    showConfirmButton: true,
                                    html: true
                                });
                                $(selector).select();
                            }else {
                                response(data);
                            }
                        },
                        error: function () {
                            $.ajax({
                                url: '{{ route('Order.index') }}',
                                cache: false,
                                global: false,
                                success: function(data){
                                    $('.content-wrapper:eq(0)').html(data);
                                    $('.content-wrapper:eq(1)').remove();
                                }
                            });
                        }
                    });
                },
                select: function( event, ui ) {
                    var name = ui.item.value;
                    if (name.indexOf('-') > -1)
                    {
                        name = name.replace("-", "******");
                    }
                    if (name.indexOf('/') > -1)
                    {
                        name = name.replace("/", "-");
                    }
                    var getActionURL = "{{ url('Order/autoCompltRslt')}}/" + field + "/" + name;
                    $.ajax({
                        cache: false,
                        global: false,
                        url: getActionURL,
                        success: function (data) {
                            $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                            $("#shpmntTable").append(data);
                        },
                        error: function () {
                            alert('table Error !');
                        }
                    });
                },
                autoFocus: true,
                minLength: 0
            });
        }

        libSearch("#byrNmeSrch", "customer_name");
        libSearch("#ordNumSrch", "orderID");
        libSearch("#artclNumSrch", "article_no");
        libSearch("#stlDesSrch", "style_description");
        libSearch("#ordrQtySrch", "order_quantity");
        libSearch("#untPrceSrch", "unit_price");
        //libSearch("#shipSts", "order_status");
    });

    //Start-18-11-16
    $("#fromToSearch").click(function () {
        var from = $("#from").val();
        var to = $("#to").val();
        var Date1 = from.split('-');
        var Date2 = to.split('-');
        var minDate = new Date(Date1[2] +'/'+ Date1[1] +'/'+ Date1[0]);
        var maxDate = new Date(Date2[2] +'/'+ Date2[1] +'/'+ Date2[0]);
        if (minDate > maxDate) {
            swal({
                title: "",
                text: "<span style='color: red'><b>Date rang Incorrect !</b></span>",
                showConfirmButton: true,
                html: true
            });
            return false;
        }
        var byrNmeSrch = $("#byrNmeSrch").val();
        if (byrNmeSrch == '') {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        var url = "{{ url('Order/searchDateRange/:from/:to/:byrNmeSrch')}}";
        url = url.replace(':from/:to/:byrNmeSrch', from+'/'+to+'/'+byrNmeSrch);
        $.ajax({
            url: url,
            cache: false,
            global: false,
            success: function(data) {
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
                if (!$(".orderRow").length > 0) {
                    swal({
                        title: "",
                        text: "<span style='color: red'><b>Not Found !</b></span>",
                        showConfirmButton: true,
                        html: true
                    });
                }
            }
        });
    });

    $( function() {
        $( ".dPick" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
    });
    function showOrderInfo(order_number) {
        var url = '{{ route('Order.show', ':order_number') }}';
        url = url.replace(':order_number', order_number);
        $('.content-wrapper:eq(0)').load(url);
        $('.content-wrapper:eq(1)').remove();
    }

    function editProdInfo(order_number) {
        var url = '{{ route('production.show', ':order_number||EditReqFrmList') }}';
        url = url.replace(':order_number', "161130-142425");
        //alert(url);
        $.ajax({
            url: url,
            success: function(data){
                $(".content-wrapper:eq(0)").html(data);
                $('.content-wrapper:eq(1)').remove();
            },
            error: function () {
                //alert('sda');
            }
        });
    }
    //End-18-11-16
    function transfer(from, to) {
        var sYear = $('[name="sYear"]').val();
        $('#from').val(from + sYear);
        $('#to').val(to + sYear);
        $('#fromToSearch').click();
    }

    $('#printMe').click(function(){
        //alert('dsda');
        //console.log($("#printout").printArea());
        //$("#printout").printArea();
    });

    function del(id,name)
    {
        $('#deleteModal').appendTo("body").modal('show');
        $('#info').html('Are you sure ! You want to delete <strong>'+name+'</strong> ??');
        $("#delete").click(function()
        {
            var url = "{{ url('/delete_order:id') }}";
            idRep = '/'+id;
            url = url.replace(':id',idRep);

            $.ajax({method: "get", url: url, success: function(result){
                //alert(result);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('#deleteModal').modal('hide');
                $('#row'+id).closest('tr').remove();
                $('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Successfully Deleted</p>");
            }});

            /*
             $.ajax({
             type: "DELETE",
             url : url,
             dataType: 'json',
             data: {"id":id}

             }).done(function(response)
             {
             //console.log(response);

             if(response.success == "deleted")
             {
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#deleteModal').modal('hide');
             $('#row'+id).closest('tr').remove();
             $('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Successfully Deleted</p>");
             }
             });*/
        })

    }

</script>
<script src="{{ asset('') }}assets/orderMangementJS/orderJS.js"></script>
@endsection