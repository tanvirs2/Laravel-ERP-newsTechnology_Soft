@extends('layouts.app')

@section('content')
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
                            <span class="fa fa-plus"></span>    New Employee
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
                                    <a href="#">New Employee</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE HEADER-->
                        @if(count($department)==0)
                            <div class="note note-warning">
                                <strong>Note: </strong>There no Department in the database.Please create the <a href="{{ route('admin.departments.index')}}">Department</a> First
                            </div>
                        @else
                        <hr>

                        <div class="clearfix">
                        </div>
                            {{--INLCUDE ERROR MESSAGE BOX--}}
                            @include('common.error')
                            {{--END ERROR MESSAGE BOX--}}
                        <form action="{{ url('employees_info') }}" method="POST"  accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="employeeCreate">
                            {{ csrf_field() }}
                            <div class="row ">
                                <div class="col-md-6 col-sm-6">
                                    <div class="portlet box purple-wisteria">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i style="font-size: 1.1em"  class="fa fa-user "></i>Personal Details
                                            </div>

                                        </div>
                                        <div class="portlet-body">

                                            <div class="form-body">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">Photo</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>

                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                            </div>
                                                            <div>
        													<span class="btn default btn-file">
        													<span class="fileinput-new">
        													Select image </span>
        													<span class="fileinput-exists">
        													Change </span>
        													 <input type="file" name="profileImage">
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
                                                    <label class="col-md-3 control-label">Name <span class="required">* </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="fullName" placeholder="Employee Name" value="{{ Input::old('fullName') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Father's Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="fatherName" placeholder="Father Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Date of Birth</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                            <input type="text" class="form-control datepicker" id="" name="date_of_birth" readonly value="{{ Input::old('date_of_birth') }}">
                                                            <span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Gender</label>
                                                    <div class="col-md-9">
                                                        {{ Form::select('gender', array('male' => 'Male', 'female' => 'Female'), Input::old('gender'),array('class'=>'form-control')) }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Religion</label>
                                                    <div class="col-md-9">
                                                        {{ Form::select('religion', array('Islam' => 'Islam', 'Hindu' => 'Hindu', 'Christan' => 'Christan', 'Buddha' => 'Buddha'), Input::old('religion'),array('class'=>'form-control')) }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Marital Status</label>
                                                    <div class="col-md-9">
                                                        {{ Form::select('marital_status', array('Single' => 'Single', 'Married' => 'Married', 'Separated' => 'Separated', 'Widow' => 'Widow'), Input::old('marital_status'),array('class'=>'form-control')) }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Blood Group</label>
                                                    <div class="col-md-9">
                                                        {{ Form::select('blood_group', array('A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'), Input::old('blood_group'),array('class'=>'form-control')) }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Phone</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="mobileNumber" placeholder="Contact Number" value="{{Input::old('mobileNumber')}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> National ID</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="national_id" placeholder="National ID">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"> Passport ID</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="passport_id" placeholder="National ID">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">

                                    @include('information.bank')

                                    <div class="portlet box red-sunglo">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i style="font-size: 1.1em" class="fa fa-industry "></i>Company Details
                                            </div>

                                        </div>
                                        <div class="portlet-body">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="employeeID" readonly placeholder="Employee ID" value="{{Input::old('employeeID')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Department</label>
                                                    <div class="col-md-9">
                                                        {{ Form::select('department', $department,null,['class' => 'form-control select2me','id'=>'department','onchange'=>'dept();return false;']) }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Designation</label>
                                                    <div class="col-md-9">

                                                        <select  class="select2me form-control" name="designation" id="designation" >

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Date of Joining</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                            <input type="text" class="form-control datepicker" name="joiningDate" readonly value="{{Input::old('joiningDate')}}">
                                                            <span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Joining Salary</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="currentSalary" placeholder="Current Salary" value="{{ Input::old('currentSalary') }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{--##############--}}
                                    {{--#############--}}

                                    <div class="portlet box red-sunglo">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i style="font-size: 1.5em" class="fa fa-info-circle"></i>information Area
                                            </div>

                                        </div>
                                        <div class="portlet-body">

                                            <div class="form-body">
                                                <a data-toggle="modal" data-target="#bankModal" class="btn btn-block btn-social btn-twitter btn-success">
                                                    <span class="fa fa-university"></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Bank Information
                                                </a>
                                                <a data-toggle="modal" data-target="#documentModal" class="btn btn-block btn-social btn-twitter btn-warning">
                                                    <span class="fa fa-file"></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Document Information
                                                </a>

                                                <a data-toggle="modal" data-target="#addressModal" class="btn btn-block btn-social btn-twitter btn-success">
                                                    <span class="fa fa-home"></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Address Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-twitter btn-danger">
                                                    <span class="fa fa-line-chart "></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Experience Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-twitter btn-primary">
                                                    <span class="fa fa-tasks "></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Skill Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                    <span class="fa fa-file-text"></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Salary information
                                                </a>
                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                    <span class="fa fa-random "></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Supervisor Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                    <span class="fa fa-list-alt "></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Reference Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                    <span class="fa fa-users "></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Family Information
                                                </a>
                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                    <span class="fa fa-bus "></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Weekend Information
                                                </a>

                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                    <span class="fa fa-graduation-cap"></span>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Education information
                                                </a>


                                            </div>

                                        </div>
                                    </div>
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
                                                    <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                                        <i class="fa fa-plus"></i>	Submit </button>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal Start -->
                        @include('information.address')
                        @include('information.documents')
                        <!-- Modal Start -->
                        </form>

                        <hr>
                        @endif

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

        function unique_number() {
            /*var text = "";
            var possible = "ABCDEFGHKLMNOPQRSTUVWXYZ";

            for( var i=0; i < 2; i++ ) {
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }*/

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

        $('[name="employeeID"]').val(unique_number());

        //unique_number();


        $('#aj_test').click(function () {
            //$('#aja').val();
            $.ajax({method: "get", url: "{{ url('/ajax_designation') }}", data: { lock: 'rubel'}, success: function(result){
                alert(result);
            }});
        });

        /*$("#employeeCreate").on("submit", function(){
            if ($('#designation').val() === 0) {
                alert('Designation field is required');
                return false;
            }
        });*/

        $("#employeeCreate").on("submit", function(){
            if (!$('#designation').val()) {
                alert('Designation field is required');
                return false;
            }
        });

        /*------------------script start----------------*/
        /*$("#employeeCreate").submit(function () {

        });*/


        jQuery(document).ready(function() {

            ComponentsPickers.init();
            dept();



            /*$('select[name=designation]').val(function () {
                if ( !$(this).val() ) {
                    alert('Designation field required');
                }

            })*/

        });
        function dept(){

            $.getJSON("{{ URL::to('ajax_designation')}}",
                    { deptID: $('#department').val() },
                    function(data) {
                        //alert(data);
                        var model = $('#designation');
                        model.empty();
                        $.each(data, function(index, element) {
                            //alert('dsada');
                            model.append("<option value='"+element.id+"'>" + element.designation + "</option>");
                        });

                    });

        }

    </script>

@endsection