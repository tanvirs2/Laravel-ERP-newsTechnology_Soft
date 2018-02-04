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
                    <th class="text-center">Garments Item</th>
                    <th class="text-center">BodyPart </th>
                    <th class="text-center">FabricNature</th>
                    <th class="text-center">ColorType</th>
                    <th class="text-center">FabricSource</th>
                    <th class="text-center">DiaType</th>
                    <th class="text-center">GSM</th>
                    <th class="text-center">Uom</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">YarnRequired</th>
                </tr>
                </thead>
                <tbody style="cursor:pointer">
                @foreach($poInfo as $poTable)
                <tr id="poRow" class="text-center">
                    <td><a href="#">{{ $poTable->id }}</a></td>
                    <td>{{ $poTable->order_number }}</td>
                    <td><a href="#">{{ $poTable->garmentsItem }}</a></td>
                    <td>{{ $poTable->bodyPart }}</td>
                    <td>{{ $poTable->fabNature }}</td>
                    <td><span class="label label-success">{{ $poTable->ColorType }}</span></td>
                    <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $poTable->FabricSource }}</div>
                    </td>
                    <td>{{ $poTable->DiaType }}</td>
                    <td>{{ $poTable->gsm }}</td>
                    <td>{{ $poTable->Uom }}</td>
                    <td>{{ $poTable->Amount }}</td>
                    <td>{{ $poTable->Status }}</td>
                    <td>{{ $poTable->YarnRequired }}</td>
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