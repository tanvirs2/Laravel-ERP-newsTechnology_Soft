<!-- TABLE: LATEST ORDERS -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">.</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Order No</th>
                    <th class="text-center">PO No</th>
                    <th class="text-center">PO Quantity </th>
                    <th class="text-center">SizeName</th>
                    <th class="text-center">ColorName</th>
                </tr>
                </thead>
                <tbody style="cursor:pointer">
                @foreach($poInfo as $poTable)
                <tr id="poRow" class="text-center">
                    <td><a href="#">{{ $poTable->id }}</a></td>
                    <td>{{ $poTable->order_number }}</td>
                    <td><a href="#">{{ $poTable->po_no }}</a></td>
                    <td>{{ $poTable->po_quantity }}</td>
                    <td>{{ $poTable->size_name }}</td>
                    <td><span class="label label-success">{{ $poTable->color_name }}</span></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">

    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->