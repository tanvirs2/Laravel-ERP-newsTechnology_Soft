<div class="row ">
        <div class="col-md-12 col-sm-12">
            <div class="portlet box purple-wisteria">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i>Yarn Receive Details
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <form action="{{ route('yrnRcvKdProgrm.update', ':kd_id') }}" method="post">
                            <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{ method_field('PUT') }}
                        <table class="table table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Yarn Receive</th>
                                <th>Supplier</th>
                                <th>Action</th>
                            </tr>
                            @foreach($yarnRcvList as $yarnIssue)
                                <tr>
                                    <td>
                                        <span>{{ $yarnIssue->date }}</span>
                                        <input disabled size="6" type="text" name="date" value="{{ $yarnIssue->date }}" style="display: none">
                                    </td>
                                    <td>
                                        <span>{{ $yarnIssue->yarnRcvQTY }}</span>
                                        <input disabled size="3" type="text" name="yarnRcvQTY" value="{{ $yarnIssue->yarnRcvQTY }}" style="display: none">
                                    </td>
                                    <td>
                                        <span>{{ $yarnIssue->remarks }}</span>
                                        <input disabled size="3" type="text" name="remarks" value="{{ $yarnIssue->remarks }}" style="display: none">
                                    </td>
                                    <td>
                                        <button type="button" class="editKdData">Edit</button>
                                        <button type="submit" class="updateKdData" style="display: none" secId="{{ $yarnIssue->id }}">Update</button>
                                        <button type="button" class="dltKdData" secId="{{ $yarnIssue->id }}">Delete</button>
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