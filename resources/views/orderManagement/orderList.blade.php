<script src="{{ asset('') }}assets/jQuery/jquery.floatThead.min.js"></script>
<style>
    #shpmntTable{
        max-width:2000px;
        min-width:1900px;
    }
    #shpmntTable th, #shpmntTable td{
        width:100px
    }

</style>
<div class="">
    @include('tools.scrollBtn.scrollBtn')
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">

                <div class="box-body">
                    <div class="page-content" style="min-height:602px">
                        <!-- BEGIN PAGE HEADER-->
                        <h3 class="page-title">
                            Shipment
                            <small>Shipment Schedule</small>
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
                                    <a href="#">Shipment Schedule</a>
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
                                <!-- BAR CHART -->
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Chart {{ $yr }}</h3>
                                        <select style="width: 7em;" name="chart" class="">
                                            <option value="" selected>Select</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('[name="chart"]').change(function () {
                                                var url = '{{ route('Order.index', 'chart=running') }}';
                                                url = url.replace('chart=running', "chart="+$(this).val());
                                                //alert(url);
                                                $.ajax({
                                                    url: url,
                                                    success: function (data) {
                                                        $('.content-wrapper:eq(0)').html(data);
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <div class="box-body">
                                        <div class="" style="width: 900px">
                                            <canvas id="shpmntBarChart" style="height:230px"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
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
                                            <i class="fa fa-street-view"></i>Shipment Schedule
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                                        <table width="100%">
                                            <!--DWLayoutTable-->
                                            <tbody>
                                            <tr>
                                                <td width="537" height="31">
                                                    <table width="100%" id="date-area">
                                                        <tbody>
                                                        <tr>
                                                            <td class="form-group">
                                                                @include('tools.years')
                                                            </td>
                                                            <td valign="top"><input value="Jan" onclick="transfer('01-01-','31-01-');" class="urg1 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Feb" onclick="transfer('01-02-','28-02-'); " class="urg2 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Mar" onclick="transfer('01-03-','31-03-');" class="urg3 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Apr" onclick="transfer('01-04-','30-04-');" class="urg4 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="May" onclick="transfer('01-05-','31-05-');" class="urg5 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Jun" onclick="transfer('01-06-','30-06-');" class="urg1 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Jul" onclick="transfer('01-07-','31-07-');" class="urg2 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Aug" onclick="transfer('01-08-','31-08-');" class="urg3 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Sept" onclick="transfer('01-09-','30-09-');" class="urg4 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Oct" onclick="transfer('01-10-','31-10-');" class="urg5 btn btn-default" type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Nov" onclick="transfer('01-11-','30-11-');" class="urg1 btn btn-default" type="button"></td>
                                                            <td>&nbsp;</td>
                                                            <td valign="top"><input value="Dec" onclick="transfer('01-12-','31-12-');" class="urg2 btn btn-default" type="button"></td>
                                                            <td></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control" name="" id="extra-func">
                                                                    <option value="..." selected>...</option>
                                                                    <option value="...">...</option>
                                                                    <option style="background: #9e84a8; color: white" value="ActShipDate">ActShipDate</option>
                                                                    <option style="background: #a8296a; color: white" value="entryDate">Entry Date</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="">
                                            <span class="text-center">
                                                <button class="print btn btn-success">PrintSheet</button>
                                                <button class="btn btn-success" id="tblToexcel">ExportExcel</button>
                                                <button class="btn btn-success" onclick="sortTable();" >Sort Value</button>
                                            </span>
                                            <span id="buyerNmShow" style="font-size: 1.1em; font-weight: bold; color: #457ac2;"></span>
                                            <span class="pull-right form-inline">
                                                <label>
                                                    <input style="width: 6em" id="ShpmReloadBtn" value="Reload" class="btn btn-warning" readonly>
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
                                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="shpmntTable" role="grid" aria-describedby="sample_employees_info">

                                                    <thead class="bg-primary" id="ShpmntHead">
                                                    <tr role="row">
                                                        <th style="text-align: center; width: 60px;" class="sorting"
                                                            tabindex="0" aria-controls="sample_employees" rowspan="1"
                                                            colspan="1" aria-label="
                                                            Name
                                                            : activate to sort column ascending">
                                                            Job ID
                                                            <br>
                                                            <input style="width: 50px; color: black; font-size: 0.9em" id="byJobSrch" type="text">
                                                        </th>

                                                        <th style="text-align: center; width: 84px;" class="sorting"
                                                            tabindex="0" aria-controls="sample_employees" rowspan="1"
                                                            colspan="1" aria-label="
                                                            Name
                                                            : activate to sort column ascending">
                                                            BuyerName
                                                            <br>
                                                            <input style="width: 75px; color: black; font-size: 0.9em" id="byrNmeSrch" type="text">
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 82px;" aria-label="Order number : activate to sort column ascending">
                                                            OrderNo
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em" id="ordNumSrch" type="text">

                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 100px;" aria-label="
                                                            Dept/Designation
                                                            : activate to sort column ascending">
                                                            StyleNo
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em" id="artclNumSrch" type="text">
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Dept/Designation
                                                            : activate to sort column ascending">
                                                            StyDesc
                                                            <br>
                                                            <input style="width: 50px; color: black; font-size: 0.9em" id="stlDesSrch" type="text">
                                                        </th>
                                                        <th style="width: 60px" class="text-center sorting" >
                                                            Iamge
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Status
                                                            : activate to sort column ascending">
                                                            EntryDate
                                                            <input style="width: 50px; color: black; font-size: 0.9em" id="entry-date-search" type="text">
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Status
                                                            : activate to sort column ascending">
                                                            ShipDate
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="Status: activate to sort column ascending">
                                                            RemDay
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            At Work
                                                            : activate to sort column ascending">
                                                            OrderQty
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em" id="ordrQtySrch" type="text">
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Phone
                                                            : activate to sort column ascending">
                                                            UnitPrice
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em" id="untPrceSrch" type="text">
                                                        </th>

                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Status
                                                            : activate to sort column ascending">
                                                            TotalValue
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            ShipQty
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            ShipVal
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            ShrtShpVal
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            ActShipDate
                                                            <input style="width: 60px; color: black; font-size: 0.9em" id="actShip-Date" class="dPickTbl" type="text">

                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" style="" aria-label="Action">
                                                            OrderStatus

                                                            <select style="color: black; width: 6em" class="" id="shipSts" >
                                                                <option>Select...</option>
                                                                <option>Running</option>
                                                                <option>Partial Shipment</option>
                                                                <option>ShipOut</option>
                                                            </select>
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            Cm/Dz
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            CM
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            YrnConsum
                                                        </th>
                                                        <th class="text-center sorting_disabled">
                                                            TotYrn
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            SMV
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Action
                                                            ">
                                                            Tot.SMV
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 90px;" aria-label="
                                                            Dept/Designation
                                                            : activate to sort column ascending">
                                                            LC / SalesCtrct
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em" id="SalesPrsn" type="text">
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;" aria-label="Action">
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <thead class="bg-primary" id="hiddenTHead" style="display: none">
                                                    <tr>
                                                        <th colspan="5">
                                                            <h1>Shipment Schedule</h1>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4">
                                                            <h2>{{ date('D-M') }} || {{ date('d-m-Y') }}</h2>
                                                        </th>
                                                    </tr>
                                                    <tr role="row">
                                                        <th>#</th>
                                                        <th>BuyerName</th>
                                                        <th>OrderNo</th>
                                                        <th>StyleNo</th>
                                                        <th>StyDesc</th>
                                                        <th>Image</th>
                                                        <th>RcvDate</th>
                                                        <th>ShipDate</th>
                                                        <th>RemDay</th>
                                                        <th>OrderQty</th>
                                                        <th>UnitPrice</th>
                                                        <th>TotalValue</th>
                                                        <th>ShipQty</th>
                                                        <th>ShipVal</th>
                                                        <th>ShrtShpVal</th>
                                                        <th>ActualShipDate</th>
                                                        <th>Status</th>
                                                        <th>CM Per dz</th>
                                                        <th>CM</th>
                                                        <th>YrnConsum</th>
                                                        <th>TotYrn</th>
                                                        <th>SMV</th>
                                                        <th>Tot.SMV</th>
                                                        <th>SalesCtrct</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    @include("orderManagement.shpmntTable")
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
                <div class="box-footer" >
                    Footer
                    <div id="printout">d  </div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        window.cou = 0;

        var ordInof;
        var searchType = 'typicalDate';
        $(document).ready(function(){
            $("#extra-func").change(function () {
                if ($(this).val() == '...') {
                    $("#date-area").css('background', '#ffffff');
                    searchType = 'typicalDate';

                } else if ($(this).val() == 'ActShipDate') {
                    $("#date-area").css('background', '#9E84A8');
                    searchType = 'actDate';
                } else if ($(this).val() == 'entryDate') {
                    $("#date-area").css('background', '#a8296a');
                    searchType = 'entryDate';
                }
            });
            //$("#byrNmeSrch").bind("keyup click mouseenter mouseleave", function () {

            //});

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
                    filename: "ShipmentSchedule_" + today,
                    fileext: ".xls"
                });
                $("#shpmntTable").append(ShpmntHead);
            });

            $(".print").click(function () {
                var ShpmntHead = $("#ShpmntHead").detach();
                //console.log(ShpmntHead);
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
                position: 'absolute'
            });


            function libSearch(selector, field) {
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

                if (from.length < 1) {
                    from = '-';
                }
                if (to.length < 1) {
                    to = '-';
                }

                if ('actualShipDate' == field) {
                    $(selector).change(function () {
                        var getActionURL = "{{ url('Order/autoCompltRslt')}}/actualShipDate/" + $(this).val().trim() + "/" + from + "/" + to;
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
                    });
                }

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
                                        url: '{{ url('Order/listTable') }}',
                                        cache: false,
                                        global: false,
                                        success: function(data){
                                            $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                                            $("#shpmntTable").append(data);
                                        }
                                    });
                                }
                            });
                        },
                        select: function( event, ui ) {
							if(selector!='#byJobSrch') {
								console.log(selector);
								$('#byJobSrch').val('');
							}
                            $("#shipSts").val('Select...');
                            var name = ui.item.value;

                            //console.log(name);

                            if(name!=window.location){
                                var selectorFrUrl = selector.substring(1);

                                window.history.pushState(
                                    {
                                        path:name
                                    },
                                    '',
                                    '#ShipmentSchedule/'+field+'/dataChk/'+name+'/mdlUrl/'+selectorFrUrl+'/endUrl/'+from+'/'+to
                                );
                                //alert(window.location.href);
                            }

                            if ('actualShipDate' != field) {
                                if (name.indexOf('-') > -1)
                                {
                                    name = name.replace("-", "******");
                                }
                                if (name.indexOf('/') > -1)
                                {
                                    name = name.replace("/", "-");
                                }
                            }

                            if ('date_of_entry' == field) {
                                if (name.indexOf('-') > -1)
                                {
                                    name = name.replace("******", "-");
                                }
                            }

                            var getActionURL = "{{ url('Order/autoCompltRslt')}}/" + field + "/" + name + "/" + from + "/" + to;
                            $.ajax({
                                cache: false,
                                global: false,
                                url: getActionURL,
                                success: function (data) {
                                    cou++; //for Pie Charts
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
            libSearch("#actShip-Date", "actualShipDate");
            libSearch("#SalesPrsn", "lcOrSalsePrsn");
            //libSearch("#shipSts", "order_status");
            libSearch("#entry-date-search", "date_of_entry");
            libSearch("#byJobSrch", "Id");


            function backPageSearch(selector, field, searchVal) {
                $('#'+selector).val(shrchVal);
                $("#shipSts").val('Select...');

                var from = $("#from").val();
                var to = $("#to").val();
                if (from.length < 1) {
                    from = '-';
                }
                if (to.length < 1) {
                    to = '-';
                }
                var getActionURL = "{{ url('Order/autoCompltRslt')}}/" + field + "/" + searchVal + "/" + from + "/" + to;
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
            }

            var url = window.location.href;

            if (url.includes('#ShipmentSchedule') == true) {
                var field = url.substring(url.indexOf('#ShipmentSchedule')+18, url.indexOf('dataChk')-1)
            }
            if (url.substring(url.indexOf('#'), url.indexOf('dataChk')) == '#ShipmentSchedule/'+ field +'/') {
                //alert(url.substring(url.indexOf('mdlUrl')+7, url.indexOf('/endUrl')));
                var shrchVal = url.substring(url.indexOf('dataChk')+8, url.indexOf('mdlUrl')-1);
                var selector = url.substring(url.indexOf('mdlUrl')+7, url.indexOf('/endUrl'));

                backPageSearch(selector, field, shrchVal);
            }
        });

//Start-18-11-16
        $("#fromToSearch").click(function () {
            cou++; //for Pie Charts
            //searchType
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
            var shipSts = $("#shipSts").val();
            if (shipSts == 'Select...') {
                shipSts = '-';
            }
            //alert(shipSts);
            if (byrNmeSrch == '') {
                byrNmeSrch = '-';
            } else {
                $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
            }

            var url = "{{ url('Order/searchDateRange/:from/:to/:byrNmeSrch/:shipSts')}}";


            if (searchType == 'typicalDate') {

                url = url.replace(':from/:to/:byrNmeSrch/:shipSts', from+'/'+to+'/'+byrNmeSrch+'/'+shipSts);

            } else if (searchType == 'actDate') {

                url = "{{ url('Order/actDateRange/:from/:to/:byrNmeSrch/:shipSts')}}";
                url = url.replace(':from/:to/:byrNmeSrch/:shipSts', from+'/'+to+'/'+byrNmeSrch+'/'+shipSts);

            } else if (searchType == 'entryDate') {

                url = "{{ url('Order/entryDateRange/:from/:to/:byrNmeSrch/:shipSts')}}";
                url = url.replace(':from/:to/:byrNmeSrch/:shipSts', from+'/'+to+'/'+byrNmeSrch+'/'+shipSts);

            }


            var param = {
                customer_name: $("#byrNmeSrch").val(),
                orderID: $("#ordNumSrch").val(),
                order_status: ($("#shipSts").val() == 'Select...') ? '' : $("#shipSts").val(),
            };

            //console.log($.param(param));

            url = url + '?' + $.param(param);


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
            $( ".dPickTbl" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
            });
        });
        function showOrderInfo(order_number) {
            var url = '{{ route('Order.show', ':order_number') }}';
            url = url.replace(':order_number', order_number);
            $('.content-wrapper:eq(0)').load(url);
            $('.content-wrapper:eq(1)').remove();
        }

        function editOrderInfo(order_number) {
            var url = '{{ route('Order.show', ':order_number||EditReqFrmList') }}';
            url = url.replace(':order_number', order_number);
            //alert(url);
            $.ajax({
                url: url,
                success: function(data){
                    ordInof = $(".content-wrapper:eq(0)").children('div').detach();
                    $(".content-wrapper:eq(0)").html(data);
                    $('.content-wrapper:eq(1)').remove();
                    //alert(ordInof);
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
        var shptBarChartVar = document.getElementById("shpmntBarChart").getContext("2d"); //the element where show the chart

        //start bar chart start from July
        var shpmntBarChart = new Chart(shptBarChartVar, {
            type: 'bar',
            data: {
                labels: ["July", "August",  "September",  "October",  "November",  "December", "January", "February", "March", "April", "May", "June"],
                datasets: [
                    {
                        label: "Qty",
                        yAxesGroup: "1",
                        backgroundColor: '#1abc9c',
                        borderColor: '#ff0b21',
                        borderWidth: 1,
                        data: [{{ $julyQty }}, {{ $augustQty }}, {{ $septemberQty }}, {{ $octoberQty }}, {{ $novemberQty }}, {{ $decemberQty }}, {{ $januaryQty }}, {{ $februaryQty }}, {{ $marchQty }}, {{ $aprilQty }}, {{ $mayQty }}, {{ $juneQty }}],
                    },
                    {
                        label: "Value",
                        yAxesGroup: "2",
                        backgroundColor: '#c0392b',
                        borderColor: '#f39c12',
                        borderWidth: 1,
                        data: [{{ $julyValue }}, {{ $augustValue }}, {{ $septemberValue }}, {{ $octoberValue }}, {{ $novemberValue }}, {{ $decemberValue }}, {{ $januaryValue }}, {{ $februaryValue }}, {{ $marchValue }}, {{ $aprilValue }}, {{ $mayValue }}, {{ $juneValue }}],
                    },
                    {
                        label: "SAH",
                        yAxesGroup: "3",
                        backgroundColor: '#c0bb5a',
                        borderColor: '#4158f3',
                        borderWidth: 1,
                        data: [{{ $julySah }}, {{ $augustSah }}, {{ $septemberSah }}, {{ $octoberSah }}, {{ $novemberSah }}, {{ $decemberSah }}, {{ $januarySah }}, {{ $februarySah }}, {{ $marchSah }}, {{ $aprilSah }}, {{ $maySah }}, {{ $juneSah }}],
                    }
                ],
                yAxes: [{
                    name: "1",
                    scalePositionLeft: false,
                    scaleFontColor: "rgba(151,137,200,0.8)"
                }, {
                    name: "2",
                    scalePositionLeft: true,
                    scaleFontColor: "red"
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function (tooltipItems, data) {

                            var i, label = [], l = data.datasets.length;
                            for (i = 0; i < l; i += 1) {
                                label[i] = data.datasets[i].label + ' : ' + Number(data.datasets[i].data[tooltipItems.index]).toFixed(2);
                            }
                            return label;
                        }
                    },

                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        //end bar chart start from July


        //start bar chart start from january
        /*var shpmntBarChart = new Chart(shptBarChartVar, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August",  "September",  "October",  "November",  "December"],
                datasets: [
                    {
                        label: "Qty",
                        yAxesGroup: "1",
                        backgroundColor: '#1abc9c',
                        borderColor: '#2c3e50',
                        borderWidth: 1,
                        data: [{{ $januaryQty }}, {{ $februaryQty }}, {{ $marchQty }}, {{ $aprilQty }}, {{ $mayQty }}, {{ $juneQty }}, {{ $julyQty }}, {{ $augustQty }}, {{ $septemberQty }}, {{ $octoberQty }}, {{ $novemberQty }}, {{ $decemberQty }}],
                    },
                    {
                        label: "Value",
                        yAxesGroup: "2",
                        backgroundColor: '#c0392b',
                        borderColor: '#f39c12',
                        borderWidth: 1,
                        data: [{{ $januaryValue }}, {{ $februaryValue }}, {{ $marchValue }}, {{ $aprilValue }}, {{ $mayValue }}, {{ $juneValue }}, {{ $julyValue }}, {{ $augustValue }}, {{ $septemberValue }}, {{ $octoberValue }}, {{ $novemberValue }}, {{ $decemberValue }}],
                    },
                    {
                        label: "SAH",
                        yAxesGroup: "3",
                        backgroundColor: '#c0bb5a',
                        borderColor: '#4158f3',
                        borderWidth: 1,
                        data: [{{ $januarySah }}, {{ $februarySah }}, {{ $marchSah }}, {{ $aprilSah }}, {{ $maySah }}, {{ $juneSah }}, {{ $julySah }}, {{ $augustSah }}, {{ $septemberSah }}, {{ $octoberSah }}, {{ $novemberSah }}, {{ $decemberSah }}],
                    }
                ],
                yAxes: [{
                    name: "1",
                    scalePositionLeft: false,
                    scaleFontColor: "rgba(151,137,200,0.8)"
                }, {
                    name: "2",
                    scalePositionLeft: true,
                    scaleFontColor: "red"
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function (tooltipItems, data) {
                            var i, label = [], l = data.datasets.length;
                            for (i = 0; i < l; i += 1) {
                                label[i] = data.datasets[i].label + ' : ' + data.datasets[i].data[tooltipItems.index];
                            }
                            return label;
                        }
                    },

                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });*/
        //end bar chart start from january

    </script>

<script src="{{ asset('') }}assets/orderMangementJS/orderJS.js"></script>
