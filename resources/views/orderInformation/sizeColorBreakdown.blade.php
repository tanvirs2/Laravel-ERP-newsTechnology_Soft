<!-- Modal -->
<div class="modal fade" id="myModalS" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-map"></i>Size & Color Breakdown Details
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
                                            <input id="first_name" name="si[po_no]" placeholder="PO No" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">PO Quantity </label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="last_name" name="si[poQuantity]" placeholder="PO Quantity" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Size Name </label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input id="last_name" name="si[size_name]" placeholder="Size Name" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="employeename" class="control-label">Color Name </label>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <input data-toggle="modal" data-target="#colorSelectModal" id="colorField" name="si[color_name]" placeholder="Color Name" type="text" class="form-control"  value="" />
                                            <span class="text-danger"></span>
                                        </div>

                                        {{--<div class="col-lg-4 col-sm-4">
                                            <input id="btn_add" name="si[btn_add]" type="button" class="btn btn-primary" value="Add"  onClick="fnc_prj_form_submit_info()"/>
                                            <span class="text-danger"></span>
                                        </div>--}}
                                    </div>
                                </div>






                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                                        <input id="btn_add" name="si[btn_add]" type="reset" class="btn btn-primary" value="Save" onClick="fnc_prj_form_submit_info()"/>
                                        <input id="btn_cancel" name="si[btn_cancel]" type="reset"  class="btn btn-danger" value="Reset Field" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="siTable">

                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>