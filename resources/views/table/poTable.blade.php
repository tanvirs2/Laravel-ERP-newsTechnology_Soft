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
                    <th class="text-center">PO Received Date</th>
                    <th class="text-center">PO Quantity </th>
                    <th class="text-center">Cutting % </th>
                    <th class="text-center">Fabric Received Date</th>
                    <th class="text-center">Actual Shipment Date</th>
                    <th class="text-center">Est Shipment Date</th>
                </tr>
                </thead>
                <tbody style="cursor:pointer">
                @foreach($poInfo as $poTable)
                <tr id="poRow" class="text-center">
                    <td><a href="#">{{ $poTable->Id }}</a></td>
                    <td>{{ $poTable->order_number }}</td>
                    <td><a href="#">{{ $poTable->po_received_date }}</a></td>
                    <td>{{ $poTable->po_quantity }}</td>
                    <td>{{ $poTable->cutting_per }}</td>
                    <td><span class="label label-success">{{ $poTable->fabric_received_date }}</span></td>
                    <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $poTable->shipment_date }}</div>
                    </td>
                    <td>{{ $poTable->est_shipment_date }}</td>
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