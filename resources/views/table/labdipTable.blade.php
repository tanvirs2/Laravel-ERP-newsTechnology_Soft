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
                    <th class="text-center">PoNo </th>
                    <th class="text-center">OrderNo</th>
                    <th class="text-center">RequestDate</th>
                    <th class="text-center">TargetDeliveryDate</th>
                    <th class="text-center">InstructionsSelectedFactory</th>
                    <th class="text-center">ExFactoryDate</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Approval Or RejectionDate</th>
                    <th class="text-center">ReasonForRejection</th>
                    <th class="text-center">CourierDetails</th>
                </tr>
                </thead>
                <tbody style="cursor:pointer">
                @foreach($poInfo as $poTable)
                <tr id="poRow" class="text-center">
                    <td><a href="#">{{ $poTable->id }}</a></td>
                    <td>{{ $poTable->po_no }}</td>
                    <td>{{ $poTable->order_number }}</td>
                    <td>{{ $poTable->requestDate }}</td>
                    <td><span class="label label-success">{{ $poTable->targetDeliveryDate }}</span></td>
                    <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $poTable->instructionsSelectedFactory }}</div>
                    </td>
                    <td>{{ $poTable->exFactoryDate }}</td>
                    <td>{{ $poTable->status }}</td>
                    <td>{{ $poTable->approvalOrRejectionDate }}</td>
                    <td>{{ $poTable->reasonForRejection }}</td>
                    <td>{{ $poTable->courierDetails }}</td>
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