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
                    <div class="col-md-6">
                        <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Color's Library</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Color ID</th>
                                        <th>Color name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--*/$sl=0/*--}}
                                    @foreach($colors as $color)
                                    <tr>
                                        <td>{{ ++$sl }}</td>
                                        <td>{{ $color->color_name }}</td>
                                        <td>
                                            {{ Form::open([ 'method'  => 'delete', 'route' => [ 'settings.destroy', $color->id ] ]) }}
                                                <a href="{{ route('settings.edit', $color->id) }}" class="label label-success">Edit</a>
                                                <button type="submit" class="label label-success">Delete</button>
                                            {{ Form::close() }}

                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{ route('settings.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Place New Color</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Size's Library</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                    <tr>
                                        <th>Size ID</th>
                                        <th>Size name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--*/$sl=0/*--}}
                                    @foreach($sizes as $size)
                                    <tr>
                                        <td>{{ ++$sl }}</td>
                                        <td>{{ $size->size_name }}</td>
                                        <td>
                                            {{ Form::open([ 'method'  => 'delete', 'route' => [ 'size.destroy', $size->id ] ]) }}
                                                <a href="{{ route('size.edit', $size->id) }}" class="label label-success">Edit</a>
                                                <button type="submit" class="label label-success">Delete</button>
                                            {{ Form::close() }}

                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{ route('size.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Place New Size</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Line Library</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Line ID</th>
                                            <th>Line name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--*/$sl=0/*--}}
                                        @foreach($lines as $line)
                                            <tr>
                                                <td>{{ ++$sl }}</td>
                                                <td>{{ $line->line_name }}</td>
                                                <td>
                                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'line.destroy', $line->id ] ]) }}
                                                    <a href="{{ route('line.edit', $line->id) }}" class="label label-success">Edit</a>
                                                    <button type="submit" class="label label-success">Delete</button>
                                                    {{ Form::close() }}

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="{{ route('line.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Place New Line</a>
                            </div>
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
@endsection