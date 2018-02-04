{{-- employeeDetailsInformation --}}

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
                        Employees
                        <small>Employee Details Information</small>
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
                                <a href="#">Employee Details Information</a>
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

                            <button id="saveEmployeeInfo" class="btn btn-danger" type="button">
                                Save Information <i class="fa fa-floppy-o"></i>
                            </button>

                            <a id="newEmployeeIndex" href="#" class="btn green pull-right">
                                Skip Details Information <i class="fa fa-forward"></i>
                            </a>
                            <script>
                                $('#newEmployeeIndex').click(function () {
                                    $('.content-wrapper:eq(0)').load('{{ route('newEmployee.index') }}');
                                    $('.content-wrapper:eq(1)').remove();
                                });
                            </script>
                            <hr>
                            <div class="">

                                <div class="portlet-title">
                                    <div class="caption">
                                    </div>
                                    <div class="tools">
                                    </div>
                                </div>

                                <div class="portlet-body">

                                    <div id="sample_employees_wrapper" class="dataTables_wrapper no-footer">


                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="dataTables_info" id="sample_employees_info" role="status" aria-live="polite">
                                                    <div class="portlet box red-sunglo">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i style="font-size: 1.5em" class="fa fa-info-circle"></i>Employees Details Information
                                                            </div>
                                                        </div>
                                                        <form action="{{ route('info.update', $employeeID) }}" method="post">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                        <div class="portlet-body">

                                                            <div class="form-body">
                                                                <a data-toggle="modal" data-target="#bankModal" class="btn btn-block btn-social btn-twitter btn-success">
                                                                    <span class="fa fa-university"></span>Bank Information
                                                                </a>
                                                                <a data-toggle="modal" data-target="#documentModal" class="btn btn-block btn-social btn-twitter btn-warning">
                                                                    <span class="fa fa-file"></span>Document Information
                                                                </a>

                                                                <a data-toggle="modal" data-target="#addressModal" class="btn btn-block btn-social btn-twitter btn-success">
                                                                    <span class="fa fa-home"></span>Address Information
                                                                </a>
                                                                <a class="btn btn-block btn-social btn-twitter btn-danger">
                                                                    <span class="fa fa-line-chart "></span>Experience Information
                                                                </a>
                                                                <a class="btn btn-block btn-social btn-twitter btn-primary">
                                                                    <span class="fa fa-tasks "></span>Skill Information
                                                                </a>
                                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                                    <span class="fa fa-file-text"></span>Salary information
                                                                </a>
                                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                                    <span class="fa fa-random "></span>Supervisor Information
                                                                </a>
                                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                                    <span class="fa fa-list-alt "></span>Reference Information
                                                                </a>
                                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                                    <span class="fa fa-users "></span>Family Information
                                                                </a>
                                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                                    <span class="fa fa-bus "></span>Weekend Information
                                                                </a>

                                                                <a class="btn btn-block btn-social btn-twitter btn-info">
                                                                    <span class="fa fa-graduation-cap"></span>Education information
                                                                </a>


                                                            </div>

                                                        </div>

                                                            @include('information.bank')
                                                            @include('information.address')
                                                            @include('information.documents')
                                                        </form>
                                                    </div>

                                                    <script>
                                                        $("#saveEmployeeInfo").click(function () {
                                                            $('[action="{{ route('info.update', $employeeID) }}"]').ajaxSubmit({
                                                                success: function (responseText) {
                                                                    //alert(responseText);
                                                                    $('.content-wrapper:eq(0)').load('{{ route('newEmployee.index') }}');
                                                                    $('.content-wrapper:eq(1)').remove();
                                                                    $("html, body").animate({scrollTop: 100}, 'slow');
                                                                    swal("Done!", responseText, "success");
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div class="dataTables_paginate paging_bootstrap_full_number"
                                                     id="sample_employees_paginate">

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
                <div id="printout"> </div>
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