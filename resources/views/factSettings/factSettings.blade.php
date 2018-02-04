@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Version 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="col-md-8">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Factory Settings</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <form action="{{ url("factSettings/saveFactNameNPrefix") }}" method="post">
                                        {{ csrf_field() }}
                                    <table class="table no-margin">
                                        <tbody>
                                        <tr>
                                            <td>Prefix</td>
                                            <td class="edtF"><span>{{ $factSettings->prefix }}</span> <input type="hidden" value="{{ $factSettings->prefix }}" name="prefix"></td>
                                            <td><a href="#" class="edit label label-success">Edit</a></td>
                                        </tr>
                                        <tr>
                                            <td>Factory Name</td>
                                            <td class="edtF"><span>{{ $factSettings->factoryName }}</span><input type="hidden" value="{{ $factSettings->factoryName }}" name="factoryName"></td>
                                            <td><a href="#" class="edit label label-success">Edit</a></td>
                                        </tr>
                                        <tr>
                                            <td>Factory Description</td>
                                            <td class="edtF"><span>{{ $factSettings->factDesc }}</span><input type="hidden" value="{{ $factSettings->factDesc }}" name="factDesc"></td>
                                            <td><a href="#" class="edit label label-success">Edit</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </form>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <!-- /.box-footer -->
                        </div>
                    </div>

                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        $("td .edit").click(function () {
            var b = $(this).closest("tr").children(".edtF");
            b.children("span").hide();
            b.children("input").attr("type", "text");
            $(this).closest("tr").append('<td><a  href="#" class="saveInp label label-success">Save</a></td>')
        });

        $("body").on("click", '.saveInp', function () {
            $(this).closest("form").ajaxSubmit();
            var b = $(this).closest("tr").children(".edtF");
            var text = b.children("input").attr("type", "hidden").val();
            b.children("span").html(text).show();
            $(this).remove(".saveInp");
        });
    </script>
@endsection