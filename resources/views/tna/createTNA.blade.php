
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
                            <span class="fa fa-plus"></span>New TNA
                        </h3>
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                    <a href="/hrm_demo/admin/employees">Employees</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                    <a href="#">New TNA</a>
                                </li>
                            </ul>
                        </div>

                        <!-- END PAGE HEADER-->
                        <hr>

                        <div id="drop">Drop a TNA Excel file here to Register sheet data</div>

                        <hr>
                        <div class="clearfix">
                        </div>
                            {{--INLCUDE ERROR MESSAGE BOX--}}
                            @include('common.error')
                            {{--END ERROR MESSAGE BOX--}}
                        <form id="employeeCreate" action="{{ route('tna.store') }}" method="POST"  accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row ">
                                <div class="col-md-6 col-sm-6">
                                    <div class="portlet box purple-wisteria">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i style="font-size: 1.1em"  class="fa fa-user "></i>TNA Details
                                            </div>

                                        </div>
                                        <div class="portlet-body">

                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">BuyerName<span class="required">* </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="BuyerName" placeholder="Employee Name" value="{{ Input::old('fullName') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">PO Number</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="PONumber" placeholder="Father Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Style Ref</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                            <input type="text" class="form-control datepicker" id="" name="StyleRef"  value="{{ Input::old('date_of_birth') }}">
                                                            <span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">POQty</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="POQty" placeholder="Father Name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">LeadTime</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="LeadTime" placeholder="Father Name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">ShipmentDate</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="ShipmentDate" placeholder="Father Name">
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                    <button style="display: none" id="formModify" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn btn-danger">
                                        <i class="fa fa-pencil-square-o"></i>	Modify TNA
                                    </button>
                                    <button id="formSubmit" type="button" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                        <i class="fa fa-plus"></i>	Registered TNA
                                    </button>
                                </div>

                                <div class="col-md-6 col-sm-6">



                                    <div class="portlet box red-sunglo" id="companyDetails">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i style="font-size: 1.1em" class="fa fa-industry "></i>Date Schedule
                                            </div>

                                        </div>
                                        <div class="portlet-body">

                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Lab Dip App</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="LabDipApp_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="LabDipApp_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Fit Sample</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="Fitsample_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="Fitsample_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Fab. Book[Knit]</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="FabBookKnit_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="FabBookKnit_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Yarn Issue</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="YarnIssue_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="YarnIssue_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Trims Book[SnF]</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="TrimsBookSnF_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="TrimsBookSnF_Finis" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">PP Sample App</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="PPSampleApp_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="PPSampleApp_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Knit Prod</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="KnitProd_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="KnitProd_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Grey Receive</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="GreyReceive_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="GreyReceive_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Dyeing Prod</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="DyeingProd_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="DyeingProd_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Fin.Fab.Rcv</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="FinFabRcv_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="FinFabRcv_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">PP Meeting</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="PPMeeting_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="PPMeeting_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Sew Trims Rcv</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="SewTrimsRcv_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="SewTrimsRcv_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Cutting</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="Cutting_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="Cutting_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Print/Emb</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="PrintOrEmb_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="PrintOrEmb_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Fin Trims Rcv</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="FinTrimsRcv_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="FinTrimsRcv_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Sewing Prod</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="SewingProd_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="SewingProd_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Gmts Finish</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="GmtsFinish_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="GmtsFinish_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Inspection</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="Inspection_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="Inspection_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Ex-Factory</label>
                                                    <div class="col-md-9">
                                                        <span class="">
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="ExFactory_Start" placeholder="Start">
                                                            </span>
                                                            <span class="col-md-6">
                                                            <input type="text" class="form-control" name="ExFactory_Finish" placeholder="Finish">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    {{--##############--}}
                                    {{--#############--}}


                                </div>

                            </div>


                            <div class="clearfix">

                                <div class="clearfix">
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal Start -->

                        <!-- Modal Start -->
                        </form>

                        <hr>


                    </div>
                </div>
                <!-- /.box-body -->
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

        /*$.post("page.php", $('#myForm').serialize(), function (data) {
            alert(data);
        });*/

        /* set up drag-and-drop event */
        var drop = document.getElementById('drop');
        function handleDrop(e) {
            e.stopPropagation();
            e.preventDefault();
            var files = e.dataTransfer.files;
            var i,f;
            for (i = 0, f = files[i]; i != files.length; ++i) {
                var reader = new FileReader();
                var name = f.name;
                reader.onload = function(e) {
                    var data = e.target.result;

                    var workbook = XLSX.read(data, {type: 'binary'});
                    var first_sheet_name = workbook.SheetNames[1];

                    var worksheet = workbook.Sheets[first_sheet_name];

                    function valAppend(cell, scope) {
                        var v = typeof worksheet[cell];
                        if (v !== 'undefined') {
                            $(scope).val(worksheet[cell].v);
                            $(scope).attr('readOnly', true);
                            $("#formModify").css('display', 'inline');
                        } else {
                            $(scope).val('');
                            $(scope).attr('readOnly', false);
                        }
                    }
                    valAppend('B3', 'input[name="BuyerName"]');
                    valAppend('C3', 'input[name="PONumber"]');
                    valAppend('D3', 'input[name="StyleRef"]');
                    valAppend('E3', 'input[name="POQty"]');
                    valAppend('F3', 'input[name="LeadTime"]');
                    valAppend('G3', 'input[name="ShipmentDate"]');
                    valAppend('H3', 'input[name="LabDipApp_Start"]');
                    valAppend('I3', 'input[name="LabDipApp_Finish"]');
                    valAppend('J3', 'input[name="Fitsample_Start"]');
                    valAppend('K3', 'input[name="Fitsample_Finish"]');
                    valAppend('L3', 'input[name="FabBookKnit_Start"]');
                    valAppend('M3', 'input[name="FabBookKnit_Finish"]');
                    valAppend('N3', 'input[name="YarnIssue_Start"]');
                    valAppend('O3', 'input[name="YarnIssue_Finish"]');
                    valAppend('P3', 'input[name="TrimsBookSnF_Start"]');
                    valAppend('Q3', 'input[name="TrimsBookSnF_Finis"]');
                    valAppend('R3', 'input[name="PPSampleApp_Start"]');
                    valAppend('S3', 'input[name="PPSampleApp_Finish"]');
                    valAppend('T3', 'input[name="KnitProd_Start"]');
                    valAppend('U3', 'input[name="KnitProd_Finish"]');
                    valAppend('V3', 'input[name="GreyReceive_Start"]');
                    valAppend('W3', 'input[name="GreyReceive_Finish"]');
                    valAppend('X3', 'input[name="DyeingProd_Start"]');
                    valAppend('Y3', 'input[name="DyeingProd_Finish"]');
                    valAppend('Z3', 'input[name="FinFabRcv_Start"]');
                    valAppend('AA3', 'input[name="FinFabRcv_Finish"]');
                    valAppend('AB3', 'input[name="PPMeeting_Start"]');
                    valAppend('AC3', 'input[name="PPMeeting_Finish"]');
                    valAppend('AD3', 'input[name="SewTrimsRcv_Start"]');
                    valAppend('AE3', 'input[name="SewTrimsRcv_Finish"]');
                    valAppend('AF3', 'input[name="Cutting_Start"]');
                    valAppend('AG3', 'input[name="Cutting_Finish"]');
                    valAppend('AH3', 'input[name="PrintOrEmb_Start"]');
                    valAppend('AI3', 'input[name="PrintOrEmb_Finish"]');
                    valAppend('AJ3', 'input[name="FinTrimsRcv_Start"]');
                    valAppend('AK3', 'input[name="FinTrimsRcv_Finish"]');
                    valAppend('AL3', 'input[name="SewingProd_Start"]');
                    valAppend('AM3', 'input[name="SewingProd_Finish"]');
                    valAppend('AN3', 'input[name="GmtsFinish_Start"]');
                    valAppend('AO3', 'input[name="GmtsFinish_Finish"]');
                    valAppend('AP3', 'input[name="Inspection_Start"]');
                    valAppend('AQ3', 'input[name="Inspection_Finish"]');
                    valAppend('AR3', 'input[name="ExFactory_Start"]');
                    valAppend('AS3', 'input[name="ExFactory_Finish"]');
                };
                reader.readAsBinaryString(f);
            }
        }
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

        /*$('[name="employeeID"]').val(unique_number());

        $('html').click(function () {
            $('[name="employeeID"]').val(unique_number());
        });*/


        $('#aj_test').click(function () {
            $.ajax({method: "get", url: "{{ url('/ajax_designation') }}", data: { lock: 'rubel'}, success: function(result){
                alert(result);
            }});
        });

        /*$('#companyDetails').click(function () {
            dept();
        });*/

        $("#formSubmit").click(function () {
            $('#employeeCreate').ajaxSubmit({
                success: function (responseText) {
                    //alert(responseText);
                    var uri = '{{ route('tna.index') }}';
                    $('.content-wrapper:eq(0)').load(uri);
                    $('.content-wrapper:eq(1)').remove();
                    $("html, body").animate({scrollTop: 100}, 'slow');
                }
            });
        });

        $('[name="profileImage"]').on('change', function(event) {
            $('#imgPreview').attr('src', URL.createObjectURL(event.target.files[0]));
        });

        $('[data-dismiss="fileinput"]').click(function () {
            var url = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image';
            $('[name="profileImage"]').val('');
            $('#imgPreview').attr('src', url);
        });

    </script>