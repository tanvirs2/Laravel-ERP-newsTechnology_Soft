@extends('layouts.app')
@section('content')
<style>
    .modal {
        text-align: center;
        padding: 0!important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="page-content" style="min-height:602px">
                    <!-- BEGIN PAGE HEADER-->
                    <h3 class="page-title">
                        <span class="fa fa-plus"></span>Knit Dyeing Entry
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="/hrm_demo/admin/employees">Order</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">New Order</a>
                            </li>
                        </ul>
                    </div>
                    @if (Session::has('flash_msg'))
                        <span class="help-block">
                            <strong style="color: red; font-size: 1.6em">{{ Session::get('flash_msg') }}</strong>
                        </span>
                    @endif
                    <!-- END PAGE HEADER-->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="clearfix">
                    </div>
                    <form id="prCreate" action="@if(isset($order->Id)) {{ route('knitDying.store') }} @else {{ route('knitDying.update', $id) }}@endif" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @if(isset($order->Id)) {{ csrf_field() }} @else {{ csrf_field() }} | {{ method_field('PUT') }} @endif
                        <div class="row ">
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet box purple-wisteria">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i>Knit Dyeing Details
                                        </div>
                                        <span id="findOrUp" style="border-radius: 0px 0px 5px 5px; border: 1px solid white; border-top: 0px" class="pull-right btn btn-primary" data-toggle="tooltip" title="Single click and Double click">
                                            .
                                        </span>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="form-body">
                                            <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="KD[order_id]" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-9">

                                                            <input type="text" class="dPick form-control" name="KD[date]" placeholder="" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Color <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[color]" @if(isset($line)){ value="{{ $line }}" } @endif placeholder="" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Garments QTY <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[grmntQTY]" @if(isset($prCut)){ value="{{ $prCut }}" } @endif placeholder="" >
                                                            <input type="hidden" class="form-control subConNm" name="" >

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">ColorWiseYarn Rqrd</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[colorYarnRqrd]" @if(isset($prSwIn)){ value="{{ $prSwIn }}" } @endif placeholder="">
                                                            <input type="hidden" class="form-control subConNm" name="" >

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">YarnRcv</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[yarnIss]" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">KnitQTY</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[kntQty]" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">DyeingQTY</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[dyeingQty]" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">FinishFabRqrd</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[fnshFabRqrd]" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">FinishFabRcv</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KD[fnshFabRcv]" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group modal">
                                                        <label class="col-md-3 control-label">Yarn issue</label>
                                                        <div class="col-md-8" style="border: 1px solid; margin: 5px; padding: 5px">
                                                            <span id="yarnIssue">
                                                                <input type="text" class="form-control" name="" @if(isset($prSwIn)){ value="{{ $prSwIn }}" } @endif placeholder="">
                                                            <br>
                                                            </span>

                                                            <button class="btn btn-primary" id="addBtn"> + </button><input type="hidden" class="form-control subConNm" name="" >

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <button style="display: none" id="formModify" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn btn-danger">
                                                                <i class="fa fa-pencil-square-o"></i>	Modify CostSheet
                                                            </button>
                                                            <button id="" type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save Knit Dyeing Inf
                                                            </button>
                                                        </div>
                                                    </div>

                                                </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.box-body -->
            <!-- Modal Start -->

            <!-- Modal Start -->
            <div id="aj_test" class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $("#yarnIssue"); //Fields wrapper
        var add_button      = $("#addBtn"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input class="form-control" type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
<script src="{{ asset('') }}assets/js/productJS/prJs.js"></script>
@endsection

