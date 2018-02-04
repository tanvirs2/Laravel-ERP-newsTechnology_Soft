<div class="row ">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box purple-wisteria">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Knitting Quantity Details
                </div>
            </div>
            <div class="portlet-body">
                <div class="form-body">
                    <form action="{{ route('kdForKnitting.update', ':kd_id') }}" method="post">
                        <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                    <table class="table table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>Knitting Qty</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                        @foreach($kdKnittingQtyList as $kdKnittingQty)
                            <tr>
                                <td>
                                    <span>{{ $kdKnittingQty->date }}</span>
                                    <input disabled size="6" type="text" name="date" value="{{ $kdKnittingQty->date }}" style="display: none">
                                </td>
                                <td>
                                    <span>{{ $kdKnittingQty->knttngQTY }}</span>
                                    <input disabled size="3" type="text" name="knttngQTY" value="{{ $kdKnittingQty->knttngQTY }}" style="display: none">
                                </td>
                                <td>
                                    <span>{{ $kdKnittingQty->remarks }}</span>
                                    <input disabled size="3" type="text" name="remarks" value="{{ $kdKnittingQty->remarks }}" style="display: none">
                                </td>
                                <td>
                                    <button type="button" class="editKdData">Edit</button>
                                    <button type="submit" class="updateKdData" style="display: none" secId="{{ $kdKnittingQty->id }}">Update</button>
                                    <button type="button" class="dltKdData" secId="{{ $kdKnittingQty->id }}">Delete</button>
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