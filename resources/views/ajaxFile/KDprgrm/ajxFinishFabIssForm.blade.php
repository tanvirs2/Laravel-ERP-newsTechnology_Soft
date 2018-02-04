<form id="prCreate" action="{{ route('finisFabIss.store') }}" method="POST"
      class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
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
                        <span id="orderDetails">
                                <div class="form-group">
                                    <label id="" class="col-md-3 control-label">Date <span
                                                class="required">* </span></label>
                                    <div class="col-md-9">
                                        <input type="hidden" name="finiFabR[orderId]" value="{{ $orderId }}">
                                        <input type="hidden" name="finiFabR[kdPrgrmId]" value="{{ $kdPrgrmId }}">
                                        <input type="hidden" name="finiFabR[colorId]" value="{{ $colorId }}">
                                        <input type="text" class="dPick form-control"
                                               name="finiFabR[date]" placeholder="" autocomplete="off"
                                               id="">
                                        <p id="alreadyReg"
                                           class="text-center text-danger"><b></b></p>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Finish Fabric Issue</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"
                                               name="finiFabR[finiFabIssue]" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Supplier</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="finiFabR[remarks]"
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">
                                        <button id="" type="submit"
                                                data-loading-text="Submitting..."
                                                class="demo-loading-btn btn green">
                                            <i class="fa fa-plus"></i>	Save
                                        </button>
                                    </div>
                                </div>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    $(document).ready(function () {
        $(".myAjaxModalChild ").on('hidden.bs.modal', function () {
            $('[href="{{ url('ajxColor') }}"]').val(clrLib.clrName);
            $('[name="finiFabR[colorId]"]').val(clrLib.clrId);
        });


        var kdQty = parseInt(prevKdEntryQty);
        $('[name="finiFabR[finiFabIssue]"]').change(function () {
            kdQty += parseInt($(this).val());
        });

        $('[type="submit"]').click(function (e) {
            if (parseInt(kdEntryQty) >= parseInt(kdQty)) {
                $('[action="{{ route('finisFabIss.store') }}"]').ajaxForm({
                    success:function () {
                        swal({
                            title:"Good job!",
                            text:"Updated",
                            type:"success"
                        });
                        $(".myAjaxModal").modal('hide');
                    }
                });
            } else {
                e.preventDefault();
                swal({
                    title:"Error",
                    text:"Qty Mismatch",
                    type:"error"
                });
            }
        });
    });
</script>