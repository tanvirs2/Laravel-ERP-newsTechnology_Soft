
    <div class="row ">
        <div class="col-md-12 col-sm-12">
            <div class="portlet box purple-wisteria">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i>Yarn Issue Details
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <form action="{{ route('yarnIssue.update', ':kd_id') }}" method="post">
                            <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{ method_field('PUT') }}
                        <table class="table table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Yarn Qty</th>
                                <th>Item Name</th>
                                <th>PackageUnit</th>
                                <th>Supplier</th>
                                <th>Action</th>
                            </tr>
                            @foreach($yarnIssueList as $yarnIssue)
                                <tr>
                                    <td>
                                        <span>{{ $yarnIssue->date }}</span>
                                        <input disabled size="6" type="text" name="date" value="{{ $yarnIssue->date }}" style="display: none">
                                    </td>
                                    <td>
                                        <span>{{ $yarnIssue->yrnQty }}</span>
                                        <input disabled size="3" type="text" name="yrnQty" value="{{ $yarnIssue->yrnQty }}" style="display: none">
                                    </td>
                                    <td>
                                        <span>{{ $yarnIssue->itemName }}</span>
                                        <input disabled size="3" type="text" name="itemName" value="{{ $yarnIssue->itemName }}" style="display: none">
                                    </td>
                                    <td>
                                        <span>{{ $yarnIssue->pkgUnit }}</span>
                                        <input disabled size="3" type="text" name="pkgUnit" value="{{ $yarnIssue->pkgUnit }}" style="display: none">
                                    </td>
                                    <td>
                                        <span>{{ $yarnIssue->remarks }}</span>
                                        <input disabled size="3" type="text" name="remarks" value="{{ $yarnIssue->remarks }}" style="display: none">
                                    </td>
                                    <td>
                                        <button type="button" class="editKdData">Edit</button>
                                        <button type="submit" class="updateKdData" style="display: none" secId="{{ $yarnIssue->yrnIssueId }}">Update</button>
                                        <button type="button" class="dltKdData" secId="{{ $yarnIssue->yrnIssueId }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function () {
        $(".myAjaxModalChild ").on('hidden.bs.modal', function () {
            $('[href="{{ url('ajxColor') }}"]').val(clrLib.clrName);
            $('[name="yarn[colorId]"]').val(clrLib.clrId);
        });

        $('[action="{{ route('yarnIssue.store') }}"]').ajaxForm({
            success:function () {
                swal({
                    title:"Good job!",
                    text:"Updated",
                    type:"success"
                });
                $(".myAjaxModal").modal('hide');
            }
        });
    });
</script>