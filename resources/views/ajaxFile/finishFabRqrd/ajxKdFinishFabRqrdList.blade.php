<div class="row ">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box purple-wisteria">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Finish Fabric Receive Details
                </div>
            </div>
            <div class="portlet-body">
                <div class="form-body">
                    <form action="{{ route('finisFabRqrd.update', ':kd_id') }}" method="post">
                        <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                    <table class="table table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>FinishFabReceive </th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                        @foreach($finishFabRqrdList as $finishFabRqrd)
                            <tr>
                                <td>
                                    <span>{{ $finishFabRqrd->date }}</span>
                                    <input disabled size="6" type="text" name="date" value="{{ $finishFabRqrd->date }}" style="display: none">
                                </td>
                                <td>
                                    <span>{{ $finishFabRqrd->finishFabRqrd }}</span>
                                    <input disabled size="3" type="text" name="finishFabRqrd" value="{{ $finishFabRqrd->finishFabRqrd }}" style="display: none">
                                </td>
                                <td>
                                    <span>{{ $finishFabRqrd->remarks }}</span>
                                    <input disabled size="3" type="text" name="remarks" value="{{ $finishFabRqrd->remarks }}" style="display: none">
                                </td>
                                <td>
                                    <button type="button" class="editKdData">Edit</button>
                                    <button type="submit" class="updateKdData" style="display: none" secId="{{ $finishFabRqrd->id }}">Update</button>
                                    <button type="button" class="dltKdData" secId="{{ $finishFabRqrd->id }}">Delete</button>
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