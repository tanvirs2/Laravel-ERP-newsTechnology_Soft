<div class="child-wrap">

    <div style="" class="modal-body">

        <div class="portlet box purple-wisteria">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Knit Dyeing Details
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Buyer Name</th>
                        <th>Order No</th>
                        <th>Style</th>
                        <th>Order Qty</th>
                        <th>Ship Date</th>
                    </tr>
                    <tr>
                        <td class="modalBuyerName">{{ $orderData->customer_name }}</td>
                        <td class="modalOrderNo">{{ $orderData->orderID }}</td>
                        <td class="modalStyleDesc">{{ $orderData->article_no }}</td>
                        <td class="modalOrderQty">{{ $orderData->order_quantity }}</td>
                        <td class="modalShipDate">{{ $orderData->date_of_ship }}</td>
                    </tr>
                </table>
                <hr>
                <form action="{{ route('knitDyingProg.update', $orderData->Id) }}" id="kdPEdit" method="POST" class="">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row ">
                        <div class="">
                            <div class="form-body">
                                <span id="">
                                    <input type="hidden" class="form-control" name="KD[order_id]" value="{{ $orderData->Id }}">

                                    <div class="form-group">
                                            <label id="" class="col-md-3 control-label">Date <span
                                                        class="required">* </span></label>
                                            <div class="col-md-9">

                                                <input type="text" class="form-control" name=""
                                                       readonly autocomplete="off"
                                                       value="{{ $kdHeadData->date }}">
                                                <p id="" class="text-center text-danger"><b></b><br></p>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">BODY/SLV FABRICATION<span
                                                    class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   name="KD[bodyOrSlvDesc]" placeholder="" value="{{ $kdHeadData->bodyOrSlvDesc }}">
                                            <input type="hidden" class="form-control subConNm" name="">
                                            <p id="" class="text-center text-danger"><b></b><br></p>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">INSERTER/RIB FABRICATION<span
                                                    class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   name="KD[inserterRibDesc]" placeholder="" value="{{ $kdHeadData->inserterRibDesc }}">
                                            <input type="hidden" class="form-control subConNm" name="">
                                            <p id="" class="text-center text-danger"><b></b> <br> </p>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">NeckTape<span
                                                    class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   name="KD[neckTapeDesc]" placeholder="" value="{{ $kdHeadData->neckTapeDesc }}">
                                            <input type="hidden" class="form-control subConNm" name="">
                                            <p id="" class="text-center text-danger"><b></b></p>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ColorConsumption<span
                                                    class="required">* </span></label>
                                        <div class="col-md-9">
                                            <table id="" class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>

                                                    </th>
                                                    <th>Color</th>
                                                    <th>Body/SlvFini</th>
                                                    <th>BdySlvPrcsLs(%)</th>
                                                    <th>Rib Finish</th>
                                                    <th>RibFnPrcsLs(%)</th>
                                                    <th>NeckTapeFini</th>
                                                    <th>NkTpPrcsLs(%)</th>
                                                </tr>
                                                @foreach($KdConsumption as $consumption)
                                                    <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" size="8"
                                                               href="{{ url('ajxColor') }}"
                                                               fxd-clr-name="{{ $consumption->colorName->color_name }}"
                                                               modalTitle=""
                                                               data-toggle="modal"
                                                               data-target=".myAjaxModalChild"
                                                               data-remote="false"
                                                               readonly
                                                               value="{{ $consumption->colorName->color_name }}">

                                                        <input type="hidden" name="consump[colorID][]" readonly size="8" value="{{ $consumption->colorID }}">

                                                        <input type="hidden" size="8" readonly name="consump[id][]" value="{{ $consumption->id }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               name="consump[bodyOrSlvFini][]" value="{{ $consumption->bodyOrSlvFini }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               name="consump[bodyOrSlvFini_ProcessLs][]" value="{{ $consumption->bodyOrSlvFini_ProcessLs }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               name="consump[ribFinish][]" value="{{ $consumption->ribFinish }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               name="consump[ribFinish_ProcessLs][]" value="{{ $consumption->ribFinish_ProcessLs }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               name="consump[neckTapeFini][]" value="{{ $consumption->neckTapeFini }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               name="consump[neckTapeFini_ProcessLs][]" value="{{ $consumption->neckTapeFini_ProcessLs }}">
                                                    </td>

                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <p id="" class="text-center text-danger"><b></b></p>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ColorSizeFabric<span
                                                    class="required">* </span></label>
                                        <div class="col-md-9">
                                            <table id="" class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Fab Qty</th>
                                                </tr>
                                                @foreach($KdColorSizeFabricQty as $colorSizeFabric)
                                                    <tr>

                                                    <td>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" size="8" name="clrSzFb[id][]" readonly value="{{ $colorSizeFabric->id }}">

                                                        <input class="clrSzFb-clrName"
                                                               fxd-clr-name="{{ $colorSizeFabric->colorName->color_name }}"
                                                               type="text"
                                                               size="8"
                                                               disabled
                                                               value="{{ $colorSizeFabric->colorName->color_name }}">

                                                        <input type="hidden" size="8"
                                                           name="clrSzFb[colorID][]" readonly value="{{ $colorSizeFabric->colorID }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               href="{{ url('ajxSize') }}"
                                                               modalTitle=""
                                                               data-toggle="modal"
                                                               data-target=".myAjaxModalChild"
                                                               data-remote="false"
                                                               readonly
                                                               value="{{ $colorSizeFabric->sizeName->size_name }}">
                                                        <input type="hidden" size="6"
                                                               readonly
                                                               name="clrSzFb[sizeID][]" value="{{ $colorSizeFabric->sizeID }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" size="6"
                                                               name="clrSzFb[fabQty][]" value="{{ $colorSizeFabric->fabQty }}">
                                                    </td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <p id="" class="text-center text-danger"><b></b></p>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">YrnRqrdSummry<span
                                                    class="required">* </span></label>
                                        <div class="col-md-9">
                                            <table id="" class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>

                                                    </th>
                                                    <th>YrnDesc</th>
                                                    <th>Qty</th>
                                                    <th>Comments</th>
                                                </tr>
                                                @foreach($kdPrgrmYrnInfo as $YrnInfo)
                                                    <tr>

                                                    <td></td>
                                                    <td>
                                                        <input type="hidden" size="8" readonly name="kdYrn[id][]" value="{{ $YrnInfo->id }}">
                                                        <input type="text" size="8" name="kdYrn[yrnDesc][]" value="{{ $YrnInfo->yrnDesc }}">
                                                    </td>
                                                    <td><input type="text" size="6"
                                                               name="kdYrn[yrnQty][]" value="{{ $YrnInfo->yrnQty }}"></td>
                                                    <td><input type="text" size="6"
                                                               name="kdYrn[cmnt][]" value="{{ $YrnInfo->cmnt }}"></td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            <p id="" class="text-center text-danger"><b></b></p>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                                            <button type="button" id="svBtn" class="backward btn btn-primary btn-circle"> <i class="fa fa-chevron-left"></i> Return Page</button>
                                            <button type="submit" class="btn btn-circle"> <i class="fa fa-plus"></i> Update</button>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade myAjaxModalChild" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div style="display: none" class="modal-footer" myModalFooter>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(".myAjaxModalChild").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        var modalTitle = link.attr("modalTitle");
        var objModal = $(this);
        $.ajax({
            url: link.attr("href"),
            global: false,
            success: function (data) {
                objModal.find(".modal-title").html(modalTitle);
                objModal.find(".modal-body").html(data);
            }
        });
    });

    var ajxColor;
    $('[href="{{ url('ajxColor') }}"]').each(function () {
        $(this).click(function () {
            ajxColor = $(this);
        });
    });

    var ajxSize;
    $('[href="{{ url('ajxSize') }}"]').each(function () {
        $(this).click(function () {
            ajxSize = $(this);
        });
    });


    $(".myAjaxModalChild").on('hidden.bs.modal', function () {

        if (ajxSize != null) {
            ajxSize.val(szLib.szName);
            ajxSize.parent().children('[name="clrSzFb[sizeID][]"]').val(szLib.szId);
        }

        $(".clrSzFb-clrName").each(function () {
            if ($(this).attr("fxd-clr-name") == ajxColor.attr("fxd-clr-name")) {
                ajxColor.val(clrLib.clrName);
                ajxColor.parent().children('[name="consump[colorID][]"]').val(clrLib.clrId);
                $(this).parent().children('[name="clrSzFb[colorID][]"]').val(clrLib.clrId);
                $(this).val(clrLib.clrName);
            }
        });

    });

</script>