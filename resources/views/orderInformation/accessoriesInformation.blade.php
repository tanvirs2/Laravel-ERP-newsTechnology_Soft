<!-- Modal -->
<div class="modal fade" id="accessoriesInfoModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-map"></i>Accessories Information
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="form-body">
                            <fieldset>

                                <div class="form-group">
                                    <div class="">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">Item Name </label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="accessories[itemName]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Color Name</label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input data-toggle="modal" data-target="#colorSelectModal" id="colorField" name="accessories[colorName]" placeholder="Color Name" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>

                                        {{--<div class="col-lg-4 col-sm-4">
                                            <input id="btn_add" name="accessories[btn_add]" type="button" class="btn btn-primary" value="Add"  onClick="fnc_prj_form_submit_info()"/>
                                            <span class="text-danger"></span>
                                        </div>--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Request Date </label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="accessories[requestDate]" placeholder="Size Name" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Target Delivery Date </label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="last_name" name="accessories[targetDeliveryDate]" placeholder="PO Quantity" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">Ex-Factory Date</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="accessories[exFactoryDate]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">Status</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="accessories[itemStatus]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">Approval /Rejection Date</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="accessories[itemApprovalDate]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">Courier Details</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="accessories[courierDetails]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">Comment</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="accessories[itemRemark]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                                        <input id="btn_add" name="accessories[btn_add]" type="button" class="btn btn-primary" value="Save" onClick="fnc_prj_form_submit_info()"/>
                                        <input id="btn_cancel" name="accessories[btn_cancel]" type="reset"  class="btn btn-danger" value="Reset Field" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="accessTable">

                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>