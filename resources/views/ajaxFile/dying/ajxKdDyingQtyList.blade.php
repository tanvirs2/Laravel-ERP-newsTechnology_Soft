<div class="row ">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box purple-wisteria">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Dying Quantity Details
                </div>
            </div>
            <div class="portlet-body">
                <div class="form-body">
                    <form action="{{ route('dyingQtyFrKd.update', ':kd_id') }}" method="post">
                        <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                        <table class="table table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Dying Qty</th>
                                <th>Supplier</th>
                                <th>Action</th>
                            </tr>
                            @foreach($kdDyingQtyList as $kdDyingQty)
                                    <tr>
                                        <td>
                                            <span>{{ $kdDyingQty->date }}</span>
                                            <input disabled size="6" type="text" name="date" value="{{ $kdDyingQty->date }}" style="display: none">
                                        </td>
                                        <td>
                                            <span>{{ $kdDyingQty->dyingQty }}</span>
                                            <input disabled size="3" type="text" name="dyingQty" value="{{ $kdDyingQty->dyingQty }}" style="display: none">
                                        </td>
                                        <td>
                                            <span>{{ $kdDyingQty->remarks }}</span>
                                            <input disabled size="3" type="text" name="remarks" value="{{ $kdDyingQty->remarks }}" style="display: none">
                                        </td>
                                        <td>
                                            <button type="button" class="editKdData">Edit</button>
                                            <button type="submit" class="updateKdData" style="display: none" secId="{{ $kdDyingQty->id }}">Update</button>
                                            <button type="button" class="dltKdData" secId="{{ $kdDyingQty->id }}">Delete</button>
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