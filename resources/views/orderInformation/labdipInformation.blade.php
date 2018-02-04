<!-- Modal -->
<div class="modal fade" id="lapdipInfoModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-map"></i>Lapdip Information
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="form-body">
                            <fieldset>

                                <div class="form-group">
                                    <div class="">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">PO NO</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="labdip[po_no]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Color Name </label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="last_name" name="labdip[colorName]" placeholder="PO Quantity" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Request Date </label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="labdip[requestDate]" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Target Delivery Date</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input data-toggle="modal" data-target="#" id="colorField" name="labdip[targetDeliveryDate]" placeholder="Color Name" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>

                                        {{--<div class="col-lg-4 col-sm-4">
                                            <input id="btn_add" name="labdip[btn_add]" type="button" class="btn btn-primary" value="Add"  onClick="fnc_prj_form_submit_info()"/>
                                            <span class="text-danger"></span>
                                        </div>--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Ex-Factory Date</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="labdip[exFactoryDate]" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Status</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="labdip[status]" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Approval /Rejection Date</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="labdip[approvalOrRejectionDate]" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Reason for Rejection</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <select name="labdip[reasonForRejection]" class="form-control" id="RejectionStatus">

                                                <option value="0" selected="">--Select--</option>
                                                <option value="1">Supplier's Mistakes</option>
                                                <option value="2">Buyer/UK Technologist Changing Colour Standards</option>

                                            </select>

                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Labdip Ref </label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="labdip[labdipRef]" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Courier Details</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="labdip[courierDetails]" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Comment</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="labdip[comment]" placeholder="" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                                        <input id="btn_add" name="labdip[btn_add]" type="button" class="btn btn-primary" value="Save" onClick="fnc_prj_form_submit_info()"/>
                                        <input id="btn_cancel" name="labdip[btn_cancel]" type="reset"  class="btn btn-danger" value="Reset Field" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="labdipTable">

                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>