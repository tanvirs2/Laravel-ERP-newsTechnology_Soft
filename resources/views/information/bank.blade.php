<!-- Modal -->
<div class="modal fade" id="bankModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Bank Account Details
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Account Holder Name</label>
                                <div class="">
                                    <input type="text" class="form-control" name="accountName" placeholder="Account Holder Name" value="{{Input::old('accountName')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Account Number</label>
                                <div class="">
                                    <input type="text" class="form-control" name="accountNumber" placeholder="Account Number" value="{{Input::old('accountNumber')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Bank Name</label>
                                <div class="">
                                    <input type="text" class="form-control" name="bank" placeholder="BANK Name" value="{{Input::old('bank')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">IFSC Code</label>
                                <div class="">
                                    <input type="text" class="form-control" name="ifsc" placeholder="IFSC Code" value="{{Input::old('ifsc')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">PAN Number </label>
                                <div class="">
                                    <input type="text" class="form-control" name="pan" placeholder="PAN Number" value="{{Input::old('pan')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Branch</label>
                                <div class="">
                                    <input type="text" class="form-control" name="branch" placeholder="BRANCH" value="{{Input::old('branch')}}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>