@extends('layouts.app')

@section('content')
    <script src="{{ asset('') }}assets/jQuery/jquery.floatThead.min.js"></script>
<style>
    #shpmntTable{
        table-layout:fixed;
        max-width:1100px;
        min-width:1100px;
    }
    #shpmntTable th, #shpmntTable td{
        width:100px
    }
    .KDcl1 {
        color: #ff0000;
    }
</style>
<div class="content-wrapper">
@include('tools.scrollBtn.scrollBtn')
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content" id="wholeSection">

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
                                        <i class="fa fa-street-view"></i>Knitting & Dyeing
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
                                                            <select style="width: 7em;" name="sYear" class="form-control">
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018" selected>2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                            </select>
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
                                                <br>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="">

                                        <span id="buyerNmShow" style="font-size: 1.1em; font-weight: bold; color: #457ac2;"></span>
                                        <span class="pull-right form-inline">
                                                <label>
                                                    <input style="width: 6em" id="ShpmReloadBtnN" value="Reload" class="btn btn-warning" readonly>
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
                                                        <input style="width: 75px; color: black; font-size: 0.9em" id="byrNmeSrch" type="text">

                                                        <select style="display: none; width: 80px; color: black" id="opFrmJs">
                                                            <option></option>
                                                        </select>
                                                    </th>
                                                    <th class="text-center sorting" tabindex="0"
                                                        aria-controls="sample_employees" rowspan="1" colspan="1"
                                                        style="width: 82px;" aria-label="Order number : activate to sort column ascending">
                                                        OrderNo
                                                        <br>
                                                        <input style="width: 60px; color: black; font-size: 0.9em" id="ordNumSrch" type="text">
                                                        <select style="display: none; width: 80px; color: black" id="orderNo">
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
                                                    <th class="text-center sorting_disabled" rowspan="1" colspan="1" style="" aria-label="Action">
                                                        OrderStatus

                                                        <select style="color: black; width: 6em" class="" id="shipStsFrPreKnitDyeing" >
                                                            <option>Select...</option>
                                                            <option>Running</option>
                                                            <option>Partial Shipment</option>
                                                            <option>ShipOut</option>
                                                        </select>
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
                                                </tr>
                                                </thead>
                                                @include("knitDyeing.preKnitDyeingTable")
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->

                        </div>
                    </div>
                    <div class="modal fade" id="kdEntryDiv" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="">

                                <div style="" class="modal-body">

                                    <div class="portlet box purple-wisteria">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-calendar"></i>Knit Dyeing Details
                                            </div>
                                            <br>
                                            <button id="kdPEntry" type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"></button>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Buyer Name</th>
                                                    <th>Order No</th>
                                                    <th>Style</th>
                                                    <th>Order Qty</th>
                                                    <th>Ship Date</th>
                                                </tr>
                                                <tr>
                                                    <td class="modalBuyerName"></td>
                                                    <td class="modalOrderNo"></td>
                                                    <td class="modalStyleDesc"></td>
                                                    <td class="modalOrderQty"></td>
                                                    <td class="modalShipDate"></td>
                                                </tr>
                                            </table>
                                            <hr>
                                    <form action="{{ url('knitAndDyeing/storeKdProgram') }}" method="POST" class="" >
                                        {{ csrf_field() }}
                                        <div class="row ">
                                            <div class="">
                                            <div class="form-body">
                                            <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="KD[order_id]" value="">
                                                @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-9">

                                                            <input type="text" class="form-control" name="KD[date]" readonly autocomplete="off" value="{{ date('Y-m-d') }}">
                                                            <p id="" class="text-center text-danger"><b></b><br></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">BODY/SLV FABRICATION<span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[bodyOrSlvDesc]" placeholder="" >
                                                            <input type="hidden" class="form-control subConNm" name="" >
                                                            <p id="" class="text-center text-danger"><b></b><br></p>

                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">INSERTER/RIB FABRICATION<span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[inserterRibDesc]" placeholder="" >
                                                            <input type="hidden" class="form-control subConNm" name="" >
                                                            <p id="" class="text-center text-danger"><b></b> <br> </p>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">NeckTape<span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[neckTapeDesc]" placeholder="" >
                                                            <input type="hidden" class="form-control subConNm" name="" >
                                                            <p id="" class="text-center text-danger"><b></b></p>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">YrnRqrdSummry<span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <table id="yrnRqrdSummeryTbl" class="table table-bordered">
                                                                <tbody>
                                                                <tr>
                                                                    <th>
                                                                        <span class="btn btn-sm btn-default" style="width: 2.9em; padding: 3px 0px 3px 3px; margin-right: 1px;" onclick="javascript:appendRowYrnTbl()">
                                                                            <b>+</b>
                                                                        </span>
                                                                    </th>
                                                                    <th>YrnDesc</th>
                                                                    <th>Qty</th>
                                                                    <th>Comments</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="text" size="8" name="kdYrn[yrnDesc][]"></td>
                                                                    <td><input type="text" size="6" name="kdYrn[yrnQty][]"></td>
                                                                    <td><input type="text" size="6" name="kdYrn[cmnt][]"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <p id="" class="text-center text-danger"><b></b></p>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Color&SizeCons <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <span id="colorSizeInputModal" style="width: 10em" class="btn btn-md btn-default">Entry</span>
                                                            <p id="" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <button id="SaveKnitDyeingInf" style="display: none" type="button" class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save Knit Dyeing Inf
                                                            </button>
                                                        </div>
                                                    </div>

                                                </span>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                    <div id="" class="modal fade colorSizeModal" tabindex="-1" data-backdrop="static"
                         data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>
                                    <h4 class="modal-title">Fabric Details</h4>
                                    <a target="_blank" href="{{ route('settings.create') }}" class="btn btn-sm btn-primary">Add Color</a>
                                    <a target="_blank" href="{{ route('size.create') }}" class="btn btn-sm btn-primary">Add Size</a>
                                    <a target="_blank" href="{{ route('settings.index') }}" class="btn btn-sm btn-primary">Library</a>
                                </div>
                                <style>
                                    form .modal-body table td input {
                                        padding: 0;
                                    }
                                    form .modal-body table td:first-child {
                                        width: 110px;
                                        overflow: hidden;
                                        display: inline-block;
                                        white-space: nowrap;
                                    }
                                    form .modal-body table td:first-child .btn-default {
                                        padding: 3px 3px 3px 3px; 
                                        margin-right: 1px;
                                    }
                                    form .modal-body table .nmFldNameCls {
                                        display: none;
                                    }
                                </style>
                                <form action="{{ url('knitAndDyeing/kdProgramColrSizeCnsmp') }}" method="post">
                                    {{ csrf_field() }}
                                <div style="overflow: auto;" class="modal-body" id="info">
                                    <table class="table table-bordered" id="dynamiTable">
                                        <tbody>
                                        <tr>
                                            <td class="">
                                                <span class="btn btn-sm btn-default" style="width: 7em; padding: 3px 0px 3px 1px; margin-right: 1px;">
                                                <span class="btn btn-sm btn-default" style="width: 2.9em; padding: 3px 0px 3px 3px; margin-right: 1px;" onclick="javascript:appendRow()">SZ🠟</span>
                                                <span class="btn btn-sm btn-default appendColumn" style="width: 2.9em; padding: 3px 0px 3px 3px; margin-right: 1px;" onclick="javascript:appendColumn()">CL🠞</span>
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="table table-bordered childTable">
                                        <tr>
                                            <td style="" class="">
                                                <span class="nmFldNameCls">bodyOrSlvFini</span>
                                                <span class="btn btn-sm btn-default" >Body/SlvFini</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table table-bordered childTable">
                                        <tr>
                                            <td style="" class="">
                                                <span class="nmFldNameCls">bodyOrSlvFini_ProcessLs</span>
                                                <span class="btn btn-sm btn-default" >BdySlvPrcsLs(%)</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>

                                    <hr>
                                    <table class="table table-bordered childTable">
                                        <tr>
                                            <td style="" class="">
                                                <span class="nmFldNameCls">ribFinish</span>
                                                <span class="btn btn-sm btn-default" >Rib Finish</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table table-bordered childTable">
                                        <tr>
                                            <td style="" class="">
                                                <span class="nmFldNameCls">ribFinish_ProcessLs</span>
                                                <span class="btn btn-sm btn-default" >RibFnPrcsLs(%)</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>

                                    <hr>
                                    <table class="table table-bordered childTable">
                                        <tr>
                                            <td style="" class="">
                                                <span class="nmFldNameCls">neckTapeFini</span>
                                                <span class="btn btn-sm btn-default" >NeckTapeFini</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table table-bordered childTable">
                                        <tr>
                                            <td style="" class="">
                                                <span class="nmFldNameCls">neckTapeFini_ProcessLs</span>
                                                <span class="btn btn-sm btn-default" >NkTpPrcsLs(%)</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>

                                </div>

                                </form>

                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="button" data-dismiss="modal" class="btn red" id="saveFabrcDtlsFrSession">
                                        <i class=""></i> Save
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
                                <div class="modal-body">
                                    <table class="table">
                                        <tr>
                                            <td class="text-center"><h2>{{ $factNamePrefix->factoryName }}</h2></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{ $factNamePrefix->factDesc }}</td>
                                        </tr>
                                    </table>
                                    <div class="col-md-6 panel panel-default">
                                        <table class="table table-striped">
                                        <tr>
                                            <td>Buyer Name</td>
                                            <td class="modalBuyerName"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Style</td>
                                            <td class="modalStyleDesc"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Order No</td>
                                            <td class="modalOrderNo"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Order Qty</td>
                                            <td class="modalOrderQty"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Ship Date</td>
                                            <td class="modalShipDate"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </table>
                                    </div>
                                    <div id="pageAppndFrmKD" class="">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    @include('orderInformation.color')
    @include('orderInformation.size')
    <style>
        tr:first-child .colorInput, td:first-child .sizeInput {
            background: #1c68b8;
            color: #ffffff;
            font-size: 1em;
        }
        td:first-child .sizeInput {
            background: #c0392b;
        }
    </style>
<script>
    function previewKDPrgrm(orderId) {
        var laravelUrl = '{{ route("knitDyingProg.show", ":orderId") }}';
        laravelUrl = laravelUrl.replace(':orderId', orderId);
        $.ajax({
            url: laravelUrl,
            success: function (data) {
                document.getElementById("pageAppndFrmKD").innerHTML = data;
                //$("#pageAppndFrmKD").append(data);
                $(".kdProgModal").modal();
            },
            error: function () {
                swal("Error", "Data not registered", "error");
            }
        });
    }

    $("#saveFabrcDtlsFrSession").click(function () {
        var inputVal = 0;
        var inptfrclsz = true;
        $("[inptfrclsz='true']").each(function () {
            inputVal += parseInt($(this).children( "input" ).val());
        });

        var inptfrclszArr = [];

        $("[inptfrclsz='false']").each(function () {
            inptfrclszArr.push($(this).children( "input" ).val());
        });

        $("[inptfrclsz='false']").each(function () {
            if (inptfrclszArr.length !== new Set(inptfrclszArr).size) {
                inptfrclsz = false;
            }
            if ($(this).children( "input" ).val() == '') {
                inptfrclsz = false;
            }
        });

        //ordQtyFromFun = true;
        //if (ordQtyFromFun) { //for pantex
        //if (ordQtyFromFun == inptfrclsz) {
        if (parseInt(ordQtyFromFun) == parseInt(inputVal) && inptfrclsz) { // for all
            $(this).closest('.modal-content').find('form').ajaxSubmit({
                success: function () {
                    $("#SaveKnitDyeingInf").show();
                }
            });
        } else {
            swal("Something Error !", "Order Blank-input/Quantity not match/Same Field !", "error");
            return false;
        }
    });

    $("#SaveKnitDyeingInf").click(function () {
        $('[action="{{ url('knitAndDyeing/storeKdProgram') }}"]').ajaxSubmit({
            success: function (data) {
                $("#SaveKnitDyeingInf").hide();
                $('#kdPEntry').trigger('click');
                swal("Done !", data, "success");
            }
        });
    });

    var colorName;
    var colorId;
    var colorObj;

    var sizeName;
    var sizeId;
    var sizeObj;

    function js_set_value(id, color) {
        colorName = color;
        colorId = id;
        $("#colorField").val(color);
        $("#colorFieldId").val(id);
    }

    function js_set_size(id, size) {
        sizeName = size;
        sizeId = id;
        $("#colorField").val(color);
        $("#colorFieldId").val(id);
    }


    $("#colorSizeInputModal").click(function () {
        $(".colorSizeModal").modal();
    });

    $(document).on("click", "tr:first-child .colorInput", function () {
        $(".colorSelectModal").modal();
        colorObj = $(this);
        $.ajax({
            url: colorObj.attr('href'),
            global: false,
            success: function (data) {
                $(".colorSelectModal").find(".modal-body").html(data);
            }
        });
    });

    $(document).on("click", "td:first-child .sizeInput", function () {
        $(".sizeSelectModal").modal();
        sizeObj = $(this);
        if (sizeObj.css('background') == 'rgb(192, 57, 43) none repeat scroll 0% 0% / auto padding-box border-box') {
            sizeObj.parent().attr('inptfrclsz', 'false');
        }
        $.ajax({
            url: sizeObj.attr('href'),
            global: false,
            success: function (data) {
                $(".sizeSelectModal").find(".modal-body").html(data);
            }
        });
    });
    $('.colorSelectModal').on('hidden.bs.modal', function () {
        colorObj.val(colorName);
        var inVal = colorObj.val();
        var isInpt = colorObj.parent().find("[type='hidden']");
        if(isInpt.length == 0){
            if (inVal.length > 0) {
                colorObj.parent().append("<input type='hidden' name='colorID[]' value='"+colorId+"'>");
            }
        };
        isInpt.val(colorId);
    });
    $('.sizeSelectModal').on('hidden.bs.modal', function () {
        sizeObj.val(sizeName);
        var inVal = sizeObj.val();
        var isInpt = sizeObj.parent().find("[type='hidden']");
        if(isInpt.length == 0){
            if (inVal.length > 0) {
                sizeObj.parent().append("<input type='hidden' name='sizeID[]' value='"+sizeId+"'>");
            }
        };
        isInpt.val(sizeId);
    });

    $(document).on("click", "#dynamiTable input", function () {
        $("#dynamiTable input").not("tr:first-child input, td:first-child input").attr('name', 'fabQty[]');
    });

    // append row to the HTML table
    function appendRow() {
        var tbl = document.getElementById('dynamiTable'), // table reference
            row = tbl.insertRow(tbl.rows.length),      // append table row
            i;
        // insert table cells to the new row
        for (i = 0; i < tbl.rows[0].cells.length; i++) {
            createCell(row.insertCell(i), i, 'sizeInput', '{{ url("kdEnAjxSize") }}');
        }
        $("td:first-child .sizeInput").each(function () {
            if ($(this).css('background') == 'rgb(192, 57, 43) none repeat scroll 0% 0% / auto padding-box border-box') {
                $(this).parent().attr('inptfrclsz', 'false');
            }
        });
    }
    // append row to the HTML table
    function appendRowYrnTbl() {
        var myTbl = document.getElementById("yrnRqrdSummeryTbl").getElementsByTagName('tbody')[0];
        var myrows = myTbl.getElementsByTagName('tr');
        var lastRow = myrows[myrows.length - 1].cloneNode(true);
        for (var i=0; i<lastRow.getElementsByTagName('input').length; i++) {
            lastRow.getElementsByTagName('input')[i].value = '';
        }
        myTbl.appendChild(lastRow);

        var myCell = lastRow.getElementsByTagName('td');
        var fc = parseInt(myCell[0].innerHTML);
        myCell[0].innerHTML = fc+1;
    }

    // create DIV element and append to the table cell
    function createCell(cell, text, style, route) {
        var div = document.createElement('span'), // create DIV element
            txt = document.createTextNode(text); // create text node

        var x = document.createElement("INPUT");
        x.setAttribute("type", "text");
        x.setAttribute("size", "6");
        x.setAttribute("class", style);
        x.setAttribute("href", route);

        div.appendChild(x);                    // append text node to the DIV
        div.setAttribute('class', '');        // set DIV class attribute
        div.setAttribute('inptFrClSz', 'true');    // set DIV class attribute for IE (?!)
        cell.appendChild(div);                   // append DIV to the table cell
    }
    $('.appendColumn').click(function () {
        $('.childTable tr').append($("<td>"));
        $('.childTable tr').each(function () {
            var nmFldName = $(this).find('.nmFldNameCls').text();
            if (nmFldName.length > 0) {
                $(this).children('td:last').append($('<input type="text" name="'+nmFldName+'[]" value="" size="6">'))
            } else {
                $(this).children('td:last').append($('<input type="text" name="" value="" size="6">'))
            }
        });
    });
    // append column to the HTML table
    function appendColumn() {
        var tbl = document.getElementById('dynamiTable'), // table reference
            i;
        // open loop for each row and append cell
        for (i = 0; i < tbl.rows.length; i++) {
            createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'colorInput', '{{ url("kdEnAjxColor") }}');
        }
        $("tr:first-child .colorInput").each(function () {
            if ($(this).css('background') == 'rgb(28, 104, 184) none repeat scroll 0% 0% / auto padding-box border-box') {
                $(this).parent().attr('inptfrclsz', 'false');
            }
        });
    }
    /*************************/
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
                filename: "ShipmentSchedule_" + today,
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
            position: 'absolute'
        });


        function libSearch(selector, field) {
            $(selector).autocomplete({
                source: function (request, response) {
                    var DTO = {"terms" : request.term};
                    var getNameURL = "{{ url('knitAndDyeing/preAutoCompltSrch')}}/" + field + "/" + DTO.terms;
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
                                url: '{{ url('knitAndDyeing/preListTable') }}',
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
                    $("#shipStsFrPreKnitDyeing").val('Select...');
                    var name = ui.item.value;

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

                    if (name.indexOf('-') > -1)
                    {
                        name = name.replace("-", "******");
                    }
                    if (name.indexOf('/') > -1)
                    {
                        name = name.replace("/", "-");
                    }
                    var getActionURL = "{{ url('knitAndDyeing/preAutoCompltRslt')}}/" + field + "/" + name + "/" + from + "/" + to;
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
        var shipSts = $("#shipStsFrPreKnitDyeing").val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        //alert(shipSts);
        if (byrNmeSrch == '') {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        var url = "{{ url('knitAndDyeing/preSearchDateRange/:from/:to/:byrNmeSrch/:shipSts')}}";
        url = url.replace(':from/:to/:byrNmeSrch/:shipSts', from+'/'+to+'/'+byrNmeSrch+'/'+shipSts);
        $.ajax({
            url: url,
            cache: false,
            global: false,
            success: function(data) {
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

    function editOrderInfo(order_number) {
        var url = '{{ route('Order.show', ':order_number||EditReqFrmList') }}';
        url = url.replace(':order_number', order_number);
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

        })

    }


</script>
<script src="{{ asset('') }}assets/orderMangementJS/orderJS.js"></script>
@endsection