<div class="">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="page-content" style="min-height:602px">
                        <!-- BEGIN PAGE HEADER-->
                        <h3 class="page-title">
                            <span class="fa fa-plus"></span>Order Management
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
                        <!-- END PAGE HEADER-->

                        <hr>

                        <div id="drop">Drop an Excel file here to Register sheet data</div>
                        <input type="file" name="xlfile" id="xlf" />

                        <hr>

                        <div class="clearfix">
                        </div>
                        <form id="orderCreate" action="{{ route('Order.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{--<input name="_method" type="hidden" value="PUT">--}}
                            <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" id="order_number" readonly name="order_number">
                            <div class="row ">
                                <div class="col-md-6 col-sm-6">
                                    <div class="portlet box purple-wisteria">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-calendar"></i>Order Details
                                            </div>
                                            <span id="findOrUp" style="border-radius: 0px 0px 5px 5px; border: 1px solid white; border-top: 0px" class="pull-right btn btn-primary" data-toggle="tooltip" title="Single click and Double click">
                                                Copy
                                            </span>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="form-body">
                                                <div id="orderTxtHide" class="form-group">
                                                    <label class="col-md-3 control-label"> <span class="required">* </span></label>
                                                    <div class="col-md-8 input-group">
                                                        <input type="radio" name="cat" value="customer_name">BuyerName
                                                        <input type="radio" name="cat" value="orderID">OrderNum
                                                        <input type="radio" name="cat" value="article_no">StyleNum
                                                        <input type="radio" name="cat" value="style_description">StyleDesc
                                                        <input  id="orderNumberForJs" type="text" class="form-control" placeholder="Search Here" autocomplete="off" @if(isset($order_number)) value="{{ $order_number }}"  @endif >
                                                        <p id="foundTxt" class="text-center text-danger"><b>Not Registered Order No !</b></p>
                                                        <hr>
                                                        <button type="button" id="orderEdit" style="cursor: pointer" class="btn btn-primary">Copy Order</button>
                                                    </div>
                                                    <hr>
                                                </div>


                                                <span id="orderDetails">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-3">Photo</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img id="grmntImgPreview" src="{{ asset('') }}assets/garmentsImage/tShirt.png" alt=""/>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                            </div>
                                                            <div>
        													<span class="btn default btn-file">
        													<span class="fileinput-new">
        													Select image </span>
        													<span class="fileinput-exists">
        													Change </span>
        													 <input type="file" name="garmentImg">
        													</span>
                                                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                                    Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                        <span class="label label-danger">
                                                        NOTE! </span> Image Size must be (872px by 724px)

                                                        </div>
                                                    </div>
                                                </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Customer <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" @if(isset($customer_name)){ value="{{ $customer_name }}" } @endif >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label id="" class="col-md-3 control-label">Order No <span class="required">* </span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="orderID" placeholder="Order Number" autocomplete="off" @if(isset($order_number)){ value="{{ $order_number }}" } @endif >
                                                            <p id="alreadyReg" class="text-center text-danger"><b></b></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Style Number</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="article_no" placeholder=" Style Numbe">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Entry Date</label>
                                                        <div class="col-md-3">
                                                            <div class="input-group input-medium "  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                <input readonly type="text" class="form-control datepicker" name="date_of_entry"  @if(isset($date_of_entry)){ value="{{ $date_of_entry }}" } @endif >
                                                                <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Shipment Date</label>
                                                        <div class="col-md-3">
                                                            <div class="input-group input-medium"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                <input readonly type="text" class="form-control dPick" name="date_of_ship"  value="{{ Input::old('date_of_ship') }}">
                                                                <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Order Quantity</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="order_quantity" placeholder="Order Quantity" value="{{Input::old('order_quantity')}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> Unit Price</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="unit_price" placeholder="Unit Price">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Order Type</label>
                                                        <div class="col-md-9">
                                                            {{ Form::select('order_type', array('Boys' => 'Boys', 'Girl' => 'Girl', 'Men' => 'Men', 'Ladies' => 'Ladies', 'Baby' => 'Baby'),isset($order_type) ,array('class'=>'form-control')) }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Season</label>
                                                        <div class="col-md-9">
                                                            {{ Form::select('season', array('Winter' => 'Winter', 'Summer' => 'Summer', 'Spring' => 'Spring'), Input::old('season'),array('class'=>'form-control')) }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Order Status</label>
                                                        <div class="col-md-9">
                                                            {{ Form::select('order_status', array('Running' => 'Running', 'Partial Shipment' => 'Partial Shipment', 'ShipOut' => 'ShipOut'), Input::old('order_status'),array('class'=>'form-control')) }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Apparel Type</label>
                                                        <div class="col-md-9">
                                                            {{ Form::select('apparel_type', array('Knit' => 'Knit', 'Sweater' => 'Sweater', 'Woven' => 'Woven'), Input::old('apparel_type'),array('class'=>'form-control')) }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Style Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" name="style_description" rows="3">{{Input::old('style_description')}}</textarea>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Fabric Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" name="fabric_description" rows="3">{{Input::old('fabric_description')}}</textarea>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"> SMV</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="smv" placeholder="SMV">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="display: none">
                                                        <label class="col-md-3 control-label"> CM PerDz</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="cmPerDz" placeholder="CM PerDz">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Sales Person</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="sales_person" placeholder="Sales Person">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"></label>
                                                        <div class="col-md-9">
                                                            <button style="display: none" id="formModify" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn btn-danger">
                                                                <i class="fa fa-pencil-square-o"></i>	Modify CostSheet
                                                            </button>
                                                            <button id="saveOrder" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-plus"></i>	Save Order
                                                            </button>
                                                            <button style="display: none;" id="saveEditOrder" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                                <i class="fa fa-pencil-square-o"></i>	Update Order
                                                            </button>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div id="" class="portlet box red-sunglo">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-calendar"></i>Information
                                            </div>

                                        </div>
                                        <div class="portlet-body">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">YarnPrice <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[yrnPrice]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">KnttngPrice <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[kntngPrice]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">DyeingPrice <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[dyngPrice]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">AOP/YD <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[aopPrint]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Accessories <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[accessories]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Test Cost <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[testCost]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Print+Embroidery  <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[print]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">BankCharge <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[bankCharge]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Commission <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[commission]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">FnshFabrcConsump <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[fnshFabrcConsump]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">YrnConsumption <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[yrnConsumption]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> CM PerDz</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="cmPerDz" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Freight Charge <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[freightChrge]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Others <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="budget[others]" placeholder="" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">LC / Sales contract <span class="required"> </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="lcOrSalsePrsn" placeholder="" >
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div id="infoArea" class="portlet box red-sunglo">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-calendar"></i>Information Area
                                            </div>

                                        </div>
                                        <div class="portlet-body">

                                            <div class="form-body">

                                                <a data-toggle="modal" data-target="#myModal" class="btn btn-block btn-social btn-adn">
                                                    <span class="fa fa-home"></span>PO  Information
                                                </a>

                                                <a data-toggle="modal" data-target="#myModalS" class="btn btn-block btn-social btn-bitbucket">
                                                    <span class="fa fa-plus-square-o"></span> Size & Color Wise Breakdown
                                                </a>

                                                {{--<a data-toggle="modal" data-target="#myModalU" class="btn btn-block btn-social btn-dropbox">
                                                    <span class="fa fa-camera "></span> Photo Attachement
                                                </a>--}}

                                                <a data-toggle="modal" data-target="#fabricInfoModal" class="btn btn-block btn-social btn-pinterest">
                                                    <span class="fa fa-opera "></span>Fabric Information
                                                </a>
                                                <a data-toggle="modal" data-target="#sampleInfoModal" class="btn btn-block btn-social btn-foursquare">
                                                    <span class="fa fa-tag"></span>Sample Information
                                                </a>
                                                <a data-toggle="modal" data-target="#lapdipInfoModal" class="btn btn-block btn-social btn-google">
                                                    <span class="fa fa-thumb-tack "></span>Lapdip Information
                                                </a>
                                                <a data-toggle="modal" data-target="#accessoriesInfoModal" class="btn btn-block btn-social btn-instagram">
                                                    <span class="fa fa-shopping-basket"></span>Accessories Information
                                                </a>
                                                <a data-toggle="modal" data-target="#YarnInfoModal" class="btn btn-block btn-social btn-pinterest">
                                                    <span class="fa fa-forumbee"></span>Yarn Information
                                                </a>


                                                <a class="btn btn-block btn-social btn-facebook">
                                                    <span class="fa fa-money "></span>Cost Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-flickr">
                                                    <span class="fa fa-cubes"></span>Kniting/Dying Information
                                                </a>

                                                <a class="btn btn-block btn-social btn-linkedin">
                                                    <span class="fa fa-barcode "></span>Inspection Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-microsoft">
                                                    <span class="fa fa-ship"></span>Shipment Information
                                                </a>

                                                <a class="btn btn-block btn-social btn-reddit">
                                                    <span class="fa fa-columns"></span>Work Order information
                                                </a>

                                                <a class="btn btn-block btn-social btn-odnoklassniki">
                                                    <span class="fa fa-file-archive-o "></span>Document information
                                                </a>

                                                <a class="btn btn-block btn-social btn-openid">
                                                    <span class="fa fa-database"></span>Others information
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix form-horizontal">

                            <div class="clearfix">
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <!-- Modal Start -->
                                                <form id="poData" action="{{ route('po.store') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="po[order_number]">
                                                    @include('orderInformation.po_info')
                                                </form>
                                                {{--Size and Color--}}
                                                <form id="siData" action="{{ route('sizeNcolor.store') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="si[order_number]">
                                                    @include('orderInformation.sizeColorBreakdown')
                                                </form>

                                                {{--fabricInfo--}}
                                                <form id="fabricData" action="{{ route('fabric.store') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="fab[order_number]">
                                                    @include('orderInformation.fabricInfo')
                                                </form>
                                                {{--fabricInfo--}}
                                                <form id="sampleData" action="{{ route('sample.store') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="sample[order_number]">
                                                    @include('orderInformation.sampleInformation')
                                                </form>

                                                {{--labdipInformation--}}
                                                <form id="labdipData" action="{{ route('labdip.store') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="labdip[order_number]">
                                                    @include('orderInformation.labdipInformation')
                                                </form>

                                                {{--accessoriesInformation--}}
                                                <form id="accessData" action="{{ route('access.store') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="accessories[order_number]">
                                                    @include('orderInformation.accessoriesInformation')
                                                </form>

                                                {{--accessoriesInformation--}}
                                                <form id="yarnData" action="{{ route('yarn.store') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="yarn[order_number]">
                                                    @include('orderInformation.yarnInformation')
                                                </form>

                                            @include('orderInformation.photoUpload')

                                            @include('orderInformation.color')
                                            <!-- Modal Start -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>


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

        $("#cmPerDz").keyup(function () {
            $('[name="cmPerDz"]').val($(this).val());
        });

        function readFrmXl(e) {
                var data = e.target.result;

                var workbook = XLSX.read(data, {type: 'binary'});
                var first_sheet_name = workbook.SheetNames[0];

                var worksheet = workbook.Sheets[first_sheet_name];

                fldUndefined = true;

                function valAppend(cell, scope) {
                    var v = typeof worksheet[cell];
                    if (v !== 'undefined') {
                        $(scope).val(worksheet[cell].w);
                        $(scope).attr('readOnly', true);
                        $('input[name="date_of_entry"]').val(todayDate);
                        $("#formModify").css('display', 'inline');
                    } else {
                        $(scope).val('');
                        $(scope).attr('readOnly', false);
                        fldUndefined = false;
                    }
                }
                valAppend('B3', 'input[name="customer_name"]');
                valAppend('C4', 'input[name="orderID"]');
                valAppend('E5', 'input[name="article_no"]');

                valAppend('C7', 'input[name="date_of_ship"]');
                valAppend('B7', 'input[name="order_quantity"]');
                valAppend('B13', 'input[name="unit_price"]');
                valAppend('C12', 'select[name="order_type"]');
                valAppend('C13', 'select[name="season"]');
                valAppend('C14', 'select[name="order_status"]');
                valAppend('C15', 'select[name="apparel_type"]');
                valAppend('E7', 'textarea[name="style_description"]');
                valAppend('C17', 'textarea[name="fabric_description"]');
                valAppend('C18', 'input[name="smv"]');
                valAppend('C19', 'input[name="sales_person"]');

                valAppend('E26', 'input[name="budget[yrnPrice]"]');
                valAppend('E22', 'input[name="budget[kntngPrice]"]');
                //valAppend('C19', 'input[name="budget[dyngPrice]"]');
                //valAppend('C19', 'input[name="budget[aopPrint]"]');
                valAppend('H21', 'input[name="budget[accessories]"]');
                //valAppend('C19', 'input[name="budget[testCost]"]');
                valAppend('H22', 'input[name="budget[print]"]');
                valAppend('H26', 'input[name="budget[bankCharge]"]');
                valAppend('H32', 'input[name="budget[commission]"]');
                valAppend('G18', 'input[name="budget[fnshFabrcConsump]"]');
                valAppend('E18', 'input[name="budget[yrnConsumption]"]');
                valAppend('H25', '#cmPerDz');
                //valAppend('C19', 'input[name="budget[freightChrge]"]');
                //valAppend('C19', 'input[name="budget[others]"]');

                if (fldUndefined) {
                    swal("Done !", 'Data add from Cost sheet', "success");
                }
        }

        var D           = new Date();
        var date        = String("0" + D.getDate()).slice(-2);
        var month       = String("0" + (1 + D.getMonth())).slice(-2);
        var yr          = String(D.getFullYear().toString());
        var todayDate   = yr + "-" +  month  + "-" +  date;

        var fldUndefined;
        var drop = document.getElementById('drop');


        var rABS = true; // true: readAsBinaryString ; false: readAsArrayBuffer
        function handleFile(e) {
            var files = e.target.files, f = files[0];

            var reader = new FileReader();
            reader.onload = function(e) {
                readFrmXl(e)
            };
            if(rABS) reader.readAsBinaryString(f); else reader.readAsArrayBuffer(f);
        }

        (function() {
            var xlf = document.getElementById('xlf');
            if(!xlf.addEventListener) return;
            xlf.addEventListener('change', handleFile, false);
        })();


        function handleDrop(e) {
            e.stopPropagation();
            e.preventDefault();
            var files = e.dataTransfer.files;
            var i,f;
            for (i = 0, f = files[i]; i != files.length; ++i) {
                var reader = new FileReader();
                var name = f.name;
                reader.onload = function(e) {
                    readFrmXl(e)
                };
                reader.readAsBinaryString(f);
            }
        }
        $('input[name="date_of_entry"]').val(todayDate);
        function handleDragover(e) {
            e.stopPropagation();
            e.preventDefault();
            e.dataTransfer.dropEffect = 'copy';
        }
        if(drop.addEventListener) {
            drop.addEventListener('dragenter', handleDragover, false);
            drop.addEventListener('dragover', handleDragover, false);
            drop.addEventListener('drop', handleDrop, false);
        }

        $("#formModify").click(function () {
            $("input").attr('readOnly', false);
            $("select").attr('readOnly', false);
            $("textarea").attr('readOnly', false);
            $('input[name="date_of_entry"]').attr('readOnly', true);
        });

        $( function() {
            $( ".dPick" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy'
            });
        } );

        {{--Hide Field--}}
        $("#orderEdit").hide();
        $("#foundTxt").hide();
        $("#orderTxtHide").hide();
        $("#infoArea, #infoArea a").css('display', 'none');

        function reformatDateString(date) {
            var Date = date.split('-');
            return Date[2] +'/'+ Date[1] +'/'+ Date[0];
        }

        var ordNo = "@if(isset($isData->order_number)){{ $isData->order_number }}@endif";
        if (ordNo != '') {
            $('#orderNumberForJs').val(ordNo);
            var url = '{{ route('Order.show', ':order_number||getData') }}';
            url = url.replace(':order_number', ordNo);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#grmntImgPreview').removeAttr("src").attr('src', "{{ asset('') }}assets/garmentsImage/" + data.isData.garmentImg);
                    //$('[name="garmentImg"]').val(data.isData.garmentImg);
                    $('[name="order_number"]').val(data.isData.order_number).attr('disabled', 'disabled');
                    $('[name="orderID"]').val(data.isData.orderID);
                    $('[name="customer_name"]').val(data.isData.customer_name);
                    $('[name="date_of_entry"]').val(data.isData.date_of_entry);
                    $('[name="order_type"]').val(data.isData.order_type);
                    $('[name="season"]').val(data.isData.season);
                    $('[name="order_status"]').val(data.isData.order_status);
                    $('[name="apparel_type"]').val(data.isData.apparel_type);
                    $('[name="order_quantity"]').val(data.isData.order_quantity);
                    $('[name="unit_price"]').val(data.isData.unit_price);
                    $('[name="article_no"]').val(data.isData.article_no);
                    $('[name="style_description"]').val(data.isData.style_description);
                    $('[name="fabric_description"]').val(data.isData.fabric_description);
                    $('[name="date_of_ship"]').val(reformatDateString(data.isData.date_of_ship));
                    $('[name="cmPerDz"]').val(data.isData.cmPerDz);
                    $('#cmPerDz').val(data.isData.cmPerDz);
                    $('[name="smv"]').val(data.isData.smv);
                    $('[name="sales_person"]').val(data.isData.sales_person);
                    $('[name="lcOrSalsePrsn"]').val(data.isData.lcOrSalsePrsn);
                    if (data.budget) {
                        $('[name="budget[yrnPrice]"]').val(data.budget.yrnPrice);
                        $('[name="budget[yrnConsumption]"]').val(data.budget.yrnConsumption);
                        $('[name="budget[kntngPrice]"]').val(data.budget.kntngPrice);
                        $('[name="budget[dyngPrice]"]').val(data.budget.dyngPrice);
                        $('[name="budget[aopPrint]"]').val(data.budget.aopPrint);
                        $('[name="budget[print]"]').val(data.budget.print);
                        $('[name="budget[accessories]"]').val(data.budget.accessories);
                        $('[name="budget[testCost]"]').val(data.budget.testCost);
                        $('[name="budget[bankCharge]"]').val(data.budget.bankCharge);
                        $('[name="budget[commission]"]').val(data.budget.commission);
                        $('[name="budget[buyingComssn]"]').val(data.budget.buyingComssn);
                        $('[name="budget[fnshFabrcConsump]"]').val(data.budget.fnshFabrcConsump);
                        $('[name="budget[freightChrge]"]').val(data.budget.freightChrge);
                        $('[name="budget[others]"]').val(data.budget.others);
                    }

                    $("#infoArea, #infoArea a").css('display', 'none');

                    $("#saveOrder").remove();
                    $("#saveEditOrder").removeAttr("style");

                    var ordNumFrUpdate = data.isData.order_number;
                    var url = "{{ route('Order.update', ':order_number') }}";
                    url = url.replace(':order_number', ordNumFrUpdate);

                    $("#orderCreate").attr("action", url).prepend('<input name="_method" type="hidden" value="PUT">');
                    //$("#csrfField").remove();
                },
                error: function(){
                    //
                }
            });
        }

        {{--Click Buton to edit Order Info--}}
        $("#findOrUp").click(function () {
            $(this).text('Back');
            $("#orderDetails").hide('linear', function () {
                $('#orderTxtHide').show();
                $('#orderNumberForJs').keyup(function () {
                    var orderVal = $('#orderNumberForJs').val();
                    var catg = $("input[name=cat]:checked").val();
                    var url = '{{ route('Order.show', ':order_number||EditReq') }}';
                    url = url.replace(':order_number', orderVal+ '||' + catg);

                    //alert(url);

                    $.ajax({
                        url: url,
                        cache: false,
                        global: false,     // this makes sure ajaxStart is not triggered
                        success: function(data){
                                //alert(data);
                                $("#orderEdit").show();
                                $("#foundTxt").hide();
                        },
                        error: function(){
                            //alert('sda');
                            $("#infoArea, #infoArea a").css('display', 'none');
                            $('#orderDetails input').val('');
                            $("#orderEdit").hide();
                            $("#foundTxt").show();
                            if (orderVal == '') {
                                $("#foundTxt").hide();
                            }
                        }
                    });
                });
                $("#findOrUp").attr('custom', 'orderCre');
                $("[custom='orderCre']").dblclick(function () {
                    $('[name="order_number"]').attr('disabled', false);
                    $(this).text('Copy');
                    $("input").val('');
                    $("textarea").val('');
                    $('#orderTxtHide').hide();
                    $("#orderDetails").show(500, 'linear');
                    $("#orderCre").attr('id', 'findOrUp');
                });
            });
        });

        $("#orderEdit").click(function () {
            $("#orderDetails").show(300);
            $("#findOrUp").text('Copy');
            var orderVal = $('#orderNumberForJs').val();
            var catg = $("input[name=cat]:checked").val();
            var url = '{{ route('Order.show', ':order_number||getDataForCopy') }}';
            url = url.replace(':order_number', orderVal+ '||' + catg);
            //url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    //alert(data);

                    //console.log(data.isData);
                    if (data.budget) {
                        $('[name="budget[yrnPrice]"]').val(data.budget.yrnPrice);
                        $('[name="budget[yrnConsumption]"]').val(data.budget.yrnConsumption);
                        $('[name="budget[kntngPrice]"]').val(data.budget.kntngPrice);
                        $('[name="budget[dyngPrice]"]').val(data.budget.dyngPrice);
                        $('[name="budget[aopPrint]"]').val(data.budget.aopPrint);
                        $('[name="budget[print]"]').val(data.budget.print);
                        $('[name="budget[accessories]"]').val(data.budget.accessories);
                        $('[name="budget[testCost]"]').val(data.budget.testCost);
                        $('[name="budget[bankCharge]"]').val(data.budget.bankCharge);
                        $('[name="budget[commission]"]').val(data.budget.commission);
                        $('[name="budget[buyingComssn]"]').val(data.budget.buyingComssn);
                        $('[name="budget[fnshFabrcConsump]"]').val(data.budget.fnshFabrcConsump);
                        $('[name="budget[freightChrge]"]').val(data.budget.freightChrge);
                        $('[name="budget[others]"]').val(data.budget.others);
                    }

                    data = data.isData;

                    $('[name="order_number"]').val(data.order_number).attr('disabled', 'disabled');
                    $('[name="customer_name"]').val(data.customer_name);
                    $('[name="date_of_entry"]').val(data.date_of_entry);
                    $('[name="order_type"]').val(data.order_type);
                    $('[name="season"]').val(data.season);
                    $('[name="order_status"]').val(data.order_status);
                    $('[name="apparel_type"]').val(data.apparel_type);
                    $('[name="order_quantity"]').val(data.order_quantity);
                    $('[name="unit_price"]').val(data.unit_price);
                    $('[name="article_no"]').val(data.article_no);
                    $('[name="style_description"]').val(data.style_description);
                    $('[name="fabric_description"]').val(data.fabric_description);
                    $('[name="date_of_ship"]').val(data.date_of_ship);
                    $('[name="smv"]').val(data.smv);
                    $('[name="sales_person"]').val(data.sales_person);

                    $("#infoArea, #infoArea a").css('display', 'none');

                },
                error: function(){
                    alert('editError');
                }
            });

        });

        $(document).click(function () {
            var orderVal = $('#order_number').val();
            $('[name="po[order_number]"]').val(orderVal);
            $('[name="si[order_number]"]').val(orderVal);
            $('[name="fab[order_number]"]').val(orderVal);
            $('[name="sample[order_number]"]').val(orderVal);
            $('[name="labdip[order_number]"]').val(orderVal);
            $('[name="accessories[order_number]"]').val(orderVal);
            $('[name="yarn[order_number]"]').val(orderVal);
        });

        $('#order_number').keyup(function () {
            var orderVal = $(this).val();
            var url = '{{ route('Order.show', ':order_number||getData') }}';
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $("#alreadyReg").html('Already register Order no !');
                    //$("#infoArea, #infoArea a").css('display', 'none');
                    //$("#saveOrder").hide();
                },
                error: function(){
                    $("#alreadyReg").text('');
                    $("#saveOrder").show();
                    //$("#infoArea, #infoArea a").css('display', 'block');
                    var order_number = $('[name="order_number"]').val();
                    if (order_number == '') {
                        $("#infoArea, #infoArea a").css('display', 'none');
                    }
                }
            });
        });

        {{--info Area Section--}}
        //PO
        $("#myModal").hover(function () {
            var url = '{{ route('po.show', ':order_number') }}';
            var orderVal = $('#orderNumberForJs').val();
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#poTable').html(data);
                }
            });
        });
        $('[name="po[btn_add]"]').click(function () {
            var orderVal = $('#order_number').val();
            var url = '{{ route('po.show', ':order_number') }}';
            url = url.replace(':order_number', orderVal);
            $('#poData').ajaxSubmit({
                success: function (data) {
                    $('#poTable').load(url);
                    $("#myModal").animate({scrollTop: 500}, 'slow');
                    swal({
                        title: "",
                        text: "<span style='color: #00a157'>Successfully information add !</span>",
                        timer: 1200,
                        showConfirmButton: false,
                        html: true
                    });
                }
            });
        });

        //Size & Color Breakdown Details
        $("#myModalS").hover(function () {
            var url = '{{ route('sizeNcolor.show', ':order_number') }}';
            var orderVal = $('#orderNumberForJs').val();
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#siTable').html(data);
                }
            });
        });
        $('[name="si[btn_add]"]').click(function () {
            var orderVal = $('#order_number').val();
            var url = '{{ route('sizeNcolor.show', ':order_number') }}';
            url = url.replace(':order_number', orderVal);
            $('#siData').ajaxSubmit({
                success: function (data) {
                    $('#siTable').load(url);
                    $("#myModalS").animate({scrollTop: 500}, 'slow');
                    swal({
                        title: "",
                        text: "<span style='color: #00a157'>Successfully information add !</span>",
                        timer: 1200,
                        showConfirmButton: false,
                        html: true
                    });
                }
            });
        });

        //Fabric Details
        $("#fabricInfoModal").hover(function () {
            var url = '{{ route('fabric.show', ':order_number') }}';
            var orderVal = $('#orderNumberForJs').val();
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#fabTable').html(data);
                }
            });
        });
        $('[name="fab[btn_add]"]').click(function () {
            var orderVal = $('#order_number').val();
            var url = '{{ route('fabric.show', ':order_number') }}';
            url = url.replace(':order_number', orderVal);
            $('#fabricData').ajaxSubmit({
                success: function (data) {
                    $('#fabTable').load(url);
                    $("#fabricInfoModal").animate({scrollTop: 500}, 'slow');
                    swal({
                        title: "",
                        text: "<span style='color: #00a157'>Successfully information add !</span>",
                        timer: 1200,
                        showConfirmButton: false,
                        html: true
                    });
                }
            });
        });

        //Sample Details
        $("#sampleInfoModal").hover(function () {
            var url = '{{ route('sample.show', ':order_number') }}';
            var orderVal = $('#orderNumberForJs').val();
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#sampleTable').html(data);
                }
            });
        });
        $('[name="sample[btn_add]"]').click(function () {
            var orderVal = $('#order_number').val();
            var url = '{{ route('sample.show', ':order_number') }}';
            url = url.replace(':order_number', orderVal);
            //$('#sampleData').submit();
            $('#sampleData').ajaxSubmit({
                success: function (data) {
                    $('#sampleTable').load(url);
                    $("#sampleInfoModal").animate({scrollTop: 500}, 'slow');
                    swal({
                        title: "",
                        text: "<span style='color: #00a157'>Successfully information add !</span>",
                        timer: 1200,
                        showConfirmButton: false,
                        html: true
                    });

                }
            });
        });

        //Labdip Details
        $("#lapdipInfoModal").hover(function () {
            var url = '{{ route('labdip.show', ':order_number') }}';
            var orderVal = $('#orderNumberForJs').val();
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#labdipTable').html(data);
                }
            });
        });
        $('[name="labdip[btn_add]"]').click(function () {
            var url = '{{ route('labdip.show', ':order_number') }}';
            var orderVal = $('#order_number').val();
            url = url.replace(':order_number', orderVal);
            //$('#labdipData').submit();
            $('#labdipData').ajaxSubmit({
                success: function (data) {
                    $('#labdipTable').load(url);
                    $("#lapdipInfoModal").animate({scrollTop: 500}, 'slow');
                    swal({
                        title: "",
                        text: "<span style='color: #00a157'>Successfully information add !</span>",
                        timer: 1200,
                        showConfirmButton: false,
                        html: true
                    });
                }
            });
        });

        //accessories Details
        $("#accessoriesInfoModal").hover(function () {
            var url = '{{ route('access.show', ':order_number') }}';
            var orderVal = $('#orderNumberForJs').val();
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#accessTable').html(data);
                }
            });
        });
        $('[name="accessories[btn_add]"]').click(function () {
            var url = '{{ route('access.show', ':order_number') }}';
            var orderVal = $('#order_number').val();
            url = url.replace(':order_number', orderVal);
            //$('#labdipData').submit();
            $('#accessData').ajaxSubmit({
                success: function (data) {
                    $('#accessTable').load(url);
                    $("#accessoriesInfoModal").animate({scrollTop: 500}, 'slow');
                    swal({
                        title: "",
                        text: "<span style='color: #00a157'>Successfully information add !</span>",
                        timer: 1200,
                        showConfirmButton: false,
                        html: true
                    });
                }
            });
        });

        //yarn Details
        $("#YarnInfoModal").hover(function () {
            var url = '{{ route('yarn.show', ':order_number') }}';
            var orderVal = $('#orderNumberForJs').val();
            url = url.replace(':order_number', orderVal);
            $.ajax({
                url: url,
                cache: false,
                global: false,     // this makes sure ajaxStart is not triggered
                success: function(data){
                    $('#yarnTable').html(data);
                }
            });
        });
        $('[name="yarn[btn_add]"]').click(function () {
            var url = '{{ route('yarn.show', ':order_number') }}';
            var orderVal = $('#order_number').val();
            url = url.replace(':order_number', orderVal);
            $('#yarnData').ajaxSubmit({
                success: function (data) {
                    $('#yarnTable').load(url);
                    $("#YarnInfoModal").animate({scrollTop: 500}, 'slow');
                    swal({
                        title: "",
                        text: "<span style='color: #00a157'>Successfully information add !</span>",
                        timer: 1200,
                        showConfirmButton: false,
                        html: true
                    });
                }
            });
        });

        $("#saveOrder").click(function () {
            //alert('dsa');
            var order_number = $('[name="order_number"]').val();
            if (order_number == '') {
                alert('Something Wrong !');
                return false;
            }
            var order_quantity = $('[name="order_quantity"]').val();
            if (order_quantity < 0) {
                alert('Something Wrong !');
                return false;
            }

            //$("#orderCreate").submit();
            $("#orderCreate").ajaxSubmit({
                success : function (data) {
                    $("#saveOrder").hide();
                    $('[name="order_number"]').attr('disabled', true);
                    $("html, body").animate({scrollTop: 100}, 'slow');
                    $("#infoArea, #infoArea a").css('display', 'none');
                    $("#drop").remove();
                    swal("Done!", data, "success");
                },
                error: function () {
                    alert('Error');
                }
            });
        });

        $("#saveEditOrder").click(function () {
            var order_number = $('[name="order_number"]').val();
            if (order_number == '') {
                alert('order number missing !');
                return false;
            }

            $("#orderCreate").ajaxSubmit({
                success : function (data) {
                    $(".content-wrapper:eq(0)").html(ordInof);
                    swal("Done !", data, "success");
                    /*$("#saveOrder").hide();
                     $('[name="order_number"]').attr('disabled', true);
                     $("html, body").animate({scrollTop: 100}, 'slow');
                     $("#infoArea, #infoArea a").css('display', 'block');
                     $("#drop").remove();
                     */
                },
                error: function() { alert('error'); }
            });
        });

        function unique_number() {

            var D = new Date();
            var hours   = String("0" + D.getHours()).slice(-2);
            var minute  = String("0" + D.getMinutes()).slice(-2);
            var date    = String("0" + D.getDate()).slice(-2);
            var month   = String("0" + (1 + D.getMonth())).slice(-2);
            var second  = String("0" + D.getSeconds()).slice(-2);
            var yr = String(D.getFullYear().toString().substring(2));

            var uniNum = yr + month + date + '-' + hours + minute + second;

            return uniNum;
        }

        $('[name="order_number"]').val(unique_number);


        $('[name="garmentImg"]').on('change', function(event) {
            $('#grmntImgPreview').attr('src', URL.createObjectURL(event.target.files[0]));
        });

        $('[data-dismiss="fileinput"]').click(function () {
            var url = "{{ asset('') }}assets/garmentsImage/tShirt.png";
            $('[name="garmentsImage"]').val('');
            $('#grmntImgPreview').attr('src', url);
        });
        /*$( function() {
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-mm-yy',
            });
        } );


        var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $confModal.on('hidden', function() {
            $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
        });

        $confModal.modal({ backdrop : false });*/
    </script>




