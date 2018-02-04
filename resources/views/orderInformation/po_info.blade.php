<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-map"></i>PO Details
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="form-body">

                            <fieldset>

                                <div class="form-group">
                                    <div class="colbox">

                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeeno" class="control-label">PO No</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="first_name" name="po[po_no]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">PO Received Date</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="last_name" name="po[po_received_date]" placeholder="PO Received Date" type="text" class="form-control dPick"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">PO Quantity </label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="po_quantity" name="po[po_quantity]" placeholder="PO Quantity" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Cutting % </label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="last_name" name="po[cutting_per]" placeholder="Cutting %" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Fabric Received Date</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="fabric_received_date" name="po[fabric_received_date]" placeholder="" type="text" class="form-control dPick"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Actual Shipment Date</label>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <input class="form-control dPick" name="po[shipment_date]"  value="" type="text"> <span class="input-group-btn"></span>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                 <span>
                                    <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Est Shipment Date</label>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <input class="form-control dPick" name="po[est_shipment_date]"  value="" type="text">
                                            <span class="input-group-btn"></span>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                 <span>
                                    <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Description</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <textarea class="form-control" name="po[Description]" rows="3"></textarea>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">

                                        <input id="btn_add" name="po[btn_add]" type="reset" class="btn btn-primary" value="Save"  />
                                        <input id="btn_cancel" name="po[btn_cancel]" type="reset"  class="btn btn-danger" value="Cancel" />
                                    </div>
                                </div>
                            </fieldset>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="poTable">

                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

