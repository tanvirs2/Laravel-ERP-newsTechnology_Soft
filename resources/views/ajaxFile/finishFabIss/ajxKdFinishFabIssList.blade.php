<div class="row ">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box purple-wisteria">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Finish Fabric Issue Details
                </div>
            </div>
            <div class="portlet-body">
                <div class="form-body">
                    <form action="{{ route('finisFabIss.update', ':kd_id') }}" method="post">
                        <input id="csrfField" type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                    <table class="table table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>FinishFabIssue </th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                        @foreach($finishFabIssList as $finishFabIss)
                            <tr>
                                <td>
                                    <span>{{ $finishFabIss->date }}</span>
                                    <input disabled size="6" type="text" name="date" value="{{ $finishFabIss->date }}" style="display: none">
                                </td>
                                <td>
                                    <span>{{ $finishFabIss->finiFabIssue }}</span>
                                    <input disabled size="3" type="text" name="finiFabIssue" value="{{ $finishFabIss->finiFabIssue }}" style="display: none">
                                </td>
                                <td>
                                    <span>{{ $finishFabIss->remarks }}</span>
                                    <input disabled size="3" type="text" name="remarks" value="{{ $finishFabIss->remarks }}" style="display: none">
                                </td>
                                <td>
                                    <button type="button" class="editKdData">Edit</button>
                                    <button type="submit" class="updateKdData" style="display: none" secId="{{ $finishFabIss->id }}">Update</button>
                                    <button type="button" class="dltKdData" secId="{{ $finishFabIss->id }}">Delete</button>
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