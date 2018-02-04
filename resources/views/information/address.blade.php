<!-- Modal Start -->
<div class="modal fade" id="addressModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Address Information</h4>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet box purple-wisteria">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Address Information
                                </div>
                            </div>

                                <table style="width:100%;" cellspacing="0" cellpadding="0" border="0">
                                    <tbody><tr>
                                        <td valign="top">
                                            <table width="100%" cellspacing="2" cellpadding="0" border="0">
                                                <tbody><tr><th colspan="2" class="header">Present Address</th></tr>
                                                <tr><td colspan="2">&nbsp;</td></tr>
                                                <tr>
                                                    <td width="35%">Village/Area</td>
                                                    <td><input name="localAddress" id="present_village" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Village/Area(Bangla)</td>
                                                    <td><input name="present_village_bangla" id="present_village_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>House No</td>
                                                    <td><input name="present_house_no" id="present_house_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>House No(Bangla)</td>
                                                    <td><input name="permanentAddress" id="present_house_no_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Road No</td>
                                                    <td><input name="present_road_no" id="present_road_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Road No(Bangla)</td>
                                                    <td><input name="present_road_no_bangla" id="present_road_no_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Post Office / Code</td>
                                                    <td><input name="present_post_code" id="present_post_code" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Post Office / Code(Bangla)</td>
                                                    <td><input name="present_post_code_bangla" id="present_post_code_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Thana</td>
                                                    <td><input name="present_thana" id="present_thana" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Thana(Bangla)</td>
                                                    <td><input name="present_thana_bangla" id="present_thana_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>District</td>
                                                    <td>
                                                        <select id="present_district_id" name="present_district_id" class="combo_boxes" onchange="district_change( this.value, 'present' )">
                                                            <option value="0">-- Select --</option>
                                                            <optgroup label="Dhaka">								<option value="13">Dhaka</option>
                                                                <option value="15">Faridpur</option>
                                                                <option value="18">Gazipur</option>
                                                                <option value="19">Gopalganj</option>
                                                                <option value="22">Jamalpur</option>
                                                                <option value="28">Kishoreganj</option>
                                                                <option value="33">Madaripur</option>
                                                                <option value="35">Manikganj</option>
                                                                <option value="38">Munshiganj</option>
                                                                <option value="39">Mymensingh</option>
                                                                <option value="41">Narayanganj</option>
                                                                <option value="42">Narsingdi</option>
                                                                <option value="45">Netrokona</option>
                                                                <option value="53">Rajbari</option>
                                                                <option value="58">Shariyatpur</option>
                                                                <option value="59">Sherpur</option>
                                                                <option value="63">Tangail</option>
                                                            </optgroup><optgroup label="Chittagong">								<option value="2">Bandarban</option>
                                                                <option value="5">Barnmanbaria</option>
                                                                <option value="8">Chandpur</option>
                                                                <option value="9">Chittagong</option>
                                                                <option value="11">Comilla</option>
                                                                <option value="12">Cox's Bazar</option>
                                                                <option value="16">Feni</option>
                                                                <option value="26">Khagrachari</option>
                                                                <option value="31">Lakshmipur</option>
                                                                <option value="47">Noakhali</option>
                                                                <option value="55">Rangamati</option>
                                                            </optgroup><optgroup label="Rajshahi">								<option value="7">Bogra</option>
                                                                <option value="21">Joypurhat</option>
                                                                <option value="40">Naogaon</option>
                                                                <option value="43">Natore</option>
                                                                <option value="44">Nawabgonj</option>
                                                                <option value="49">Pabna</option>
                                                                <option value="54">Rajshahi</option>
                                                                <option value="60">Sirajgonj</option>
                                                            </optgroup><optgroup label="Khulna">								<option value="1">Bagerhat</option>
                                                                <option value="10">Chuadanga</option>
                                                                <option value="23">Jessore</option>
                                                                <option value="25">Jhenaidah</option>
                                                                <option value="27">Khulna</option>
                                                                <option value="30">Kushtia</option>
                                                                <option value="34">Magura</option>
                                                                <option value="36">Meherpur</option>
                                                                <option value="48">Norail</option>
                                                                <option value="57">Satkhira</option>
                                                            </optgroup><optgroup label="Sylhet">								<option value="20">Habiganj</option>
                                                                <option value="37">Moulavibazar</option>
                                                                <option value="61">Sunamganj</option>
                                                                <option value="62">Sylhet</option>
                                                            </optgroup><optgroup label="Barisal">								<option value="3">Barguna</option>
                                                                <option value="4">Barisal</option>
                                                                <option value="6">Bhola</option>
                                                                <option value="24">Jhalakathi</option>
                                                                <option value="51">Patuakhali</option>
                                                                <option value="52">Pirojpur</option>
                                                            </optgroup><optgroup label="Rangpur">								<option value="14">Dinajpur</option>
                                                                <option value="17">Gaibandha</option>
                                                                <option value="29">Kurigram</option>
                                                                <option value="32">Lalmonirhat</option>
                                                                <option value="46">Nilphamari</option>
                                                                <option value="50">Panchagarh</option>
                                                                <option value="56">Rangpur</option>
                                                                <option value="64">Thakurgaon</option>
                                                            </optgroup></select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>District(Bangla)</td>
                                                    <td>
                                                        <input name="present_district_id_bangla" id="present_district_id_bangla" class="bangla" value="" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Division</td>
                                                    <td>
                                                        <select name="present_division_id" id="present_division_id" class="combo_boxes">
                                                            <option value="0">-- Select --</option>
                                                            <option value="6">Barisal</option>
                                                            <option value="2">Chittagong</option>
                                                            <option value="1">Dhaka</option>
                                                            <option value="4">Khulna</option>
                                                            <option value="3">Rajshahi</option>
                                                            <option value="7">Rangpur</option>
                                                            <option value="5">Sylhet</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Division(Bangla)</td>
                                                    <td>
                                                        <input name="present_division_id_bangla" id="present_division_id_bangla" class="bangla" value="" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Land Phone</td>
                                                    <td><input name="present_phone_no" id="present_phone_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Cell Phone</td>
                                                    <td><input name="present_mobile_no" id="present_mobile_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>E-Mail</td>
                                                    <td><input name="present_email" id="present_email" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                </tbody></table>
                                        </td>
                                        <td valign="top">
                                            <table width="100%" cellspacing="2" cellpadding="0" border="0">
                                                <tbody><tr><th colspan="2" class="header">Permanent Address</th></tr>
                                                <tr>
                                                    <td width="35%">&nbsp;</td>
                                                    <td>
                                                        <input name="same" id="same" value="yes" style="float:left;" type="checkbox">
                                                        <div style="float:left;">Same as present</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Village/Area</td>
                                                    <td><input name="permanent_village" id="permanent_village" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Village/Area(Bangla)</td>
                                                    <td><input name="permanent_village_bangla" id="permanent_village_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>House No</td>
                                                    <td><input name="permanent_house_no" id="permanent_house_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>House No(Bangla)</td>
                                                    <td><input name="permanent_house_no_bangla" id="permanent_house_no_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Road No</td>
                                                    <td><input name="permanent_road_no" id="permanent_road_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Road No(Bangla)</td>
                                                    <td><input name="permanent_road_no_bangla" id="permanent_road_no_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Post Office / Code</td>
                                                    <td><input name="permanent_post_code" id="permanent_post_code" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Post Office / Code(Bangla)</td>
                                                    <td><input name="permanent_post_code_bangla" id="permanent_post_code_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Thana</td>
                                                    <td><input name="permanent_thana" id="permanent_thana" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Thana(Bangla)</td>
                                                    <td><input name="permanent_thana_bangla" id="permanent_thana_bangla" class="bangla" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>District</td>
                                                    <td>
                                                        <select id="permanent_district_id" name="permanent_district_id" class="combo_boxes" onchange="district_change( this.value, 'permanent' )">
                                                            <option value="0">-- Select --</option>
                                                            <optgroup label="Dhaka">								<option value="13">Dhaka</option>
                                                                <option value="15">Faridpur</option>
                                                                <option value="18">Gazipur</option>
                                                                <option value="19">Gopalganj</option>
                                                                <option value="22">Jamalpur</option>
                                                                <option value="28">Kishoreganj</option>
                                                                <option value="33">Madaripur</option>
                                                                <option value="35">Manikganj</option>
                                                                <option value="38">Munshiganj</option>
                                                                <option value="39">Mymensingh</option>
                                                                <option value="41">Narayanganj</option>
                                                                <option value="42">Narsingdi</option>
                                                                <option value="45">Netrokona</option>
                                                                <option value="53">Rajbari</option>
                                                                <option value="58">Shariyatpur</option>
                                                                <option value="59">Sherpur</option>
                                                                <option value="63">Tangail</option>
                                                            </optgroup><optgroup label="Chittagong">								<option value="2">Bandarban</option>
                                                                <option value="5">Barnmanbaria</option>
                                                                <option value="8">Chandpur</option>
                                                                <option value="9">Chittagong</option>
                                                                <option value="11">Comilla</option>
                                                                <option value="12">Cox's Bazar</option>
                                                                <option value="16">Feni</option>
                                                                <option value="26">Khagrachari</option>
                                                                <option value="31">Lakshmipur</option>
                                                                <option value="47">Noakhali</option>
                                                                <option value="55">Rangamati</option>
                                                            </optgroup><optgroup label="Rajshahi">								<option value="7">Bogra</option>
                                                                <option value="21">Joypurhat</option>
                                                                <option value="40">Naogaon</option>
                                                                <option value="43">Natore</option>
                                                                <option value="44">Nawabgonj</option>
                                                                <option value="49">Pabna</option>
                                                                <option value="54">Rajshahi</option>
                                                                <option value="60">Sirajgonj</option>
                                                            </optgroup><optgroup label="Khulna">								<option value="1">Bagerhat</option>
                                                                <option value="10">Chuadanga</option>
                                                                <option value="23">Jessore</option>
                                                                <option value="25">Jhenaidah</option>
                                                                <option value="27">Khulna</option>
                                                                <option value="30">Kushtia</option>
                                                                <option value="34">Magura</option>
                                                                <option value="36">Meherpur</option>
                                                                <option value="48">Norail</option>
                                                                <option value="57">Satkhira</option>
                                                            </optgroup><optgroup label="Sylhet">								<option value="20">Habiganj</option>
                                                                <option value="37">Moulavibazar</option>
                                                                <option value="61">Sunamganj</option>
                                                                <option value="62">Sylhet</option>
                                                            </optgroup><optgroup label="Barisal">								<option value="3">Barguna</option>
                                                                <option value="4">Barisal</option>
                                                                <option value="6">Bhola</option>
                                                                <option value="24">Jhalakathi</option>
                                                                <option value="51">Patuakhali</option>
                                                                <option value="52">Pirojpur</option>
                                                            </optgroup><optgroup label="Rangpur">								<option value="14">Dinajpur</option>
                                                                <option value="17">Gaibandha</option>
                                                                <option value="29">Kurigram</option>
                                                                <option value="32">Lalmonirhat</option>
                                                                <option value="46">Nilphamari</option>
                                                                <option value="50">Panchagarh</option>
                                                                <option value="56">Rangpur</option>
                                                                <option value="64">Thakurgaon</option>
                                                            </optgroup></select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>District(Bangla)</td>
                                                    <td>
                                                        <input name="permanent_district_id_bangla" id="permanent_district_id_bangla" class="bangla" value="" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Division</td>
                                                    <td>
                                                        <select name="permanent_division_id" id="permanent_division_id" class="combo_boxes">
                                                            <option value="0">-- Select --</option>
                                                            <option value="6">Barisal</option>
                                                            <option value="2">Chittagong</option>
                                                            <option value="1">Dhaka</option>
                                                            <option value="4">Khulna</option>
                                                            <option value="3">Rajshahi</option>
                                                            <option value="7">Rangpur</option>
                                                            <option value="5">Sylhet</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Division(Bangla)</td>
                                                    <td>
                                                        <input name="permanent_division_id_bangla" id="permanent_division_id_bangla" class="bangla" value="" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Land Phone</td>
                                                    <td><input name="permanent_phone_no" id="permanent_phone_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Cell Phone</td>
                                                    <td><input name="permanent_mobile_no" id="permanent_mobile_no" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>E-Mail</td>
                                                    <td><input name="permanent_email" id="permanent_email" class="text_boxes" value="" type="text"></td>
                                                </tr>
                                                </tbody></table>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" style="padding-top:10px;" align="center">
                                            <input name="save" class="formbutton" value="Save" type="submit">
                                            <input name="cancel" id="cancel" class="formbutton" value="Cancel" style="margin-right:22px;" type="reset">
                                        </td>
                                    </tr>
                                    </tbody></table>

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