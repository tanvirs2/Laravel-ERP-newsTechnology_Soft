<!-- Modal -->
<div class="modal fade" id="fabricInfoModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-map"></i>Fabric Information
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Garments Item</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[garmentsItem]" placeholder="" value="{{Input::old('accountName')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Body Part</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[bodyPart]" placeholder="" value="{{Input::old('accountNumber')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Fab Nature</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[fabNature]" placeholder="" value="{{Input::old('bank')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Color Type</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[ColorType]" placeholder="" value="{{Input::old('ifsc')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Fabric Description</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[FabricDescription]" placeholder="" value="{{Input::old('pan')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Fabric Source</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[FabricSource]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Width/Dia Type</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[DiaType]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">GSM/Weight</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[gsm]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Color & Size Sensitive</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[ColorSizeSensitive]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Color</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[Color]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Consumption Basis</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[ConsumptionBasis]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Uom</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[Uom]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Avg. Grey Cons</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[AvgGreyCons]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Rate</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[Rate]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Amount</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input type="text" class="form-control" name="fab[Amount]" value="{{Input::old('branch')}}">
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
                                    <input type="text" class="form-control" name="fab[Status]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="employeeno" class="control-label">Yarn Required(Kg)</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input style="background: #c0392b; color: white" type="text" class="form-control" name="fab[YarnRequired]" value="{{Input::old('branch')}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                                <input id="btn_add" name="fab[btn_add]" type="reset" class="btn btn-primary" value="Save" onClick="fnc_prj_form_submit_info()"/>
                                <input id="btn_cancel" name="fab[btn_cancel]" type="reset"  class="btn btn-danger" value="Reset Field" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="fabTable">

                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>