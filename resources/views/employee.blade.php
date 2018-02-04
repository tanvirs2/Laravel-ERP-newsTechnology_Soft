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
                        Employees
                        <small>Employee List</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="/hrm_demo/admin/dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="/hrm_demo/admin/employees">Employees</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Employee List</a>
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
                            <a href="{{ route('admin.employees.create') }}" class="btn green">
                                Add New Employee <i class="fa fa-user-plus"></i>
                            </a>

                            <hr>
                            <div class="portlet box blue">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-street-view"></i>Employees List
                                    </div>
                                    <div class="tools">
                                    </div>
                                </div>

                                <div class="portlet-body">

                                    <div id="sample_employees_wrapper" class="dataTables_wrapper no-footer">
                                        {{--<div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="dataTables_length" id="sample_employees_length"><label>
                                                        <select name="sample_employees_length"
                                                                aria-controls="sample_employees"
                                                                class="form-control input-xsmall input-inline">
                                                            <option value="5">5</option>
                                                            <option value="15">15</option>
                                                            <option value="20">20</option>
                                                            <option value="-1">All</option>
                                                        </select> records</label></div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div id="sample_employees_filter" class="dataTables_filter"><label>My
                                                        search: <input class="form-control input-small input-inline"
                                                                       placeholder=""
                                                                       aria-controls="sample_employees"
                                                                       type="search"></label></div>
                                            </div>
                                        </div>--}}
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                                   id="sample_employees" role="grid"
                                                   aria-describedby="sample_employees_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 82px;" aria-label="
                                                            EmployeeID
                                                            : activate to sort column ascending">

                                                            EmployeeID
                                                        </th>
                                                        <th class="text-center sorting_asc" rowspan="1" colspan="1"
                                                            style="width: 96px;" aria-label="
                                                            Image
                                                            ">
                                                            Image
                                                        </th>
                                                        <th style="text-align: center; width: 84px;" class="sorting"
                                                            tabindex="0" aria-controls="sample_employees" rowspan="1"
                                                            colspan="1" aria-label="
                                                            Name
                                                            : activate to sort column ascending">
                                                            Name
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 209px;" aria-label="
                                                            Dept/Designation
                                                            : activate to sort column ascending">
                                                            Dept/Designation
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 109px;" aria-label="
                                                            At Work
                                                            : activate to sort column ascending">
                                                            At Work
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 121px;" aria-label="
                                                            Phone
                                                            : activate to sort column ascending">
                                                            Phone
                                                        </th>
                                                        <th class="text-center sorting" tabindex="0"
                                                            aria-controls="sample_employees" rowspan="1" colspan="1"
                                                            style="width: 44px;" aria-label="
                                                            Status
                                                            : activate to sort column ascending">
                                                            Status
                                                        </th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 110px;" aria-label="
                                                            Action
                                                            ">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                @foreach ($employees as $employee)
                                                    <tr id="row{{ $employee->employeeID }}">
                                                        <td>
                                                            {{ $employee->employeeID }}

                                                        </td>
                                                        <td class="text-center">
                                                            {{HTML::image("/profileImages/{$employee->profileImage}",'ProfileImage',['height'=>'80px'])}}

                                                        </td>
                                                        <td>
                                                            {{ $employee->fullName }}
                                                        </td>
                                                        <td>
                                                            <p class="bg-warning">Department: <strong>{{ $employee->getDesignation->department->deptName or ''}}</strong></p>
                                                            <p class="bg-info">Designation: <strong>{{ $employee->getDesignation->designation or ''}}</strong></p>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $employee->workDuration($employee->employeeID) }}
                                                        </td>
                                                        <td>
                                                            {{ $employee->mobileNumber }}
                                                        </td>
                                                        <td>
                                                            @if($employee->status=='active')
                                                                <span class="label label-sm label-success"> {{ $employee->status }} </span>
                                                            @else
                                                                <span class="label label-sm label-danger"> {{ $employee->status }} </span>
                                                            @endif
                                                        </td>
                                                        <td class="">
                                                            <p> <a href="{{ url('appointmentLetter') }}" id="printMe" data-toggle="tooltip" data-placement="left" title="Print Appointment Letter!" class="btn purple"><i class="fa fa-print"></i></a> <a data-toggle="tooltip" title="View or Edit Employee data. " class="btn purple" href="{{ route('admin.employees.edit',$employee->employeeID)  }}"><i class="fa fa-eye"></i> </a></p>
                                                            <p> <a class="btn red" style="width: 95px;" href="javascript:;" onclick="del('{{$employee->employeeID}}','{{ $employee->fullName }}')"><i class="fa fa-trash"></i> Delete</a></p>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12">
                                                <div class="dataTables_info" id="sample_employees_info"
                                                     role="status" aria-live="polite">Showing 1 to 5 of 24 entries
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div class="dataTables_paginate paging_bootstrap_full_number"
                                                     id="sample_employees_paginate">
                                                    <ul class="pagination" style="visibility: visible;">
                                                        <li class="prev disabled"><a href="#" title="First"><i
                                                                    class="fa fa-angle-double-left"></i></a>
                                                        </li>
                                                        <li class="prev disabled"><a href="#" title="Prev"><i
                                                                    class="fa fa-angle-left"></i></a></li>
                                                        <li class="active"><a href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><a href="#">4</a></li>
                                                        <li><a href="#">5</a></li>
                                                        <li class="next"><a href="#" title="Next"><i
                                                                    class="fa fa-angle-right"></i></a></li>
                                                        <li class="next"><a href="#" title="Last"><i
                                                                    class="fa fa-angle-double-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
                                    <button type="button" data-dismiss="modal" class="btn red" id="delete"><i
                                            class="fa fa-trash"></i> Delete
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
                <div id="printout"> dhsajdhas</div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>


<script>

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
            var url = "{{ url('/delete_employee:id') }}";
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


@endsection