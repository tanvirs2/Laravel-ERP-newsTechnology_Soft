@extends('layouts.app')

@section('content')
    <script src="{{ asset('') }}assets/jQuery/jquery.floatThead.min.js"></script>
    <script src="{{ asset('') }}assets/html2canvas/html2canvas.min.js"></script>
    <style>
        #shpmntTable {
            table-layout: fixed;
            max-width: 1100px;
            min-width: 1100px;
        }

        #shpmntTable th, #shpmntTable td {
            width: 100px
        }
    </style>
    <div class="content-wrapper">
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
                            Knitting Dyeing
                            <small>Knitting Dyeing</small>
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
                                    <a href="#">Knitting Dyeing</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN PAGE CONTENT-->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->


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
                                            <i class="fa fa-street-view"></i>Knitting Dyeing
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
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td class="form-group">
                                                                <select style="width: 7em;" name="sYear"
                                                                        class="form-control">
                                                                    <option value="2015">2015</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018" selected>2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                </select>
                                                            </td>
                                                            <td valign="top"><input value="Jan"
                                                                                    onclick="transfer('01-01-','31-01-');"
                                                                                    class="urg1 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Feb"
                                                                                    onclick="transfer('01-02-','28-02-'); "
                                                                                    class="urg2 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Mer"
                                                                                    onclick="transfer('01-03-','31-03-');"
                                                                                    class="urg3 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Apr"
                                                                                    onclick="transfer('01-04-','30-04-');"
                                                                                    class="urg4 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="May"
                                                                                    onclick="transfer('01-05-','31-05-');"
                                                                                    class="urg5 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Jun"
                                                                                    onclick="transfer('01-06-','30-06-');"
                                                                                    class="urg1 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Jul"
                                                                                    onclick="transfer('01-07-','31-07-');"
                                                                                    class="urg2 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Aug"
                                                                                    onclick="transfer('01-08-','31-08-');"
                                                                                    class="urg3 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Sept"
                                                                                    onclick="transfer('01-09-','30-09-');"
                                                                                    class="urg4 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Oct"
                                                                                    onclick="transfer('01-10-','31-10-');"
                                                                                    class="urg5 btn btn-default"
                                                                                    type="button"></td>
                                                            <td></td>
                                                            <td valign="top"><input value="Nov"
                                                                                    onclick="transfer('01-11-','30-11-');"
                                                                                    class="urg1 btn btn-default"
                                                                                    type="button"></td>
                                                            <td>&nbsp;</td>
                                                            <td valign="top"><input value="Dec"
                                                                                    onclick="transfer('01-12-','31-12-');"
                                                                                    class="urg2 btn btn-default"
                                                                                    type="button"></td>
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
                                        <span class="text-center">
                                            <button class="printT btn btn-success">PrintSheet</button>
                                            <button class="btn btn-success" id="tblToexcel">ExportExcel</button></span>
                                            <span id="buyerNmShow"
                                                  style="font-size: 1.1em; font-weight: bold; color: #457ac2;"></span>
                                            <span class="pull-right form-inline">
                                                <label>
                                                    <input style="width: 6em" id="ShpmReloadBtnN" value="Reload"
                                                           class="btn btn-warning" readonly>
                                                </label>
                                                <label>
                                                    <input style="width: 8em" id="from" placeholder="From"
                                                           class="dPick form-control" readonly>
                                                </label>
                                                <label>
                                                    <input style="width: 8em" id="to" placeholder="To"
                                                           class="dPick form-control" readonly>
                                                </label>
                                                <button id="fromToSearch" style=""
                                                        class="btn btn-danger">DateSearch</button>
                                            </span>
                                        </div>
                                        <div id="sample_employees_wrapper" class="dataTables_wrapper no-footer">
                                            <div class="table-scrollable" id="table-scrollable">
                                                <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                                       id="shpmntTable" role="grid"
                                                       aria-describedby="sample_employees_info">

                                                    <thead class="bg-primary" id="ShpmntHead">
                                                    <tr role="row">
                                                        <th style="text-align: center; width: 30px;" class="sorting"
                                                            tabindex="0" aria-controls="sample_employees" rowspan="1"
                                                            colspan="1" aria-label="
                                                            Name
                                                            : activate to sort column ascending">
                                                            #
                                                        </th>

                                                        <th style="text-align: center; width: 84px;" class="sorting"
                                                            tabindex="0" aria-controls="sample_employees" rowspan="1"
                                                            colspan="1" aria-label="
                                                            Name
                                                            : activate to sort column ascending">
                                                            BuyerName
                                                            <br>
                                                            <input style="width: 75px; color: black; font-size: 0.9em"
                                                                   id="byrNmeSrch" type="text">

                                                            <select style="display: none; width: 80px; color: black"
                                                                    id="opFrmJs">
                                                                <option></option>
                                                            </select>
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 82px;"
                                                            aria-label="Order number : activate to sort column ascending">
                                                            OrderNo
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em"
                                                                   id="ordNumSrch" type="text">
                                                            <select style="display: none; width: 80px; color: black"
                                                                    id="orderNo">
                                                                <option></option>
                                                            </select>
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 70px;" aria-label="
                                                            Dept/Designation
                                                            : activate to sort column ascending">
                                                            StyleNo
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em"
                                                                   id="artclNumSrch" type="text">
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            Dept/Designation
                                                            : activate to sort column ascending">
                                                            StyDesc
                                                            <br>
                                                            <input style="width: 50px; color: black; font-size: 0.9em"
                                                                   id="stlDesSrch" type="text">
                                                        </th>
                                                        <th style="width: 60px" class="text-center sorting">
                                                            Iamge
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
                                                            style=""
                                                            aria-label="Status: activate to sort column ascending">
                                                            RemDay
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            At Work
                                                            : activate to sort column ascending">
                                                            OrderQty
                                                            <br>
                                                            <input style="width: 60px; color: black; font-size: 0.9em"
                                                                   id="ordrQtySrch" type="text">
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="" aria-label="Action">
                                                            OrderStatus

                                                            <select style="color: black; width: 6em" class=""
                                                                    id="shipStsFrKnitDyeing">
                                                                <option>Select...</option>
                                                                <option>Running</option>
                                                                <option>Partial Shipment</option>
                                                                <option>ShipOut</option>
                                                            </select>
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 70px;" aria-label="Action">
                                                            Action
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 70px;" aria-label="Action">
                                                            Mrktng Yarn Rqrd
                                                        </th>
                                                        <th style="width: 300px" class="text-center">
                                                            TNA
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 1230px;" aria-label="Action">
                                                            Knitting And Dyeing
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <thead class="bg-primary" id="hiddenTHead" style="display: none">
                                                    <tr>
                                                        <th colspan="5">
                                                            <h1>Knitting & Dyeing</h1>
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
                                                        <th>ShipDate</th>
                                                        <th>RemDay</th>
                                                        <th>OrderQty</th>
                                                        <th>OrderSts</th>

                                                        <th>Action</th>
                                                        <th>MrktngYrnRqrd</th>
                                                        <th>Knit&Dyeing</th>
                                                    </tr>
                                                    </thead>
                                                    @include("knitDyeing.knitDyeingTable")
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet box blue">

                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-street-view"></i>KD Summery
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>

                                    <div class="portlet-body">

                                        <div class="">
                                            <span class="text-center"><button class="printBST btn btn-success">PrintSheet</button> <button class="btn btn-success" id="budgetTblToexcel">ExportExcel</button></span>
                                            <span id="buyerNmShow" style="font-size: 1.1em; font-weight: bold; color: #457ac2;"></span>

                                        </div>
                                        <div id="" class="dataTables_wrapper no-footer">
                                            <div class="" >
                                                <table style="font-size: 20px; font-weight: bold" class="table table-striped table-bordered table-hover no-footer" id="budgetTbl" role="grid" aria-describedby="">

                                                    <thead class="bg-primary" id="">
                                                    <tr role="row">
                                                        <th style="text-align: center; width: 30px;" class="sorting"
                                                            tabindex="0" aria-controls="sample_employees" rowspan="1"
                                                            colspan="1" aria-label="
                                                            Name
                                                            : activate to sort column ascending">
                                                            #
                                                        </th>

                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            At Work
                                                            : activate to sort column ascending">
                                                            TOTAL ORDER QTY : <span id="orderQtySum"></span> Pcs
                                                        </th>
                                                        {{--BudgetBlank--}}
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            At Work
                                                            : activate to sort column ascending">
                                                            Marketing yarn required: <span id="mrktngYrnRqrdSum"></span> KG
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="" aria-label="
                                                            At Work
                                                            : activate to sort column ascending">
                                                            Booked yarn: <span id="bookedYrnSum"></span> KG
                                                        </th>
                                                        {{--BudgetBlank--}}
                                                        <th>
                                                            
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;" aria-label="Action">
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <thead class="bg-primary" id="" style="display: none">
                                                    <tr role="row">

                                                    </tr>
                                                    </thead>
                                                    <style>
                                                        .sum-tr {
                                                            border-bottom: 1px solid black;
                                                            margin-bottom: 10px;
                                                        }
                                                        [class="bg-danger"] {
                                                            color: #420085;
                                                        }
                                                    </style>
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="6" class="bg-danger">Yarn received </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Required Quantity(kg)</td>
                                                        <td>Received</td>
                                                        <td>Balance(kg)</td>
                                                        <td>Balance %</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="sum-tr">
                                                        <td></td>
                                                        <td><span id="totYrnRcvSum"></span></td>
                                                        <td><span id="yrnRcvQty"></span></td>
                                                        <td><span id="yrnRcvBlnceKg"></span></td>
                                                        <td><span id="yrnRcvBlncePerc"></span></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="bg-danger">Yarn Issued </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Required Quantity(kg)</td>
                                                        <td>Issued qty(kg)</td>
                                                        <td>Balance(kg)</td>
                                                        <td>Balance %</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="totYrnIssSum"></td>
                                                        <td id="totYrnIssQtyKg"></td>
                                                        <td id="yrnIssBlnceKg"></td>
                                                        <td id="yrnIssBlncePerc"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="bg-danger">Knitting </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Required Quantity(kg)</td>
                                                        <td>Knitted qty</td>
                                                        <td>Balance(kg)</td>
                                                        <td>Balance %</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="totalKDkntQtySum"></td>
                                                        <td id="totalKDkntIssQtyKg"></td>
                                                        <td id="totalKDkntQtyBlnceKg"></td>
                                                        <td id="totalKDkntQtyBlncePerc"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="bg-danger">Dyeing </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Required Quantity(kg)</td>
                                                        <td>Diyed qty</td>
                                                        <td>Balance(kg)</td>
                                                        <td>Balance %</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="totalKDdyeingQtySum"></td>
                                                        <td id="totalKDdyeingIssQtyKg"></td>
                                                        <td id="totalKDdyeingQtyBlnceKg"></td>
                                                        <td id="totalKDdyeingQtyBlncePerc"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="bg-danger">Finish fabric received </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Required Quantity(kg)</td>
                                                        <td>Received</td>
                                                        <td>Balance(kg)</td>
                                                        <td>Balance %</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="totalKDfnshFabRqrdSum"></td>
                                                        <td id="totalKDfnshFabRcvSum"></td>
                                                        <td id="totalKDfnshFabRcvBlnceKg"></td>
                                                        <td id="totalKDfnshFabRcvBlncePerc"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="bg-danger">Finish fabric issue</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Required Quantity(kg)</td>
                                                        <td>Issued qty(kg)</td>
                                                        <td>Balance(kg)</td>
                                                        <td>Balance %</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="totalKDfnshFabRqrdSum1"></td>
                                                        <td id="totalKDfnshFabIssSum"></td>
                                                        <td id="totalKDfnshFabIssBlnceKg"></td>
                                                        <td id="totalKDfnshFabIssBlncePerc"></td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>

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
                        <!-- Modal -->
                        <div id="" class="modal fade kdProgModal" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <style>
                                    .table > tbody > tr > td {
                                        vertical-align: middle;
                                    }
                                </style>
                                <!-- Modal content-->
                                <?php
                                $factNamePrefix = DB::table('fact_settings')->first();
                                if ($factNamePrefix != true || $factNamePrefix->factoryName == '' || $factNamePrefix->factDesc == '') {
                                    class FactNamePrefix{}

                                    $factNamePrefix = new FactNamePrefix();
                                    $factNamePrefix->factoryName = 'NEWS TECHNOLOGY LTD';
                                    $factNamePrefix->factDesc = 'A Leading Software Company in Bangladesh';
                                }
                                ?>
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Knitting Dying Program</h4>
                                    </div>
                                    <div id="printKDprg">
                                        <style>
                                            .kd-ajax-modal .table-bordered {
                                                border: 1px solid #000000;
                                            }


                                            .kd-ajax-modal .table > thead > tr > th,
                                            .kd-ajax-modal .table > thead > tr > td {
                                            border-bottom-width: 2px;
                                            }

                                            .kd-ajax-modal #fabricsTab tr td:last-child {
                                                font-weight: bold;
                                            }
                                            .kd-ajax-modal .table > thead > tr > th, .kd-ajax-modal .table-bordered > tbody > tr > th, .kd-ajax-modal .table-bordered > tfoot > tr > th, .kd-ajax-modal .table-bordered > thead > tr > td, .kd-ajax-modal .table-bordered > tbody > tr > td, .kd-ajax-modal .table-bordered > tfoot > tr > td {
                                                padding: 1px;
                                                font-size: 12px;
                                            }

                                        </style>
                                        <div class="modal-body kd-ajax-modal">
                                            <table class="table">
                                                <tr>
                                                    <td class="text-center">
                                                        <prefix class="pull-left"></prefix>
                                                        <h2>{{ $factNamePrefix->factoryName }}</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">{{ $factNamePrefix->factDesc }}
                                                        <div>FABRICS KNITTING & DYEING PROGRAM</div>
                                                    </td>

                                                </tr>
                                            </table>

                                            <div id="pageAppndFrmKD" class="">

                                            </div>
                                        </div>
                                        <div class="modal-footer">


                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-default printKDprg">Load Print</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="load">
                            <div style="display: block">
                                <div id="previewImage"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer

                    <div id="printout"></div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        //doing work
        $(document).on('click', '.dltKdData', function (e) {
            swal({
                title:"Are sure to delete this !",
                text:"Qty Mismatch",
                type:"warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete !",
                closeOnConfirm: false,
                html: false
            }, function(){
                swal("Deleted!", "data has been deleted.", "success");
            });
        });
        //doing work

        $(document).on('click', '.updateKdData', function (e) {
            e.preventDefault();
            var $mainBtn = $(this);
            $(this).closest('tr').closest('table').find('input').prop("disabled", true);
            $(this).closest('tr').find("input").prop("disabled", false);
            var $id = $(this).attr('secId');
            var url = $(this).closest('form').attr('action');
            url = url.replace(':kd_id', $id);
            $(this).closest('form').ajaxSubmit({
                url: url,
                success: function () {
                    $mainBtn.css('display', 'none');
                    $mainBtn.parent().children("button:nth-of-type(1)").css('display', 'inline');
                    $mainBtn.closest('tr').find("input").prop("disabled", true);
                    swal("Done !", 'Update Data !', "success");
                },
                error: function () {
                    alert('KD Err');
                }
            });
        });
        $(document).on('click', '.editKdData', function () {
            $(this).css('display', 'none');
            $(this).parent().children("button:nth-of-type(2)").css('display', 'inline');
            var $tr = $(this).closest('tr');
            $tr.closest('table').find('input').prop("disabled", true);
            $tr.find("span").css('display', 'none');
            $tr.find("input").prop("disabled", false).css('display', 'inline');
        });



        var prObj;
        $('.kdProgModal').on('hidden.bs.modal', function () {
            prObj.text('Load Print');
        });

        var prefixFrKdPrint;
        function previewKDPrgrm(orderId, kdId, prifix) {
            var laravelUrl = '{{ route("knitDyingProg.show", ":orderId") }}';
            laravelUrl = laravelUrl.replace(':orderId', orderId);
            $.ajax({
                url: laravelUrl,
                success: function (data) {
                    $(".kdProgModal").modal();
                    document.getElementById("pageAppndFrmKD").innerHTML = data;
                    $(".control-sidebar-bg").css('display', 'none');

                    $("#kdTblForJs").ready(function () {
                        prefixFrKdPrint = prifix;
                        $('prefix').html(prifix);
                    });
                },
                error: function () {
                    swal("Error", "Data not registered", "error");
                }
            });
        }


        var countP=0;
        $(".printKDprg").click(function () {
            swal({
                imageUrl: "{{ asset('') }}assets/img/ring-alt.svg",
                title: 'Processing...',
                html: true,
                customClass: 'swal-wide',
                showConfirmButton: false
            });
            countP++;

            prObj = $(this);

            var element = $("#printKDprg"); // global variable

            html2canvas(element, {
                letterRendering: true,
                onrendered: function (canvas) {
                    var canvasImg = canvas.toDataURL("image/jpg");
                    $('#previewImage').html('<img src="' + canvasImg + '" alt="">');

                    var printIntT = setInterval(function(){

                        if ($("#previewImage")[0].innerHTML != '') {
                            prObj.text('Print Now');
                            html2canvas(element, {
                                letterRendering: true,
                                onrendered: function (canvas) {
                                    var canvasImg = canvas.toDataURL("image/jpg");
                                    //console.log(canvasImg);
                                    $('#previewImage').html('<img src="' + canvasImg + '" alt="">');
                                    var alert = document.querySelector(".swal-wide"),
                                        okButton = alert.getElementsByTagName("button")[1];
                                    $(okButton).trigger("click");
                                    $("#previewImage").printElement({pageTitle: prefixFrKdPrint, printMode:'hidden'});
                                    $("#previewImage")[0].innerHTML = '';
                                }
                            });

                            clearInterval(printIntT);
                            //prObj.text('Load Print');
                            //clearInterval(printInt);
                        }
                    }, 300);
                }
            });

            /*var printInt = setInterval(function(){
                if ($("#previewImage")[0].innerHTML != '') {
                    if (countP == 2) {
                        $("#previewImage").printElement({pageTitle: prefixFrKdPrint, printMode:'hidden'});
                        $("#previewImage")[0].innerHTML = '';
                        countP = 0;
                    }
                }
            }, 300);*/
        });

        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                console.log('onbeforeprint equivalent');
            } else {
                console.log('onafterprint equivalent');
            }
        });

        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                ,
                template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function (s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                }
                , format = function (s, c) {
                    return s.replace(/{(\w+)}/g, function (m, p) {
                        return c[p];
                    })
                };
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                window.location.href = uri + base64(format(template, ctx))
            }
        })();

        $(document).ready(function () {
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
                $('.kd').removeClass('kd').addClass('tempClass');
                tableToExcel('shpmntTable', 'W3C Example Table');
                $("#shpmntTable").append(ShpmntHead);
                $('.tempClass').removeClass('tempClass').addClass('kd');
            });

            /*$("#tblToexcel").click(function () {
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
             filename: "KD_OrderWise_" + today,
             fileext: ".xls"
             });
             $("#shpmntTable").append(ShpmntHead);
             });*/

            $(".print").click(function () {
                //console.log($(".kd").css());

                var ShpmntHead = $("#ShpmntHead").detach();
                $("#hiddenTHead").removeAttr("style");
                var divToPrint = document.getElementById("table-scrollable");
                newWin = window.open("");
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
                $(selector).autocomplete({
                    source: function (request, response) {
                        var DTO = {"terms": request.term};
                        var getNameURL = "{{ url('knitAndDyeing/autoCompltSrch')}}/" + field + "/" + DTO.terms;
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
                                } else {
                                    response(data);
                                }
                            },
                            error: function () {
                                $.ajax({
                                    url: '{{ url('knitAndDyeing/listTable') }}',
                                    cache: false,
                                    global: false,
                                    success: function (data) {
                                        $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                                        $("#shpmntTable").append(data);
                                    }
                                });
                            }
                        });
                    },
                    select: function (event, ui) {
                        $("#shipStsFrKnitDyeing").val('Select...');
                        var name = ui.item.value;

                        var from = $("#from").val();
                        var to = $("#to").val();
                        var Date1 = from.split('-');
                        var Date2 = to.split('-');
                        var minDate = new Date(Date1[2] + '/' + Date1[1] + '/' + Date1[0]);
                        var maxDate = new Date(Date2[2] + '/' + Date2[1] + '/' + Date2[0]);
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

                        if (name.indexOf('-') > -1) {
                            name = name.replace("-", "******");
                        }
                        if (name.indexOf('/') > -1) {
                            name = name.replace("/", "-");
                        }
                        var getActionURL = "{{ url('knitAndDyeing/autoCompltRslt')}}/" + field + "/" + name + "/" + from + "/" + to;
                        $.ajax({
                            cache: false,
                            //global: false,
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
            var minDate = new Date(Date1[2] + '/' + Date1[1] + '/' + Date1[0]);
            var maxDate = new Date(Date2[2] + '/' + Date2[1] + '/' + Date2[0]);
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
            var shipSts = $("#shipStsFrKnitDyeing").val();
            if (shipSts == 'Select...') {
                shipSts = '-';
            }
            //alert(shipSts);
            if (byrNmeSrch == '') {
                byrNmeSrch = '-';
            } else {
                $("#buyerNmShow").html('Buyer: ' + byrNmeSrch);
            }
            var url = "{{ url('knitAndDyeing/searchDateRange/:from/:to/:byrNmeSrch/:shipSts')}}";
            url = url.replace(':from/:to/:byrNmeSrch/:shipSts', from + '/' + to + '/' + byrNmeSrch + '/' + shipSts);
            //alert(url);
            $.ajax({
                url: url,
                cache: false,
                //global: false,
                success: function (data) {
                    //alert(data);
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
                },
                error: function () {
                    alert('Error');
                }
            });
        });

        $(function () {
            $(".dPick").datepicker({
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

        function editOrderInfo(order_number) {
            var url = '{{ route('Order.show', ':order_number||EditReqFrmList') }}';
            url = url.replace(':order_number', order_number);
            //alert(url);
            $.ajax({
                url: url,
                success: function (data) {
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

        $('#printMe').click(function () {
            //alert('dsda');
            //console.log($("#printout").printArea());
            //$("#printout").printArea();
        });

        function del(id, name) {
            $('#deleteModal').appendTo("body").modal('show');
            $('#info').html('Are you sure ! You want to delete <strong>' + name + '</strong> ??');
            $("#delete").click(function () {
                var url = "{{ url('/delete_order:id') }}";
                idRep = '/' + id;
                url = url.replace(':id', idRep);

                $.ajax({
                    method: "get", url: url, success: function (result) {
                        //alert(result);
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#deleteModal').modal('hide');
                        $('#row' + id).closest('tr').remove();
                        $('#load').html("<p class='alert alert-success text-center'><strong>" + name + "</strong> Successfully Deleted</p>");
                    }
                });

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