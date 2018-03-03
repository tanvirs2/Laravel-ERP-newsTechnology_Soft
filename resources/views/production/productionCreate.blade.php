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
<?php
function arraySumFromKey($arr, $key) //
{
    $tmp = array();
    $result = array();
    foreach ($arr as $childArr) {
        if (!in_array($childArr[$key], $tmp)) {
            array_push($tmp, $childArr[$key]);
            array_push($result, $childArr);
        }
    }
    $arrUnqByKyData = $result;
    foreach ($arrUnqByKyData as $sngl) {
        $cnt = 0;
        foreach ($arr as $item) {
            if ($sngl[$key] == $item[$key]) {
                $cnt++;
                if ($cnt > 1) {
                    $dupl[] = $item; //return only duplicate without main array
                }
            }
        }
    }
    if (isset($dupl)) {
        foreach ($dupl as $protiDupli) {
            foreach ($arrUnqByKyData as $k => $protiArrUnqByKyData) {
                if ($protiDupli[$key] == $protiArrUnqByKyData[$key]) {
                    $arrUnqByKyData[$k]['fabQty'] += $protiDupli['fabQty'];
                }
            }
        }
    }
    return $arrUnqByKyData;
}
//end function

$kdPrgrmData = App\KnitDyeingProgram::where('order_id', $order->Id)->first(); //orderIDfromDB $order->Id

if ($kdPrgrmData) {
    $kkk = [];
    foreach ($kdPrgrmData->kdColrSizeFabQty as $qty){
        if ($qty->KDprgrmId) {
            $kkk[] = [
                'colorID'       => $qty->colorID,
                'ordId'         => $order->Id,
                'KDprgrmIds'    => $qty->KDprgrmId,
                'color_name'    => $qty->color_name,
                'fabQty'        => $qty->fabQty,
            ];
        }
    }

    //dd(arraySumFromKey($kkk, 'colorID'));

    //"colorID" => "22"
    //"ordId" => 144
    //"KDprgrmIds" => "8"
    //"color_name" => null
    //"fabQty" => 5213
}

?>
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
                        <span class="fa fa-plus"></span>Production Entry
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

                    <div class="row ">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet box purple-wisteria">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Production Details
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#Cutting">Cutting</a></li>
                                            <li><a data-toggle="tab" href="#SwingIn">SwingIn</a></li>
                                            <li><a data-toggle="tab" href="#SwingOut">SwingOut</a></li>
                                            <li><a data-toggle="tab" href="#Iron">Iron</a></li>
                                            <li><a data-toggle="tab" href="#Poly">Poly</a></li>
                                            <li><a data-toggle="tab" href="#Carton">Carton</a></li>
                                        </ul>

                                        <div class="tab-content form-horizontal">
                                            <div id="Cutting" class="tab-pane fade in active">
                                                <h3>Cutting</h3>
                                                <div class="form-body">
                                                <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                    @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Line <span class="required">* </span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="line" @if(isset($line)){ value="{{ $line }}" } @endif placeholder="Line" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    @if($kdPrgrmData)
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Color Select <span class="required">* </span></label>
                                                        <div class="col-md-6">
                                                                @foreach(arraySumFromKey($kkk, 'colorID') as $kdQty)
                                                                    <span class="btn btn-default">
                                                                        {{ App\Color::where('id', $kdQty['colorID'])->first()->color_name }} |
                                                                        {{ $kdQty['fabQty'] }}
                                                                    </span>
                                                                    <span class="btn btn-default">
                                                                        <input type="radio" name="optradio">
                                                                    </span>
                                                                    <br>
                                                                    <br>
                                                                @endforeach
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Cutting <span class="required">* </span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="prCut" @if(isset($prCut)){ value="{{ $prCut }}" } @endif placeholder="Cutting" >

                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-6">

                                                            <button id="" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->

                                                </span>
                                                </div>
                                            </div>
                                            <div id="SwingIn" class="tab-pane fade">
                                                <h3>SwingIn</h3>
                                                <div class="form-body">
                                                <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                    @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Line <span class="required">* </span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="line" @if(isset($line)){ value="{{ $line }}" } @endif placeholder="Line" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Swing In</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="prSwIn" @if(isset($prSwIn)){ value="{{ $prSwIn }}" } @endif placeholder="Swing In">

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-6">

                                                            <button id="" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                  <div class="modal fade" id="subCon" role="dialog">
                                                    <div class="modal-dialog modal-sm">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Sub Contractor Name</h4>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <input type="text" id="subConNm">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="subConNmSv">Save</button>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                                </span>
                                                </div>
                                            </div>
                                            <div id="SwingOut" class="tab-pane fade">
                                                <h3>SwingOut</h3>
                                                <div class="form-body">
                                                <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                    @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-6">

                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Line <span class="required">* </span></label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="line" @if(isset($line)){ value="{{ $line }}" } @endif placeholder="Line" readonly="readonly">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Swing Out</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="prSwOut" @if(isset($prSwOut)){ value="{{ $prSwOut }}" } @endif placeholder="Swing Out" >

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-6">

                                                            <button id="" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                  <div class="modal fade" id="subCon" role="dialog">
                                                    <div class="modal-dialog modal-sm">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Sub Contractor Name</h4>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <input type="text" id="subConNm">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="subConNmSv">Save</button>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                                </span>
                                                </div>

                                            </div>
                                            <div id="Iron" class="tab-pane fade">
                                                <h3>Iron</h3>
                                                <div class="form-body">
                                                <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                    @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-6">

                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Iron</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="prIron" @if(isset($prIron)){ value="{{ $prIron }}" } @endif placeholder="Iron" >

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-6">
                                                            <button id="" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                  <div class="modal fade" id="subCon" role="dialog">
                                                    <div class="modal-dialog modal-sm">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Sub Contractor Name</h4>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <input type="text" id="subConNm">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="subConNmSv">Save</button>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                                </span>
                                                </div>
                                            </div>
                                            <div id="Poly" class="tab-pane fade">
                                                <h3>Poly</h3>
                                                <div class="form-body">
                                                <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                    @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-6">

                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Poly</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="prCarton" @if(isset($prCarton)){ value="{{ $prCarton }}" } @endif placeholder="Poly" >
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-6">

                                                            <button id="" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                  <div class="modal fade" id="subCon" role="dialog">
                                                    <div class="modal-dialog modal-sm">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Sub Contractor Name</h4>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <input type="text" id="subConNm">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="subConNmSv">Save</button>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                                </span>
                                                </div>

                                            </div>
                                            <div id="Carton" class="tab-pane fade">
                                                <h3>Carton</h3>
                                                <div class="form-body">
                                                <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                    @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-6">

                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Carton</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="prCarton" @if(isset($prCarton)){ value="{{ $prCarton }}" } @endif placeholder="Poly" >
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-6">

                                                            <button id="" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->
                                                  <div class="modal fade" id="subCon" role="dialog">
                                                    <div class="modal-dialog modal-sm">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Sub Contractor Name</h4>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <input type="text" id="subConNm">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="subConNmSv">Save</button>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                                </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form id="prCreate" action="@if(isset($order->Id)) {{ url('production/storePrData') }} @else {{ route('production.update', $id) }}@endif" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @if(isset($order->Id)) {{ csrf_field() }} @else {{ csrf_field() }} | {{ method_field('PUT') }} @endif
                        <div class="row ">
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet box purple-wisteria">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i>Production Details
                                        </div>
                                        <span id="findOrUp" style="border-radius: 0px 0px 5px 5px; border: 1px solid white; border-top: 0px" class="pull-right btn btn-primary" data-toggle="tooltip" title="Single click and Double click">
                                            .
                                        </span>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="form-body">
                                            <span id="orderDetails">
                                                <input type="hidden" class="form-control" name="order_id" @if(isset($order->Id)){ value="{{ $order->Id }}" } @endif >
                                                @if(isset($id))<input type="hidden" class="form-control" name="prId" value="{{ $id }}">@endif

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Date <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="dPick form-control" name="prDate" placeholder="Date" @if(isset($prDate)){ value="{{ $prDate }}" } @endif autocomplete="off" >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Line <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="line" @if(isset($line)){ value="{{ $line }}" } @endif placeholder="Line" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Cutting <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prCut" @if(isset($prCut)){ value="{{ $prCut }}" } @endif placeholder="Cutting" >
                                                            <input type="hidden" class="form-control subConNm"  >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio"  checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio" > Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Swing In</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prSwIn" @if(isset($prSwIn)){ value="{{ $prSwIn }}" } @endif placeholder="Swing In">
                                                            <input type="hidden" class="form-control subConNm"  >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Swing Out</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prSwOut" @if(isset($prSwOut)){ value="{{ $prSwOut }}" } @endif placeholder="Swing Out" >
                                                            <input type="hidden" class="form-control subConNm" >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Iron</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prIron" @if(isset($prIron)){ value="{{ $prIron }}" } @endif placeholder="Iron" >
                                                            <input type="hidden" class="form-control subConNm" >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Poly</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="prCarton" @if(isset($prCarton)){ value="{{ $prCarton }}" } @endif placeholder="" >
                                                            <input type="hidden" class="form-control subConNm" >
                                                            <button type="button" class=""><i class="fa fa-home"></i> <label><input type="radio" checked="checked"> In House</label> </button>
                                                            <button type="button" class="subCon"><i class="fa fa-industry"></i> <label><input type="radio"> Sub Contractor</label> </button>
                                                            <span style="font-size: 1.5em; color: #2980b9"></span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-6">

                                                            <button id="" type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	SaveProductionInf
                                                            </button>
                                                        </div>
                                                    </div>

                                                <!-- Modal -->
                                                  <div class="modal fade" id="subCon" role="dialog">
                                                    <div class="modal-dialog modal-sm">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Sub Contractor Name</h4>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <input type="text" id="subConNm">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="subConNmSv">Save</button>
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>

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
                @include("modal.line")
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
<script src="{{ asset('') }}assets/js/productJS/prJs.js"></script>
@endsection

