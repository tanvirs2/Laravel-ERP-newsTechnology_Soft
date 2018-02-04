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
                    <th class="text-center">type</th>
                    <th class="text-center">count</th>
                    <th class="text-center">composition</th>
                    <th class="text-center">percentage</th>
                    <th class="text-center">compositionTwo</th>
                    <th class="text-center">percentageTwo</th>
                    <th class="text-center">quantity</th>
                </tr>
                </thead>
                <tbody style="cursor:pointer">
                @foreach($poInfo as $poTable)
                <tr id="poRow" class="text-center">
                    <td><a href="#">{{ $poTable->id }}</a></td>
                    <td>{{ $poTable->order_number }}</td>
                    <td><a href="#">{{ $poTable->type }}</a></td>
                    <td>{{ $poTable->count }}</td>
                    <td>{{ $poTable->composition }}</td>
                    <td>{{ $poTable->percentage }}</td>
                    <td>{{ $poTable->composition_two }}</td>
                    <td><span class="label label-success">{{ $poTable->percentage_two }}</span></td>
                    <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $poTable->quantity }}</div>
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

    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->