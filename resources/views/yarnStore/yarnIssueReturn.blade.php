@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">

                <div class="box-body">
                    <div class="page-content" style="min-height:602px">


                        <!-- BEGIN PAGE HEADER-->
                        <h3 class="page-title">
                            Yarn Receive
                            <small>Yarn Receive</small>
                        </h3>
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="/hrm_demo/admin/dashboard">Home</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                    <a href="/hrm_demo/admin/Yarn Receive">Yarn Receive</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>

                                </li>
                            </ul>

                        </div>
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN PAGE CONTENT-->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div id="load">


                                </div>

                                <hr>
                                <div class="portlet box blue">

                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-street-view"></i>Yarn Receive
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>

                                    <div class="portlet-body">

                                        <div id="sample_employees_wrapper" class="dataTables_wrapper no-footer">
                                            <div class="table-scrollable">

                                                <div style="width:100%;">
                                                    <table width="100%" cellspacing="2" cellpadding="0" align="center">
                                                        <tbody><tr>
                                                            <td width="80%" valign="top" align="center">
                                                                <fieldset style="width:1000px;">
                                                                    <legend>Yarn Issue Return</legend>
                                                                    <br>
                                                                    <fieldset style="width:900px;">
                                                                        <table id="tbl_master" width="900" cellspacing="2" cellpadding="0" border="0">
                                                                            <tbody><tr>
                                                                                <td colspan="3" align="right"><b>Return Number</b></td>
                                                                                <td colspan="3" align="left"><input name="txt_return_no" id="txt_return_no" class="text_boxes" style="width:160px" placeholder="Double Click To Search" ondblclick="open_returnpopup()" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                            </tr>
                                                                            <!--<tr>
                                                                                    <td colspan="6" align="center">&nbsp;</td>
                                                                           </tr>-->
                                                                            <tr>
                                                                                <td class="must_entry_caption" title="Must Entry Field." width="120" align="right"> <font color="blue">Company Name </font></td>
                                                                                <td width="170">
                                                                                    <select name="cbo_company_name" id="cbo_company_name" class="combo_boxes" style="width:170px" onchange="load_drop_down( 'requires/yarn_issue_return_controller', this.value, 'load_drop_down_location', 'location_td' );load_drop_down( 'requires/yarn_issue_return_controller', this.value, 'load_drop_down_store', 'store_td' );">\n<option value="0">-- Select Company --</option>\n<option value="1">JK Knit Composite Ltd.</option>\n<option value="2">Tanima Knit Composite Ltd.</option>\n</select>                                </td>
                                                                                <td class="must_entry_caption" title="Must Entry Field." width="120" align="right"> <font color="blue">Basis</font></td>
                                                                                <td width="160">
                                                                                    <select name="cbo_basis" id="cbo_basis" class="combo_boxes" style="width:170px" onchange="active_inactive(this.value);">\n<option value="0">-- Select Basis --</option>\n<option value="1">Booking</option>\n<option value="2">Independent</option>\n<option value="3">Requisition</option>\n<option value="4">Sales Order</option>\n</select>                                </td>
                                                                                <td width="120" align="right">F. Booking/Reqsn. No</td>
                                                                                <td width="170">
                                                                                    <input name="txt_booking_no" id="txt_booking_no" class="text_boxes" style="width:160px" placeholder="Double Click to Search" ondblclick="popuppage_fabbook();" readonly="" disabled="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: ">
                                                                                    <input name="txt_booking_id" id="txt_booking_id" type="hidden">
                                                                                    <input name="booking_without_order" id="booking_without_order" type="hidden">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="130" align="right">Location</td>
                                                                                <td id="location_td" width="170"><select name="cbo_location" id="cbo_location" class="combo_boxes" style="width:170px" onchange="">\n<option value="0">-- Select Location --</option>\n</select></td>
                                                                                <td width="94" align="right">Return Source</td>
                                                                                <td width="160">
                                                                                    <select name="cbo_knitting_source" id="cbo_knitting_source" class="combo_boxes" style="width:170px" onchange="load_drop_down( 'requires/yarn_issue_return_controller', this.value+'**'+$('#cbo_company_name').val(), 'load_drop_down_knit_com', 'knitting_company_td' );">\n<option value="0">-- Select --</option>\n<option value="1">In-house</option>\n<option value="3">Out-bound Subcontract</option>\n</select>                                </td>
                                                                                <td width="130" align="right">Knitting Company</td>
                                                                                <td id="knitting_company_td" width="">
                                                                                    <select name="cbo_knitting_company" id="cbo_knitting_company" class="combo_boxes" style="width:170px" onchange="">\n<option value="0">-- Select --</option>\n</select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="must_entry_caption" title="Must Entry Field." align="right"> <font color="blue">Return Date</font></td>
                                                                                <td><input name="txt_return_date" id="txt_return_date" class="datepicker hasDatepicker" style="width:160px;" placeholder="Select Date" type="text"></td>
                                                                                <td class="must_entry_caption" title="Must Entry Field." align="right"> <font color="blue">Return Challan</font></td>
                                                                                <td><input name="txt_return_challan_no" id="txt_return_challan_no" class="text_boxes" style="width:160px" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                <td align="right">&nbsp;</td>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="right">&nbsp;</td>
                                                                                <td>&nbsp;</td>
                                                                                <td align="right">&nbsp;</td>
                                                                                <td>&nbsp;</td>
                                                                                <td align="right">&nbsp;</td>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </fieldset>
                                                                    <br>
                                                                    <table id="tbl_child" width="96%" cellspacing="1" cellpadding="0">
                                                                        <tbody><tr>
                                                                            <td width="50%" valign="top" align="center">
                                                                                <fieldset style="width:460px; float:left">
                                                                                    <legend>Return Item Info</legend>
                                                                                    <table width="450" cellspacing="2" cellpadding="0" border="0">
                                                                                        <tbody><tr>
                                                                                            <td class="must_entry_caption" title="Must Entry Field." width="110" align="right"> <font color="blue">Item Description&nbsp;</font></td>
                                                                                            <td colspan="3">
                                                                                                <input class="text_boxes" name="txt_item_description" id="txt_item_description" style="width:300px;" placeholder="Double Click To Search" ondblclick="open_itemdesc()" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                                <input id="txt_prod_id" name="txt_prod_id" type="hidden">
                                                                                                <input id="txt_supplier_id" name="txt_supplier_id" type="hidden">
                                                                                                <input id="txt_issue_id" name="txt_issue_id" type="hidden">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td width="110" align="right">Yarn Lot&nbsp;</td>
                                                                                            <td width="158"><input class="text_boxes" name="txt_yarn_lot" id="txt_yarn_lot" style="width:150px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                            <td width="41" align="right">UOM</td>
                                                                                            <td width="131"><select name="cbo_uom" id="cbo_uom" class="combo_boxes" disabled="" style="width:100px" onchange="">\n<option value="0">Display</option>\n<option value="1">Pcs</option>\n<option value="2">Dzn</option>\n<option value="3">Grs</option>\n<option value="4">GG</option>\n<option value="10">Mg</option>\n<option value="11">Gm</option>\n<option value="12">Kg</option>\n<option value="13">Quintal</option>\n<option value="14">Ton</option>\n<option value="15">Lbs</option>\n<option value="20">Km</option>\n<option value="21">Hm</option>\n<option value="22">Dm</option>\n<option value="23">Mtr</option>\n<option value="24">Dcm</option>\n<option value="25">CM</option>\n<option value="26">MM</option>\n<option value="27">Yds</option>\n<option value="28">Feet</option>\n<option value="29">Inch</option>\n<option value="30">CFT</option>\n<option value="31">SFT</option>\n<option value="40">Ltr</option>\n<option value="41">Ml</option>\n<option value="50">Roll</option>\n<option value="51">Coil</option>\n<option value="52">Cone</option>\n<option value="53">Bag</option>\n<option value="54">Box</option>\n<option value="55">Drum</option>\n<option value="56">Bottle</option>\n<option value="57">Pack</option>\n<option value="58">Set</option>\n<option value="59">Can</option>\n<option value="60">Each</option>\n<option value="61">Gallon</option>\n<option value="62">Lachi</option>\n<option value="63">Pair</option>\n<option value="64">Lot</option>\n<option value="65">Packet</option>\n<option value="66">Pot</option>\n<option value="67">Book</option>\n<option value="68">Culind</option>\n<option value="69">Rim</option>\n<option value="70">Cft</option>\n<option value="71">Syp</option>\n<option value="72">K.V</option>\n<option value="73">CU-M3</option>\n<option value="74">Bundle</option>\n<option value="75">Strip</option>\n<option value="76">SQM</option>\n</select></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="must_entry_caption" title="Must Entry Field." width="110" align="right"> <font color="blue">Returned Qnty&nbsp;</font></td>
                                                                                            <td><input class="text_boxes_numeric" name="txt_return_qnty" id="txt_return_qnty" style="width:150px;" placeholder="Double Click To Search" onkeyup="fn_calculateAmount(this.value)" readonly="" ondblclick="openmypage_po()" type="text"></td>
                                                                                            <td width="41" align="right">Store</td>
                                                                                            <td id="store_td"><select name="cbo_store_name" id="cbo_store_name" class="combo_boxes" style="width:100px" onchange="">\n<option value="0">-- Select --</option>\n</select></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td width="110" align="right">Reject Qty&nbsp;</td>
                                                                                            <td colspan="3"><input class="text_boxes_numeric" name="txt_reject_qnty" id="txt_reject_qnty" style="width:150px;" readonly="" type="text"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td width="110" align="right">Remarks&nbsp;</td>
                                                                                            <td colspan="3"><input class="text_boxes" name="txt_remarks" id="txt_remarks" style="width:300px;" placeholder="Entry" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                        </tr>
                                                                                        </tbody></table>
                                                                                </fieldset>
                                                                                <fieldset style="width:460px; float:left; margin-left:5px">
                                                                                    <legend>Display</legend>
                                                                                    <table id="display_table" width="450" cellspacing="2" cellpadding="0" border="0">
                                                                                        <tbody><tr>
                                                                                            <td width="110" align="right">Issue Qnty&nbsp;</td>
                                                                                            <td width="100"><input class="text_boxes" name="txt_issue_qnty" id="txt_issue_qnty" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                            <td width="120" align="right">Rate&nbsp;</td>
                                                                                            <td width="100"><input class="text_boxes" name="txt_rate" id="txt_rate" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right">Total Return&nbsp;</td>
                                                                                            <td>
                                                                                                <input class="text_boxes" name="txt_total_return" id="txt_total_return" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="hidden">
                                                                                                <input class="text_boxes" name="txt_total_return_display" id="txt_total_return_display" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                            </td>
                                                                                            <td align="right">Amount&nbsp;&nbsp;</td>
                                                                                            <td><input class="text_boxes" name="txt_amount" id="txt_amount" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>                               			  </tr>
                                                                                        <tr>
                                                                                            <td align="right">Net Used&nbsp;</td>
                                                                                            <td>
                                                                                                <input class="text_boxes" name="txt_net_used" id="txt_net_used" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                                <input class="text_boxes" name="hide_net_used" id="hide_net_used" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="hidden">
                                                                                                <input class="text_boxes" name="hide_issue_date" id="hide_issue_date" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="hidden">
                                                                                            </td>
                                                                                            <td align="right">Issue Challan No&nbsp;</td>
                                                                                            <td><input class="text_boxes" name="txt_issue_challan_no" id="txt_issue_challan_no" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right">Returnable Qty.</td>
                                                                                            <td><input class="text_boxes" name="txt_returnable_qnty" id="txt_returnable_qnty" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                            <td align="right">Returnable Bl. Qty.</td>
                                                                                            <td><input class="text_boxes" name="txt_returnable_bl_qnty" id="txt_returnable_bl_qnty" style="width:100px;" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right">&nbsp;</td>
                                                                                            <td colspan="2">&nbsp;</td>
                                                                                            <td>&nbsp;</td>
                                                                                        </tr>
                                                                                        </tbody></table>
                                                                                </fieldset>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody></table>
                                                                    <table width="100%" cellspacing="1" cellpadding="0">
                                                                        <tbody><tr>
                                                                            <td colspan="6" align="center"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="6" class="button_container" valign="middle" align="center">
                                                                                <!-- details table id for update -->
                                                                                <input name="save_data" id="save_data" readonly="" type="hidden">
                                                                                <input name="all_po_id" id="all_po_id" readonly="" type="hidden">
                                                                                <input id="distribution_method" readonly="" type="hidden">

                                                                                <input id="before_prod_id" name="before_prod_id" value="" type="hidden">
                                                                                <input id="update_id" name="update_id" value="" type="hidden">
                                                                                <!-- -->
                                                                                <input value="Save" name="save" onclick="fnc_yarn_issue_return_entry(0)" style="width:80px" id="save1" class="formbutton" type="button">&nbsp;&nbsp;<input value="Update" name="update" onclick="show_button_disable_msg(1)" style="width:80px" id="update1" class="formbutton_disabled" type="button">&nbsp;&nbsp;<input value="Delete" name="delete" onclick="show_button_disable_msg(2)" style="width:80px" id="Delete1" class="formbutton_disabled" type="button">&nbsp;&nbsp;<input value="Refresh" name="refresh" onclick="fnResetForm()" style="width:80px" id="Refresh1" class="formbutton" type="button">&nbsp;&nbsp;<br><hr style="height:8px;"><input value="Print" name="print" onclick="show_no_permission_msg(4)" style="width:80px" id="Print1" class="formbutton_disabled" type="button">&nbsp;&nbsp;                        </td>
                                                                        </tr>
                                                                        </tbody></table>
                                                                </fieldset>
                                                                <fieldset style="width:1000px;">
                                                                    <div style="width:990px;" id="list_container_yarn"></div>
                                                                </fieldset>
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                </div>
                                            </div>
                                            <div class="row">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->

                            </div>
                        </div>
                        <!-- END PAGE CONTENT-->

                        <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static"
                             data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true"></button>
                                        <h4 class="modal-title">Confirmation</h4>
                                    </div>
                                    <div class="modal-body" id="info">
                                        <p>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                        <button type="button" data-dismiss="modal" class="btn red" id="delete"><i
                                                    class="fa fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                    <div id="printout"> dhsajdhas</div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>


    <script>

        $('#printMe').click(function(){
            //alert('dsda');
            //console.log($("#printout").printArea());
            //$("#printout").printArea();
        });

        function del(id,name)
        {
            $('#deleteModal').appendTo("body").modal('show');
            $('#info').html('Are you sure ! You want to delete <strong>'+name+'</strong> ??');
            $("#delete").click(function()
            {
                var url = "{{ url('/delete_employee:id') }}";
                idRep = '/'+id;
                url = url.replace(':id',idRep);

                $.ajax({method: "get", url: url, success: function(result){
                    //alert(result);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#deleteModal').modal('hide');
                    $('#row'+id).closest('tr').remove();
                    $('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Successfully Deleted</p>");
                }});

                /*
                 $.ajax({
                 type: "DELETE",
                 url : url,
                 dataType: 'json',
                 data: {"id":id}

                 }).done(function(response)
                 {
                 //console.log(response);

                 if(response.success == "deleted")
                 {
                 $("html, body").animate({ scrollTop: 0 }, "slow");
                 $('#deleteModal').modal('hide');
                 $('#row'+id).closest('tr').remove();
                 $('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Successfully Deleted</p>");
                 }
                 });*/
            })

        }


    </script>


@endsection