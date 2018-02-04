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
                    <th class="text-center">itemName</th>
                    <th class="text-center">colorName</th>
                    <th class="text-center">requestDate</th>
                    <th class="text-center">targetDeliveryDate</th>
                    <th class="text-center">exFactoryDate</th>
                    <th class="text-center">itemStatus</th>
                    <th class="text-center">itemApprovalDate</th>
                    <th class="text-center">courierDetails</th>
                    <th class="text-center">itemRemark</th>
                </tr>
                </thead>
                <tbody style="cursor:pointer">
                @foreach($poInfo as $poTable)
                <tr id="poRow" class="text-center">
                    <td><a href="#">{{ $poTable->Id }}</a></td>
                    <td>{{ $poTable->order_number }}</td>
                    <td><a href="#">{{ $poTable->itemName }}</a></td>
                    <td>{{ $poTable->colorName }}</td>
                    <td>{{ $poTable->requestDate }}</td>
                    <td><span class="label label-success">{{ $poTable->targetDeliveryDate }}</span></td>
                    <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $poTable->exFactoryDate }}</div>
                    </td>
                    <td>{{ $poTable->itemStatus }}</td>
                    <td>{{ $poTable->itemApprovalDate }}</td>
                    <td>{{ $poTable->courierDetails }}</td>
                    <td>{{ $poTable->itemRemark }}</td>
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