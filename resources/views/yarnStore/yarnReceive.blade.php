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

                                                <table width="80%" cellspacing="2" cellpadding="0" align="left">
                                                    <tbody><tr>
                                                        <td width="80%" valign="top" align="center">
                                                            <fieldset style="width:1000px; float:left;">
                                                                
                                                                <fieldset style="width:950px;">
                                                                    <table id="tbl_master" width="950" cellspacing="2" cellpadding="0" border="0">
                                                                        <tbody><tr>
                                                                            <td colspan="6" align="center">&nbsp;<b>MRR Number</b>
                                                                                <input name="txt_mrr_no" id="txt_mrr_no" class="text_boxes" style="width:155px" placeholder="Double Click To Search" ondblclick="open_mrrpopup()" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="130" align="right"> <font color="blue">Company Name </font></td>
                                                                            <td width="170">
                                                                                <select name="cbo_company_name" id="cbo_company_name" class="combo_boxes" style="width: 170px;" onchange="rcv_basis_reset();load_drop_down( 'requires/yarn_receive_controller', this.value, 'load_drop_down_supplier', 'supplier' );load_drop_down( 'requires/yarn_receive_controller', this.value, 'load_drop_down_store', 'store_td' );get_php_form_data(this.value, 'is_allocation_maintained', 'requires/yarn_receive_controller');" disabled="disabled">\n<option value="0">-- Select Company --</option>\n<option value="1">JK Knit Composite Ltd.</option>\n<option value="2">Tanima Knit Composite Ltd.</option>\n</select>                                </td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="94" align="right"> <font color="blue"> Receive Basis </font></td>
                                                                            <td width="160">
                                                                                <select name="cbo_receive_basis" id="cbo_receive_basis" class="combo_boxes" style="width: 170px;" onchange="fn_independent(this.value)">\n<option value="0">- Select Receive Basis -</option>\n<option value="1">PI Based</option>\n<option value="2">WO/Booking Based</option>\n<option value="4">Independent</option>\n</select>                               </td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="130" align="right"> <font color="blue">Receive Purpose</font></td>
                                                                            <td width="170">
                                                                                <select name="cbo_receive_purpose" id="cbo_receive_purpose" class="combo_boxes" style="width:170px" onchange="load_supplier(); rate_cond(this.value);">\n<option value="0">-- Select Purpose --</option>\n<option value="2">Yarn Dyeing</option>\n<option value="5">Loan</option>\n<option value="6">Sample-material</option>\n<option value="15">Twisting</option>\n<option value="16" selected="">Grey Yarn</option>\n</select>                               </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="130" align="right"> <font color="blue">Receive Date </font></td>
                                                                            <td width="170">
                                                                                <input name="txt_receive_date" id="txt_receive_date" class="datepicker hasDatepicker" style="width:158px;" placeholder="Select Date" onchange="exchange_rate(document.getElementById('cbo_currency').value)" type="text">
                                                                            </td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="94" align="right"> <font color="blue"> Challan No </font></td>
                                                                            <td width="160"><input name="txt_challan_no" id="txt_challan_no" class="text_boxes" style="width:158px" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="130" align="right"> <font color="blue">Store Name</font></td>
                                                                            <td id="store_td" width="170">







                                                                                <select name="cbo_store_name" id="cbo_store_name" class="combo_boxes" style="width:170px" onchange="">\n<option value="0">-- Select --</option>\n<option value="1">Yarn Store [JK]</option>\n</select></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="130" align="right">WO / PI</td>
                                                                            <td width="170"><input class="text_boxes" name="txt_wo_pi" id="txt_wo_pi" ondblclick="openmypage('xx','Order Search')" placeholder="Double Click" style="width:158px;" readonly="" disabled="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                <input id="txt_wo_pi_id" name="txt_wo_pi_id" value="1" type="hidden"></td>
                                                                            <td class="must_entry_caption" id="supplier_td" title="Must Entry Field." width="94" align="right"> <font color="blue"> Supplier </font></td>
                                                                            <td id="supplier" width="160">







                                                                                <select name="cbo_supplier" id="cbo_supplier" class="combo_boxes" style="width:170px" onchange="" disabled="disabled">\n<option value="0">-- Select --</option>\n<option value="17">Aa Synthetic Fibres Ltd.</option>\n<option value="382">Acepora</option>\n<option value="188">Akhi Traders</option>\n<option value="363">Akij Textile Mills Ltd.</option>\n<option value="26">Al-Razee Spinning Mills Ltd.</option>\n<option value="365">Anlima Yarn Dyeing Ltd.</option>\n<option value="183">Antim Knitting Dyeing And Finishing Ltd.</option>\n<option value="46">Apex Yarn Dyeing Ltd.</option>\n<option value="384">Arif Knitspin</option>\n<option value="19">Badsha Textiles Ltd.</option>\n<option value="360">Bros Macao</option>\n<option value="387">CHINA</option>\n<option value="22">Chenab Textile Mills</option>\n<option value="11">Colour Thread</option>\n<option value="12">Crc Textile Mills Ltd.</option>\n<option value="383">Creora</option>\n<option value="385">Delta</option>\n<option value="362">Divine Fabrics Ltd. [Yarn Dyeing Unit]</option>\n<option value="389">Envoy Textile</option>\n<option value="366">FM Yarn Dyeing Ltd.</option>\n<option value="175">Fajusaha Trading</option>\n<option value="179">Fotrust Co Ltd.</option>\n<option value="370">HA-MEEM SPINNING MILLS LTD</option>\n<option value="375">Hina/Wenshan</option>\n<option value="16">Huafu Macao Commercial Offshore Ltd</option>\n<option value="386">INDIA</option>\n<option value="25">Israq Spinning Mills Ltd.</option>\n<option value="135">JK Cotton Mills Ltd.</option>\n<option value="348">JK Knit Composite Ltd.</option>\n<option value="3">JK Spinning Mills Ltd.</option>\n<option value="4">JK Synthetic Mills Ltd.</option>\n<option value="24">Jaba Textile Mills Ltd.</option>\n<option value="7">Jamuna Spinning  Mills  Ltd</option>\n<option value="186">Kader Synthetic Fabrics Limited</option>\n<option value="379">Karnafuli</option>\n<option value="378">Karotoa Spinning</option>\n<option value="1">Knit Plus Ltd.</option>\n<option value="393">Kongkiat Textile Co. Ltd.</option>\n<option value="371">LK Unitex Company Limited</option>\n<option value="21">Lotus Integrated Texpark Limited</option>\n<option value="224">M/S M.M and Sons</option>\n<option value="14">Malek Spinning Mills Ltd</option>\n<option value="374">Matin Spinning Mills Limited</option>\n<option value="23">Mother Textile Mills Ltd.</option>\n<option value="10">N.Z. Textile Ltd.</option>\n<option value="18">Nagreeka Exporters Limited</option>\n<option value="380">New Star</option>\n<option value="376">Nupur</option>\n<option value="364">Paramount Textile Ltd.</option>\n<option value="182">Prime Composite Mills Ltd.</option>\n<option value="184">Prime Textile Spinning Mills Ltd</option>\n<option value="20">R.S.W.M Ltd.</option>\n<option value="359">SUTLEJ</option>\n<option value="185">Sameem Spinning Mills Ltd</option>\n<option value="377">Shetu</option>\n<option value="181">Shohagpur Textile Mills Ltd.</option>\n<option value="6">Square Textile/Yarns Ltd.</option>\n<option value="15">Taekwang Synthetic Fiber [Chemical]Co Ltd.</option>\n<option value="144">Tara Spinning Mills Ltd</option>\n<option value="381">Texlon</option>\n<option value="5">The Miracle Accessories Ltd.</option>\n<option value="9">Thermax Melange Spinning Mills Ltd.</option>\n<option value="8">Twice Poly Bag and Thread Ind. Ltd.</option>\n<option value="388">Unitex</option>\n<option value="361">YIP TAI INVESTMENT LIMITED</option>\n<option value="13">Zarina Composite Textile</option>\n</select></td>
                                                                            <td id="loanParty_td" style="color: black;" width="94" align="right"> Loan Party </td>
                                                                            <td id="loanParty" width="160">
                                                                                <select name="cbo_party" id="cbo_party" class="combo_boxes" disabled="disabled" style="width:170px" onchange="">\n<option value="0">--- Select Party ---</option>\n</select>                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="130" align="right"> <font color="blue">Currency</font></td>
                                                                            <td id="currency" width="170">
                                                                                <select name="cbo_currency" id="cbo_currency" class="combo_boxes" disabled="disabled" style="width:170px" onchange="exchange_rate(this.value)">\n<option value="0">-- Select Currency --</option>\n<option value="1">Taka</option>\n<option value="2">USD</option>\n<option value="3">EURO</option>\n<option value="4">CHF</option>\n<option value="5">SGD</option>\n<option value="6">Pound</option>\n</select>                                </td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="130" align="right"> <font color="blue">Exchange Rate</font></td>
                                                                            <td width="170">
                                                                                <input name="txt_exchange_rate" id="txt_exchange_rate" class="text_boxes_numeric" style="width:158px" onblur="fn_calile()" disabled="" type="text">
                                                                            </td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="94" align="right"> <font color="blue">Source</font></td>
                                                                            <td id="sources" width="160">
                                                                                <select name="cbo_source" id="cbo_source" class="combo_boxes" disabled="disabled" style="width:170px" onchange="">\n<option value="0">-- Select --</option>\n<option value="1">Abroad</option>\n<option value="2">EPZ</option>\n<option value="3">Non-EPZ</option>\n</select>                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="130" align="right"> L/C No </td>
                                                                            <td id="lc_no" width="170">
                                                                                <input class="text_boxes" name="txt_lc_no" id="txt_lc_no" style="width:158px;" placeholder="Display" ondblclick="popuppage_lc()" readonly="" disabled="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                <input name="hidden_lc_id" id="hidden_lc_id" type="hidden">
                                                                            </td>
                                                                            <td width="94" align="right">Issue Challan No.</td>
                                                                            <td id="sources" width="160">
                                                                                <input name="txt_issue_challan_no" id="txt_issue_challan_no" class="text_boxes" style="width:158px" ondblclick="openpage_challan();" placeholder="Double Click To Search" disabled="disabled" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                <input id="txt_issue_id" name="txt_issue_id" value="" type="hidden">
                                                                            </td>
                                                                            <td align="right">Remarks</td>
                                                                            <td><input id="txt_mst_remarks" name="txt_mst_remarks" class="text_boxes" style="width:160px" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>

                                                                        </tr>
                                                                        </tbody></table>
                                                                </fieldset>
                                                                <br>
                                                                <table id="tbl_child" width="96%" cellspacing="1" cellpadding="0">
                                                                    <tbody><tr>
                                                                        <td width="49%" valign="top">
                                                                            <fieldset style="width:950px;">
                                                                                <legend>New Receive Item</legend>
                                                                                <table style="float:left" width="220" cellspacing="2" cellpadding="0" border="0">
                                                                                    <tbody><tr>
                                                                                        <td class="must_entry_caption" title="Must Entry Field." width="100" align="right"> <font color="blue">Yarn Count</font></td>
                                                                                        <td width="150">
                                                                                            <select name="cbo_yarn_count" id="cbo_yarn_count" class="combo_boxes" style="width:130px" onchange="">\n<option value="0">--Select--</option>\n<option value="18">10/1</option>\n<option value="41">100/D</option>\n<option value="45">100D/36F</option>\n<option value="42">100D/72F</option>\n<option value="19">12/1</option>\n<option value="23">150/D</option>\n<option value="40">150D/144F</option>\n<option value="39">150D/96F</option>\n<option value="20">16/1</option>\n<option value="3">18/1</option>\n<option value="4">20/1</option>\n<option value="26">20/D</option>\n<option value="35">200/D</option>\n<option value="6">22/1</option>\n<option value="7">24/1</option>\n<option value="30">24/2</option>\n<option value="8">26/1</option>\n<option value="9">28/1</option>\n<option value="10">30/1</option>\n<option value="27">30/D</option>\n<option value="12">32/1</option>\n<option value="14">34/1</option>\n<option value="21">36/1</option>\n<option value="17">40/1</option>\n<option value="33">40/2</option>\n<option value="28">40/D</option>\n<option value="22">45/1</option>\n<option value="24">50/D</option>\n<option value="38">50D/36F</option>\n<option value="29">70/D</option>\n<option value="25">75/D</option>\n<option value="37">75D/36F</option>\n<option value="44">75D/72F</option>\n<option value="31">8/1</option>\n<option value="34">80/D</option>\n<option value="32">90/2</option>\n<option value="36">90/D</option>\n</select>                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Composition</td>
                                                                                        <td id="composition_td">
                                                                                            <select name="cbocomposition1" id="cbocomposition1" class="combo_boxes" style="width:80px" onchange="">\n<option value="0">-- Select --</option>\n<option value="41">CVC Slub-[60% 40%]</option>\n<option value="8">CVC [ 97%  Neps 03%]</option>\n<option value="58">CVC [ Ctn52%-Poly48%]</option>\n<option value="48">CVC [Ctn 55%, Poly 45%]</option>\n<option value="62">CVC [Ctn 65%-Poly 35%]</option>\n<option value="5">CVC [Ctn 80%-Poly20%]</option>\n<option value="45">CVC [Ctn 85%, Poly 15%]</option>\n<option value="57">CVC [Ctn 93%- Poly 7%]</option>\n<option value="60">CVC [Ctn 95%-Poly 5%]</option>\n<option value="4">CVC [Ctn 97%-Poly 3%]</option>\n<option value="59">CVC [Ctn60%,Poly35%,Vis5%]</option>\n<option value="38">CVC [Ctn60%-Poly40%]</option>\n<option value="40">CVC-[60% Org C 40%P]</option>\n<option value="7">CVC-[98.5% - 1.5%-Neps]</option>\n<option value="1">Cotton</option>\n<option value="2">Cotton Melange</option>\n<option value="36">Cotton Slub</option>\n<option value="3">Cotton-Antim</option>\n<option value="43">D-Normal-100% Polyester</option>\n<option value="31">Ecru. Melange [Ctn 98%-Vis 2%]</option>\n<option value="55">Ecru. Melange [Ctn 98.5%-Vis 1.5%]</option>\n<option value="32">Ecru. Melange [Ctn 99%-Vis 1%]</option>\n<option value="13">Ecru. Melange-[Ctn99.5% Vis 0.5%]</option>\n<option value="29">Elastane</option>\n<option value="35">G.Melange [Ctn 90%-Vis 10%]</option>\n<option value="37">G.Melange [Ctn 93%-Vis 7%]</option>\n<option value="34">G.Melange [Ctn 95%-Vis 5%]</option>\n<option value="15">G.Melange [Ctn70%-Vis30%]</option>\n<option value="19">G.Melange [Ctn80%-Vis20%]</option>\n<option value="17">G.Melange [Ctn92.5%-Vis7.5%]</option>\n<option value="12">G.Melange [Ctn97%-Vis3%]</option>\n<option value="18">G.Melange-Slub-[90% 10%]</option>\n<option value="16">G.Melange-[75% 25%]</option>\n<option value="46">G.Melange-[Ctn 85% Vis 15%]</option>\n<option value="44">Inject yarn-[98.5%:1.5%]</option>\n<option value="56">Lurex</option>\n<option value="21">Lylon</option>\n<option value="51">Modal 30% - Cotton 30% VIscose 25% Organic 15%</option>\n<option value="23">Modal Yarn-[100%Modal]</option>\n<option value="22">Modal Yarn-[50%M 50%C]</option>\n<option value="28">Neps [Poly90%-Linen10%]</option>\n<option value="20">Normal-100% Polyester</option>\n<option value="30">Organic Cotton</option>\n<option value="49">PC</option>\n<option value="39">PC [ Polyrster 60% - Cotton 40%]</option>\n<option value="25">PC [Poly 65% - Ctn 35%]</option>\n<option value="26">PV-[65%P 35%V]</option>\n<option value="47">Polyester</option>\n<option value="53">Polyester 50%-Coolmax 50%</option>\n<option value="54">Siro [Ctn 60%-Poly40%]</option>\n<option value="9">Slub - [60% 40%]</option>\n<option value="14">Slub Melange-[99% 01%]</option>\n<option value="27">Slub Yarn</option>\n<option value="24">Span Polyester</option>\n</select><input id="percentage1" name="percentage1" class="text_boxes_numeric" style="width:40px" placeholder="%" value="100" onblur="control_composition('percent_one')" type="text"><select name="cbocomposition2" id="cbocomposition2" class="combo_boxes" disabled="" style="width:80px" onchange="">\n<option value="0">-- Select --</option>\n<option value="41">CVC Slub-[60% 40%]</option>\n<option value="8">CVC [ 97%  Neps 03%]</option>\n<option value="58">CVC [ Ctn52%-Poly48%]</option>\n<option value="48">CVC [Ctn 55%, Poly 45%]</option>\n<option value="62">CVC [Ctn 65%-Poly 35%]</option>\n<option value="5">CVC [Ctn 80%-Poly20%]</option>\n<option value="45">CVC [Ctn 85%, Poly 15%]</option>\n<option value="57">CVC [Ctn 93%- Poly 7%]</option>\n<option value="60">CVC [Ctn 95%-Poly 5%]</option>\n<option value="4">CVC [Ctn 97%-Poly 3%]</option>\n<option value="59">CVC [Ctn60%,Poly35%,Vis5%]</option>\n<option value="38">CVC [Ctn60%-Poly40%]</option>\n<option value="40">CVC-[60% Org C 40%P]</option>\n<option value="7">CVC-[98.5% - 1.5%-Neps]</option>\n<option value="1">Cotton</option>\n<option value="2">Cotton Melange</option>\n<option value="36">Cotton Slub</option>\n<option value="3">Cotton-Antim</option>\n<option value="43">D-Normal-100% Polyester</option>\n<option value="31">Ecru. Melange [Ctn 98%-Vis 2%]</option>\n<option value="55">Ecru. Melange [Ctn 98.5%-Vis 1.5%]</option>\n<option value="32">Ecru. Melange [Ctn 99%-Vis 1%]</option>\n<option value="13">Ecru. Melange-[Ctn99.5% Vis 0.5%]</option>\n<option value="29">Elastane</option>\n<option value="35">G.Melange [Ctn 90%-Vis 10%]</option>\n<option value="37">G.Melange [Ctn 93%-Vis 7%]</option>\n<option value="34">G.Melange [Ctn 95%-Vis 5%]</option>\n<option value="15">G.Melange [Ctn70%-Vis30%]</option>\n<option value="19">G.Melange [Ctn80%-Vis20%]</option>\n<option value="17">G.Melange [Ctn92.5%-Vis7.5%]</option>\n<option value="12">G.Melange [Ctn97%-Vis3%]</option>\n<option value="18">G.Melange-Slub-[90% 10%]</option>\n<option value="16">G.Melange-[75% 25%]</option>\n<option value="46">G.Melange-[Ctn 85% Vis 15%]</option>\n<option value="44">Inject yarn-[98.5%:1.5%]</option>\n<option value="56">Lurex</option>\n<option value="21">Lylon</option>\n<option value="51">Modal 30% - Cotton 30% VIscose 25% Organic 15%</option>\n<option value="23">Modal Yarn-[100%Modal]</option>\n<option value="22">Modal Yarn-[50%M 50%C]</option>\n<option value="28">Neps [Poly90%-Linen10%]</option>\n<option value="20">Normal-100% Polyester</option>\n<option value="30">Organic Cotton</option>\n<option value="49">PC</option>\n<option value="39">PC [ Polyrster 60% - Cotton 40%]</option>\n<option value="25">PC [Poly 65% - Ctn 35%]</option>\n<option value="26">PV-[65%P 35%V]</option>\n<option value="47">Polyester</option>\n<option value="53">Polyester 50%-Coolmax 50%</option>\n<option value="54">Siro [Ctn 60%-Poly40%]</option>\n<option value="9">Slub - [60% 40%]</option>\n<option value="14">Slub Melange-[99% 01%]</option>\n<option value="27">Slub Yarn</option>\n<option value="24">Span Polyester</option>\n</select><input id="percentage2" name="percentage2" class="text_boxes_numeric" style="width:40px" disabled="" type="text">
                                                                                            <!--script>load_drop_down( 'requires/yarn_receive_controller', '', 'load_drop_down_composition', 'composition_td' );</script-->
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="must_entry_caption" title="Must Entry Field." align="right"> <font color="blue">Yarn Type</font></td>
                                                                                        <td>
                                                                                            <select name="cbo_yarn_type" id="cbo_yarn_type" class="combo_boxes" style="width:130px" onchange="">\n<option value="0">--Select--</option>\n<option value="1">Carded</option>\n<option value="2">Combed</option>\n<option value="3">Compact</option>\n<option value="4">Polyster</option>\n<option value="5">CVC</option>\n<option value="6">PC</option>\n<option value="7">Melange</option>\n<option value="8">Micro Poly</option>\n<option value="9">Rottor</option>\n<option value="10">Slub</option>\n<option value="11">Spandex</option>\n<option value="12">Viscose</option>\n<option value="13">Modal Cotton</option>\n<option value="14">BCI</option>\n<option value="15">Modal</option>\n<option value="16">Semi Combed</option>\n<option value="17">Special</option>\n<option value="18">Cotton Linen</option>\n<option value="19">Pima</option>\n<option value="20">Su-Pima</option>\n<option value="21">Lurex</option>\n<option value="22">PV</option>\n<option value="23">Tencel</option>\n<option value="24">Excel/Linen</option>\n<option value="25">CV</option>\n<option value="26">CVC Slub</option>\n<option value="27">Pmax</option>\n<option value="28">Mercerize</option>\n<option value="29">Organic</option>\n<option value="30">Twist</option>\n<option value="31">Melange Slub</option>\n<option value="32">Melange Neps</option>\n<option value="33">Neps</option>\n<option value="34">Ctn Melange</option>\n<option value="35">Inject</option>\n<option value="36">Cotton Lurex</option>\n<option value="37">Melange Lurex</option>\n<option value="38">Viscos/Linen</option>\n<option value="39">Vortex</option>\n<option value="40">Polyester/Linen</option>\n<option value="41">CB Slub</option>\n<option value="42">PC Slub</option>\n<option value="43">Carded Slub</option>\n<option value="44">Org-Melange</option>\n<option value="45">PVC</option>\n<option value="46">Acrylic</option>\n<option value="47">Spun</option>\n<option value="48">Viscose-Wool</option>\n<option value="49">Linen-Tencel</option>\n<option value="50">Viscose Melange</option>\n<option value="51">Poly Filament</option>\n<option value="52">Spun Poly</option>\n<option value="53">Ring Spun</option>\n<option value="54">Poly Coolmax</option>\n<option value="55">Poly HScool</option>\n<option value="56">Poly Thermolit</option>\n<option value="57">Poly Trevira</option>\n<option value="58">Poly CD Yarn</option>\n<option value="59">Cambric Viscose</option>\n<option value="60">Ring Card</option>\n<option value="61">CVC Melange</option>\n<option value="62">PC Melange</option>\n<option value="63">Modal Linen</option>\n<option value="64">Siro</option>\n<option value="65">Viscose Slub</option>\n<option value="66">CPV </option>\n<option value="67">VC</option>\n<option value="68">Cotton-Tencil</option>\n<option value="69">Cotton-Rayon</option>\n<option value="70">Siro Slub</option>\n<option value="71">Inject Slub Melange</option>\n<option value="72">Pima Melange</option>\n<option value="73">Triblend</option>\n<option value="74">Space Slub</option>\n<option value="75">Carded Ring Spun</option>\n<option value="76">Combed Slub</option>\n<option value="77">Recycle</option>\n<option value="78">Pina </option>\n<option value="79">Banana</option>\n<option value="80">Eco Fresh</option>\n<option value="81">VP</option>\n<option value="82">Lenzing</option>\n<option value="83">Combed Compact</option>\n<option value="84">COMBED- CONTA FREE</option>\n<option value="85">COMFORJET</option>\n<option value="86">Carded Contra Free</option>\n<option value="87">Carded Contra Control</option>\n<option value="88">Inject Slub</option>\n<option value="89">CB Compact Contra Free</option>\n<option value="90">MVS</option>\n<option value="91">Cupro</option>\n<option value="92">CREPE</option>\n<option value="93">NYLON</option>\n<option value="94">Charcoal Mel</option>\n</select>                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="must_entry_caption" title="Must Entry Field." align="right"> <font color="blue">Color</font></td>
                                                                                        <td id="color_td_id">







                                                                                            <select name="cbo_color" id="cbo_color" class="combo_boxes" style="width:110px" onchange="" disabled="disabled">\n<option value="0">--Select--</option>\n<option value="3">GREY</option>\n</select><input name="btn_color" id="btn_color" class="formbuttonplasminus" style="width:20px" onclick="fn_color_new(this.id)" value="N" type="button"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="must_entry_caption" title="Must Entry Field." align="right"> <font color="blue"><!--Yarn -->Lot/ Batch</font></td>
                                                                                        <td><input name="txt_yarn_lot" id="txt_yarn_lot" class="text_boxes" style="width:120px;" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                    </tr>
                                                                                    </tbody></table>

                                                                                <table style="float:left" width="240" cellspacing="2" cellpadding="0" border="0">
                                                                                    <tbody><tr>
                                                                                        <td width="88" align="right">Brand</td>
                                                                                        <td width="146"><input name="txt_brand" id="txt_brand" class="text_boxes ui-autocomplete-input" style="width:120px;" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="must_entry_caption" title="Must Entry Field." align="right"> <font color="blue">Recv. Qnty.</font></td>
                                                                                        <td>
                                                                                            <input name="txt_receive_qty" id="txt_receive_qty" class="text_boxes_numeric" style="width:120px;" onblur="fn_calile()" type="text">
                                                                                        </td> <!--onKeyUp="fn_calile()" -->
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">UOM</td>
                                                                                        <td><select name="cbo_uom" id="cbo_uom" class="combo_boxes" disabled="" style="width:130px" onchange="">\n<option value="1">Pcs</option>\n<option value="2">Dzn</option>\n<option value="3">Grs</option>\n<option value="4">GG</option>\n<option value="10">Mg</option>\n<option value="11">Gm</option>\n<option value="12" selected="">Kg</option>\n<option value="13">Quintal</option>\n<option value="14">Ton</option>\n<option value="15">Lbs</option>\n<option value="20">Km</option>\n<option value="21">Hm</option>\n<option value="22">Dm</option>\n<option value="23">Mtr</option>\n<option value="24">Dcm</option>\n<option value="25">CM</option>\n<option value="26">MM</option>\n<option value="27">Yds</option>\n<option value="28">Feet</option>\n<option value="29">Inch</option>\n<option value="30">CFT</option>\n<option value="31">SFT</option>\n<option value="40">Ltr</option>\n<option value="41">Ml</option>\n<option value="50">Roll</option>\n<option value="51">Coil</option>\n<option value="52">Cone</option>\n<option value="53">Bag</option>\n<option value="54">Box</option>\n<option value="55">Drum</option>\n<option value="56">Bottle</option>\n<option value="57">Pack</option>\n<option value="58">Set</option>\n<option value="59">Can</option>\n<option value="60">Each</option>\n<option value="61">Gallon</option>\n<option value="62">Lachi</option>\n<option value="63">Pair</option>\n<option value="64">Lot</option>\n<option value="65">Packet</option>\n<option value="66">Pot</option>\n<option value="67">Book</option>\n<option value="68">Culind</option>\n<option value="69">Rim</option>\n<option value="70">Cft</option>\n<option value="71">Syp</option>\n<option value="72">K.V</option>\n<option value="73">CU-M3</option>\n<option value="74">Bundle</option>\n<option value="75">Strip</option>\n<option value="76">SQM</option>\n</select></td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="must_entry_caption" title="Must Entry Field." align="right"> <font color="blue">Rate</font></td>
                                                                                        <td>
                                                                                            <input name="txt_rate" id="txt_rate" class="text_boxes_numeric" style="width:30px;" onblur="fn_calile()" value="0" type="text">
                                                                                            <input name="txt_avg_rate" id="txt_avg_rate" class="text_boxes_numeric" style="width:30px;" onblur="calculate_rate()" placeholder="Avg" disabled="disabled" type="text">
                                                                                            <input name="txt_dyeing_charge" id="txt_dyeing_charge" class="text_boxes_numeric" style="width:30px;" placeholder="D.Ch" onblur="calculate_rate()" disabled="disabled" type="text">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td id="ile_td" align="right">ILE%</td>
                                                                                        <td>
                                                                                            <input name="txt_ile" id="txt_ile" class="text_boxes_numeric" style="width:120px;" placeholder="ILE COST" readonly="" type="text">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Amount</td>
                                                                                        <td><input name="txt_amount" id="txt_amount" class="text_boxes_numeric" style="width:120px;" readonly="" disabled="" type="text"></td>
                                                                                    </tr>
                                                                                    </tbody></table>

                                                                                <table style="float:left" width="244" cellspacing="2" cellpadding="0" border="0">
                                                                                    <tbody><tr>
                                                                                        <td width="111" align="right">Book Currency.</td>
                                                                                        <td width="133">
                                                                                            <input name="txt_book_currency" id="txt_book_currency" class="text_boxes_numeric" style="width:120px;" readonly="" disabled="" type="text">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">No. Of Bag</td>
                                                                                        <td><input name="txt_no_bag" id="txt_no_bag" class="text_boxes_numeric" style="width:120px;" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">No. Of Cone</td>
                                                                                        <td>
                                                                                            <input name="txt_cone_per_bag" id="txt_cone_per_bag" class="text_boxes_numeric" style="width:120px;" type="text">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Weight per Bag</td>
                                                                                        <td>
                                                                                            <input name="txt_weight_per_bag" id="txt_weight_per_bag" class="text_boxes_numeric" style="width:120px;" type="text">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Wght @ Cone</td>
                                                                                        <td><input class="text_boxes_numeric" name="txt_weight_per_cone" id="txt_weight_per_cone" style="width:120px;" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Room</td>
                                                                                        <td><input class="text_boxes_numeric" name="txt_room" id="txt_room" style="width:120px;" onkeyup="fn_room_rack_self_box()" type="text"></td>
                                                                                    </tr>
                                                                                    </tbody></table>


                                                                                <table width="230" cellspacing="2" cellpadding="0" border="0">

                                                                                    <tbody><tr>
                                                                                        <td width="118" align="right">Rack</td>
                                                                                        <td width="106"><input class="text_boxes_numeric" name="txt_rack" id="txt_rack" style="width:100px;" onkeyup="fn_room_rack_self_box()" disabled="" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Self</td>
                                                                                        <td><input class="text_boxes_numeric" name="txt_self" id="txt_self" style="width:100px;" onkeyup="fn_room_rack_self_box()" disabled="" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Bin/Box</td>
                                                                                        <td><input class="text_boxes_numeric" name="txt_binbox" id="txt_binbox" style="width:100px;" disabled="" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Remarks</td>
                                                                                        <td><input name="txt_remarks" id="txt_remarks" class="text_boxes" style="width:100px;" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Bal. PI/ Ord. Qnty</td>
                                                                                        <td><input class="text_boxes_numeric" name="txt_order_qty" id="txt_order_qty" style="width:100px;" readonly="" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">Product Code</td>
                                                                                        <td><input class="text_boxes" name="txt_prod_code" id="txt_prod_code" style="width:100px;" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
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
                                                                            <input id="txt_prod_id" name="txt_prod_id" value="" type="hidden">
                                                                            <input id="allocation_maintained" name="allocation_maintained" value="1" type="hidden">
                                                                            <input id="update_id" name="update_id" value="" type="hidden">
                                                                            <input id="is_posted_account" name="is_posted_account" value="0" type="hidden">
                                                                            <input name="job_no" id="job_no" readonly="" type="hidden"><!--For Basis Bokking and Yarn Dyeing Purpose-->
                                                                            <input value="Save" name="save" onclick="fnc_yarn_receive_entry(0)" style="width:80px" id="save1" class="formbutton" type="button">&nbsp;&nbsp;<input value="Update" name="update" onclick="show_button_disable_msg(1)" style="width:80px" id="update1" class="formbutton_disabled" type="button">&nbsp;&nbsp;<input value="Delete" name="delete" onclick="show_button_disable_msg(2)" style="width:80px" id="Delete1" class="formbutton_disabled" type="button">&nbsp;&nbsp;<input value="Refresh" name="refresh" onclick="fnResetForm()" style="width:80px" id="Refresh1" class="formbutton" type="button">&nbsp;&nbsp;<br><hr style="height:8px;"><input value="Print" name="print" onclick="fnc_yarn_receive_entry(4)" style="width:80px" id="Print1" class="formbutton" type="button">&nbsp;&nbsp;                             <div id="accounting_posted_status" style=" color:red; font-size:24px;" align="left"></div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody></table>
                                                            </fieldset>

                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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