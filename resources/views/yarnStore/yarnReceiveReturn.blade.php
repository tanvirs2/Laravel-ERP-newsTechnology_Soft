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
                                                                <legend>Yarn Receive Return</legend>
                                                                <br>
                                                                <fieldset style="width:900px;">
                                                                    <table id="tbl_master" width="800" cellspacing="2" cellpadding="0" border="0">
                                                                        <tbody><tr>
                                                                            <td colspan="3" align="right"><b>Return Number</b></td>
                                                                            <td colspan="3" align="left"><input name="txt_return_no" id="txt_return_no" class="text_boxes" style="width:160px" placeholder="Double Click To Search" ondblclick="open_returnpopup()" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="6" align="center">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="120" align="right"> <font color="blue">Company Name </font></td>
                                                                            <td width="170">
                                                                                <select name="cbo_company_name" id="cbo_company_name" class="combo_boxes" style="width:170px" onchange="">\n<option value="0">-- Select Company --</option>\n<option value="1">JK Knit Composite Ltd.</option>\n<option value="2">Tanima Knit Composite Ltd.</option>\n</select>                                </td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="120" align="right"> <font color="blue">MRR Number<input name="txt_received_id" id="txt_received_id" readonly="" disabled="" type="hidden"></font></td>
                                                                            <td width="160"><input class="text_boxes" name="txt_mrr_no" id="txt_mrr_no" style="width:160px;" placeholder="Double Click To Search" ondblclick="open_mrrpopup()" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="120" align="right"> <font color="blue">Return Date</font></td>
                                                                            <td width="170"><input name="txt_return_date" id="txt_return_date" class="datepicker hasDatepicker" style="width:160px;" placeholder="Select Date" type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="must_entry_caption" title="Must Entry Field." width="130" align="right"> <font color="blue">Returned To</font></td>
                                                                            <td width="170">
                                                                                <select name="cbo_return_to" id="cbo_return_to" class="combo_boxes" disabled="" style="width:170px" onchange="">\n<option value="0">-- Select --</option>\n<option value="61">2007/Maral</option>\n<option value="65">A.One.Polar</option>\n<option value="28">A.R International</option>\n<option value="272">ASM Chemical Ind.</option>\n<option value="17">Aa Synthetic Fibres Ltd.</option>\n<option value="29">Abir Fashion</option>\n<option value="382">Acepora</option>\n<option value="30">Advance Flaxo Pack</option>\n<option value="31">Agami Accessories Ltd</option>\n<option value="32">Ahad Lace Manufacturing</option>\n<option value="188">Akhi Traders</option>\n<option value="363">Akij Textile Mills Ltd.</option>\n<option value="33">Al Madina Traders</option>\n<option value="26">Al-Razee Spinning Mills Ltd.</option>\n<option value="34">Alif International</option>\n<option value="35">All Union</option>\n<option value="285">Alpha Corporation</option>\n<option value="56">Ameer Tex</option>\n<option value="36">Amie Enterprise</option>\n<option value="365">Anlima Yarn Dyeing Ltd.</option>\n<option value="73">Antim</option>\n<option value="37">Antim Knitting And Dyeing Ltd.</option>\n<option value="183">Antim Knitting Dyeing And Finishing Ltd.</option>\n<option value="391">Apax Yarn Dyeing Ltd.</option>\n<option value="38">Apex Industries Ltd.</option>\n<option value="347">Apex Yarn Dyeing</option>\n<option value="46">Apex Yarn Dyeing Ltd.</option>\n<option value="47">Apparel Accessories</option>\n<option value="48">Aresha Thread And Accessories</option>\n<option value="384">Arif Knitspin</option>\n<option value="39">Arko International</option>\n<option value="113">Arunima Group</option>\n<option value="40">Ashik Enterprise</option>\n<option value="41">Ashik Store</option>\n<option value="42">Asia Linkage</option>\n<option value="398">Asian Textile</option>\n<option value="55">Ask.Style</option>\n<option value="276">Asuchem</option>\n<option value="59">Aswad</option>\n<option value="43">Ata Tekstli Ltd.</option>\n<option value="44">Ataur And Brother</option>\n<option value="45">Avery Dennison</option>\n<option value="50">Azahar Sutaghar</option>\n<option value="112">B. H .S Fashion Ltd</option>\n<option value="19">Badsha Textiles Ltd.</option>\n<option value="111">Balaka Fashion Mark</option>\n<option value="51">Baly Plastic Industries Ltd</option>\n<option value="60">Banga Plastic International Ltd.</option>\n<option value="82">Bangladesh Multi Accessories Ltd.</option>\n<option value="85">Bangladesh Paper Cone</option>\n<option value="271">Be Fuwell Enterprise</option>\n<option value="90">Beauty Paint Hardware</option>\n<option value="127">Bengal Plastic Industris Ltd.</option>\n<option value="130">Bengale Tex</option>\n<option value="287">Beta Chemical</option>\n<option value="137">Billal Zipper Store.</option>\n<option value="132">Bishal Thread And Accessories</option>\n<option value="133">Bishawas Accessories</option>\n<option value="134">Boishakhi Paper House</option>\n<option value="360">Bros Macao</option>\n<option value="136">Button Tex   Ltd</option>\n<option value="399">CHANGZHOU DINGSHUN TEXTILES CO. LTD</option>\n<option value="387">CHINA</option>\n<option value="131">Chaity Composite Ltd</option>\n<option value="138">Checkpoint Asia Ltd.</option>\n<option value="22">Chenab Textile Mills</option>\n<option value="139">Chiwan Industrial</option>\n<option value="140">Coats Bangladesh Ltd.</option>\n<option value="141">Codes Label Ltd</option>\n<option value="142">Colour  Thread</option>\n<option value="11">Colour Thread</option>\n<option value="12">Crc Textile Mills Ltd.</option>\n<option value="383">Creora</option>\n<option value="277">D-King Trade</option>\n<option value="369">DONG GULAN HON KEUNG HABERDASHERY LTD</option>\n<option value="129">Dalas Fashion Ltd</option>\n<option value="143">Dekko Accessories Ltd</option>\n<option value="385">Delta</option>\n<option value="109">Denier Fashion Ltd</option>\n<option value="110">Design Destination Ltd</option>\n<option value="145">Dewan Traders</option>\n<option value="108">Dgn Apparels Limited</option>\n<option value="107">Dird Composite Ltd</option>\n<option value="362">Divine Fabrics Ltd. [Yarn Dyeing Unit]</option>\n<option value="106">Divine Group</option>\n<option value="146">Dominant Carton Packaging Ind. Ltd.</option>\n<option value="282">Dysin Internation Ltd.</option>\n<option value="49">ENN</option>\n<option value="148">Eastern It</option>\n<option value="147">Eastern [Hk]</option>\n<option value="155">Eland World Company Ltd.</option>\n<option value="149">Emon-Rimon Accessories</option>\n<option value="389">Envoy Textile</option>\n<option value="156">Epyllion Packaging Ltd.</option>\n<option value="150">Era International</option>\n<option value="151">Erum Accessories</option>\n<option value="152">Esquel Enterprise Ltd.</option>\n<option value="153">Etafil Accessories Ltd</option>\n<option value="154">Ettadi Chumki Fashion</option>\n<option value="275">Eurasia Chemical Co.</option>\n<option value="157">F And V</option>\n<option value="401">FAIZA BUTTON AND ZIPPER LTD.</option>\n<option value="69">FALSE</option>\n<option value="366">FM Yarn Dyeing Ltd.</option>\n<option value="158">Fahim Enterprise</option>\n<option value="159">Fair Zipper</option>\n<option value="175">Fajusaha Trading</option>\n<option value="160">Fajusha Trading Corporation</option>\n<option value="161">Fashion First</option>\n<option value="167">Fashion Media</option>\n<option value="105">Fashion Meet</option>\n<option value="162">Fashion Support Ltd</option>\n<option value="163">Fashion Tech</option>\n<option value="395">Fine Line Technologies LLC LTD [HK]</option>\n<option value="283">First International</option>\n<option value="128">Fkn  Printing</option>\n<option value="164">Foot Of The Loom Textile</option>\n<option value="179">Fotrust Co Ltd.</option>\n<option value="165">Friend Accessories</option>\n<option value="166">Friends Enterprise</option>\n<option value="168">Gausia Trade International</option>\n<option value="169">Gausia Zipper Store</option>\n<option value="170">General Automation Ltd.</option>\n<option value="171">General Register</option>\n<option value="172">Global Best Industrial Co. Ltd</option>\n<option value="173">Glory Tapes  And Label Ltd.</option>\n<option value="58">Grameen</option>\n<option value="174">Guardian Shipping Lines Ltd</option>\n<option value="370">HA-MEEM SPINNING MILLS LTD</option>\n<option value="194">Habib Trading Corporation</option>\n<option value="176">Hak Garments</option>\n<option value="177">Hakim Traders</option>\n<option value="104">Haque Fashion Ltd</option>\n<option value="178">Hashi Enterprise</option>\n<option value="103">Hashmatullah Knit Wear Ltd</option>\n<option value="180">Helem Store</option>\n<option value="187">Helem Store Stock</option>\n<option value="189">Hera Enterprise</option>\n<option value="190">Heritage Interlining Ltd.</option>\n<option value="375">Hina/Wenshan</option>\n<option value="191">Hira Mukta Printers</option>\n<option value="192">Ho Zat Hanger Button Pro. Ltd.</option>\n<option value="193">Hongkong</option>\n<option value="195">Hossain Foam Center</option>\n<option value="16">Huafu Macao Commercial Offshore Ltd</option>\n<option value="386">INDIA</option>\n<option value="196">Idt Global Labels Bangladesh Ltd.</option>\n<option value="197">Iga Garments Accessories Ltd.</option>\n<option value="273">Imperial Allied Chemical</option>\n<option value="198">Impress Accessories Ltd.</option>\n<option value="199">Innova Textile Ltd.</option>\n<option value="52">Integrity</option>\n<option value="201">International Trimmings and Labels Bangladesh Private Limited</option>\n<option value="102">Iris Design Ltd</option>\n<option value="25">Israq Spinning Mills Ltd.</option>\n<option value="200">Itw Garphics Asia Ltd</option>\n<option value="202">J.K Knit Composite</option>\n<option value="101">J.M Knit Composite</option>\n<option value="2">JK Accessories</option>\n<option value="135">JK Cotton Mills Ltd.</option>\n<option value="348">JK Knit Composite Ltd.</option>\n<option value="3">JK Spinning Mills Ltd.</option>\n<option value="4">JK Synthetic Mills Ltd.</option>\n<option value="281">JLP Corporation</option>\n<option value="24">Jaba Textile Mills Ltd.</option>\n<option value="203">Jag Traders Ltd</option>\n<option value="204">Jahed Accessories</option>\n<option value="100">Jalal Ahammed??? Knit Wear Ltd</option>\n<option value="7">Jamuna Spinning  Mills  Ltd</option>\n<option value="54">Japan Knit</option>\n<option value="205">Jbtex</option>\n<option value="206">Jc Colour Hongkong Ltd.</option>\n<option value="207">Jms Accessories</option>\n<option value="208">Joinuddin Patan</option>\n<option value="209">Juksan Bd</option>\n<option value="186">Kader Synthetic Fabrics Limited</option>\n<option value="210">Kai Lei Press Company Ltd.</option>\n<option value="379">Karnafuli</option>\n<option value="378">Karotoa Spinning</option>\n<option value="211">Kd Collection</option>\n<option value="212">Khan Enterprise</option>\n<option value="71">Knit Asia</option>\n<option value="1">Knit Plus Ltd.</option>\n<option value="98">Kohinur Gmts Ltd</option>\n<option value="393">Kongkiat Textile Co. Ltd.</option>\n<option value="213">Kr Trading Mart</option>\n<option value="270">Kyung In Synthetic Corp.</option>\n<option value="371">LK Unitex Company Limited</option>\n<option value="404">La Ventures Inc.</option>\n<option value="214">Label For Less</option>\n<option value="215">Leson   Hk.  Woven Label</option>\n<option value="353">Leson  Woven Label Ltd</option>\n<option value="126">Liberty Knit Wear Ltd</option>\n<option value="216">Long Rivercomputer Label Devlopment Ltd.</option>\n<option value="21">Lotus Integrated Texpark Limited</option>\n<option value="217">Lsi Industries Ltd.</option>\n<option value="219">M.R. Accessories</option>\n<option value="220">M/S F V</option>\n<option value="221">M/S G.T Road Wages India</option>\n<option value="405">M/S Jainuddin Pathan</option>\n<option value="222">M/S Karim Enterprise</option>\n<option value="224">M/S M.M and Sons</option>\n<option value="223">M/S Padma Traders</option>\n<option value="225">M/S Rakib Enterprise</option>\n<option value="226">M/S Ruma Traders</option>\n<option value="406">M/S Zaman Corporation</option>\n<option value="218">MAndU Packaging Ltd.</option>\n<option value="239">MS Accessories</option>\n<option value="403">MS Accessories</option>\n<option value="97">Madany Fashion Wear Ltd</option>\n<option value="227">Madina Traders</option>\n<option value="241">Mahfuza Accessories.</option>\n<option value="228">Mainetti Bangladesh</option>\n<option value="229">Mak Corporation</option>\n<option value="14">Malek Spinning Mills Ltd</option>\n<option value="230">Mallik Accessories</option>\n<option value="242">Mannan Enterprise</option>\n<option value="125">Mashriqee Textile</option>\n<option value="374">Matin Spinning Mills Limited</option>\n<option value="400">Maxim Label AndPackaging [BD] Pvt Ltd</option>\n<option value="231">Mc- Dry Desiccant Ltd.</option>\n<option value="232">Metalic Enterprise</option>\n<option value="243">Mintu Brothers</option>\n<option value="233">Miracle Accessories</option>\n<option value="27">Miracle Accessorioes</option>\n<option value="244">Mohhul Accessories</option>\n<option value="355">Mon Trims Ltd.</option>\n<option value="70">Mondol</option>\n<option value="234">Monica Button</option>\n<option value="235">Montrims Ltd.</option>\n<option value="236">Moon International</option>\n<option value="237">Moon Trading</option>\n<option value="23">Mother Textile Mills Ltd.</option>\n<option value="238">Motilal Store</option>\n<option value="95">Mozart Knit Ltd</option>\n<option value="240">Mumtex Industry</option>\n<option value="93">N.D. Knit Composite Ltd.</option>\n<option value="10">N.Z. Textile Ltd.</option>\n<option value="18">Nagreeka Exporters Limited</option>\n<option value="94">Nava Knit Composite Ltd</option>\n<option value="245">Neo Zipper Company</option>\n<option value="380">New Star</option>\n<option value="402">Nexgen Packaging</option>\n<option value="124">Niagara Textile Ltd</option>\n<option value="356">Niloy Fashion</option>\n<option value="92">North Tex Ltd</option>\n<option value="269">Novozymes</option>\n<option value="246">Nsi International</option>\n<option value="376">Nupur</option>\n<option value="274">Olay International</option>\n<option value="247">Opsec Delta [Hk] Ltd</option>\n<option value="248">Orchid Tread Accessories</option>\n<option value="91">Ordain Fashion Ltd</option>\n<option value="279">Orient Chemical</option>\n<option value="249">Osman Interlining Ltd</option>\n<option value="250">Osmaniya Suta Ghar</option>\n<option value="357">Pabna Knit</option>\n<option value="251">Packmat Industrious Ltd.</option>\n<option value="67">Padma Group</option>\n<option value="123">Pakiza Knit Composite Ltd</option>\n<option value="364">Paramount Textile Ltd.</option>\n<option value="252">Parkway Pakaging And Printing  Ltd.</option>\n<option value="253">Paxar  Bangladesh Ltd.</option>\n<option value="254">Pearl Thread</option>\n<option value="122">Polo Composite Ltd</option>\n<option value="257">Precious Panda Ind. Co Ltd.</option>\n<option value="182">Prime Composite Mills Ltd.</option>\n<option value="184">Prime Textile Spinning Mills Ltd</option>\n<option value="255">Pro-Stretch China Ltd.</option>\n<option value="256">Pwl</option>\n<option value="63">Qatar</option>\n<option value="258">R Pack</option>\n<option value="20">R.S.W.M Ltd.</option>\n<option value="289">Rahaman Accessories</option>\n<option value="259">Rainbow International</option>\n<option value="260">Rajob Cutting</option>\n<option value="261">Rakib Intl</option>\n<option value="288">Ramim Chemical</option>\n<option value="62">Ratul</option>\n<option value="262">Rb Industry [Hk] Ltd.</option>\n<option value="263">Rb Label Ltd</option>\n<option value="280">Redox Chemical Ind</option>\n<option value="290">Retail Technologies Ltd.</option>\n<option value="394">Rich [HK]</option>\n<option value="264">Rifat Accessories</option>\n<option value="291">Rifat Sutaghar</option>\n<option value="265">Riya Electronics</option>\n<option value="286">Rojina Chemical</option>\n<option value="266">Room 1605</option>\n<option value="267">Rs Accessories Ltd</option>\n<option value="268">Ruma Traders</option>\n<option value="121">Rupa Fabrics Ltd</option>\n<option value="373">S And D Chemical Co. Ltd.</option>\n<option value="292">S.E.C Accessories Ltd.</option>\n<option value="293">S.I International</option>\n<option value="86">S.L Designer Ltd</option>\n<option value="294">S.T International</option>\n<option value="396">SHANGHAI SILK GROUP CO. LTD.</option>\n<option value="392">SHANGHAI WEIXING INTERNATIONAL TRADING CO. LTD</option>\n<option value="358">SINATRON INTERNATIONAL LIMITED</option>\n<option value="367">SS Fashion</option>\n<option value="359">SUTLEJ</option>\n<option value="318">Sabuj Packaging</option>\n<option value="119">Sadma Fashion Wear Ltd</option>\n<option value="295">Sadma Fashion Wear Ltd.</option>\n<option value="296">Sales Place Packaging</option>\n<option value="185">Sameem Spinning Mills Ltd</option>\n<option value="297">Sans Packaging Industry Ltd.</option>\n<option value="89">Sark Knitwear Ltd</option>\n<option value="298">Sattapir Enterprise</option>\n<option value="351">Savar Dyeing</option>\n<option value="299">Savar Suta Ghar Accessoring</option>\n<option value="300">Sb International</option>\n<option value="68">Scandex</option>\n<option value="120">Scandex Textile Industries Ltd</option>\n<option value="301">Seem Dare Industrial Com Ltd.</option>\n<option value="302">Seltex International</option>\n<option value="303">Services Co. Ltd</option>\n<option value="304">Shafique Fusing</option>\n<option value="305">Shahin Store</option>\n<option value="319">Shainest Button</option>\n<option value="390">Shanghai Challenge</option>\n<option value="372">Shathi Fashion Apparels</option>\n<option value="88">Shaya Apparels Ltd</option>\n<option value="320">Shenzhen Onetouch Business Service Ltd.</option>\n<option value="377">Shetu</option>\n<option value="87">Shinest Group</option>\n<option value="181">Shohagpur Textile Mills Ltd.</option>\n<option value="306">Shore To Shore [Bd] Ltd.</option>\n<option value="57">Shuvo Knit</option>\n<option value="321">Siam Computerized</option>\n<option value="307">Siba Accessories</option>\n<option value="308">Siddiqui Fashion Marks</option>\n<option value="309">Sifat Hardware Store</option>\n<option value="322">Single Track Fashion</option>\n<option value="310">Sml Packging Solution Bangladesh Ltd</option>\n<option value="64">Snow White</option>\n<option value="311">Sonali Supply Co</option>\n<option value="312">Sonali Traders</option>\n<option value="323">Sourcing Solutions International</option>\n<option value="352">Sourcing Solutions International Ltd.</option>\n<option value="53">South East</option>\n<option value="84">Southern Knitwear Ltd</option>\n<option value="118">Sparkel Knitwears Ltd</option>\n<option value="6">Square Textile/Yarns Ltd.</option>\n<option value="313">Sr Packaging</option>\n<option value="314">Sub Store</option>\n<option value="315">Sunny Garments Accessories Ltd</option>\n<option value="316">Swiss Tex  Ltd</option>\n<option value="317">System Printing Services Co. Ltd</option>\n<option value="324">T.M. Thread</option>\n<option value="15">Taekwang Synthetic Fiber [Chemical]Co Ltd.</option>\n<option value="349">Tanima Knit Composite Ltd.</option>\n<option value="117">Tanzila Textile Ltd</option>\n<option value="144">Tara Spinning Mills Ltd</option>\n<option value="83">Taratex Fashion Ltd</option>\n<option value="96">Tasniah Fabrics Ltd</option>\n<option value="116">Tauri Knitwears Ltd,</option>\n<option value="284">Tex Chem Bd International</option>\n<option value="66">Tex.World</option>\n<option value="350">Texlink Limited.</option>\n<option value="381">Texlon</option>\n<option value="325">Texman Accessories Ltd.</option>\n<option value="81">Texzone Knit Wear Ltd</option>\n<option value="5">The Miracle Accessories Ltd.</option>\n<option value="326">The Page 2 Page Ltd.</option>\n<option value="9">Thermax Melange Spinning Mills Ltd.</option>\n<option value="327">Thk International</option>\n<option value="328">Titas Enterprise</option>\n<option value="74">Tri-D Knit</option>\n<option value="115">Tua-Ha</option>\n<option value="8">Twice Poly Bag and Thread Ind. Ltd.</option>\n<option value="329">Tyco Integrated</option>\n<option value="80">Unigear Sl Ltd</option>\n<option value="388">Unitex</option>\n<option value="114">Urmi Knit Wear</option>\n<option value="72">Uttara Knitting</option>\n<option value="79">Vatican Knitwear Ltd</option>\n<option value="330">Venture Inc</option>\n<option value="78">Veronika Fashion</option>\n<option value="331">Vision Trade International</option>\n<option value="397">WOO JUNG INT-L CORP</option>\n<option value="335">Well Accessories Ltd.</option>\n<option value="332">Well Thread</option>\n<option value="333">Win Cyc Group Ltd.</option>\n<option value="334">Wise Way  Production</option>\n<option value="354">WiseWay Production Company</option>\n<option value="336">Xiamen Xinlin Trade Co. Ltd.</option>\n<option value="278">Xinjiang Tianye Group</option>\n<option value="361">YIP TAI INVESTMENT LIMITED</option>\n<option value="337">Yasin Sutaghar</option>\n<option value="338">Yester Accessories Company [Bd] Ltd.</option>\n<option value="341">Yingger Company Ltd.</option>\n<option value="339">Ykk Bangladesh Ltd</option>\n<option value="342">Yong Jia Chenglace Ind. Co. Ltd.</option>\n<option value="340">Yvonne Industrial Co-Ltd.</option>\n<option value="77">Z.S Knit Fabrics Ltd</option>\n<option value="368">ZHEJIANG SHENGDANNU TEXTILE CO. LTD</option>\n<option value="343">Zaman Corporation</option>\n<option value="345">Zannat Accessories</option>\n<option value="76">Zara Composite Ltd</option>\n<option value="344">Zara Enterprise</option>\n<option value="13">Zarina Composite Textile</option>\n<option value="346">Zhejiang Weixing Imp Exp Co Ltd.</option>\n<option value="75">Zoom Tex Ltd</option>\n<option value="99">Zuma Fabrics Ltd</option>\n</select>                               	</td>
                                                                            <td align="right">PI NO </td>
                                                                            <td>
                                                                                <input class="text_boxes" name="txt_pi_no" id="txt_pi_no" ondblclick="openmypage_pi()" placeholder="Double Click To Search" style="width:160px;" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                <input name="pi_id" id="pi_id" type="hidden">
                                                                            </td>
                                                                            <td align="right">Remarks</td>
                                                                            <td><input class="text_boxes" name="txt_remarks" id="txt_remarks" style="width:160px;" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text"></td>
                                                                        </tr>
                                                                        </tbody></table>
                                                                </fieldset>
                                                                <br>
                                                                <table id="tbl_child" width="96%" cellspacing="1" cellpadding="0">
                                                                    <tbody><tr>
                                                                        <td width="49%" valign="top">
                                                                            <fieldset style="width:950px;">
                                                                                <legend>Return Item</legend>
                                                                                <table class="rpt_table" rules="all" width="950" cellspacing="0" cellpadding="0" border="1">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="must_entry_caption" title="Must Entry Field." width="200"> <font color="blue">Item Description</font></th>
                                                                                        <th width="50">No Of Bag</th>
                                                                                        <th width="50">No Of Cone</th>
                                                                                        <th width="100">Store</th>
                                                                                        <th class="must_entry_caption" title="Must Entry Field." width="80"> <font color="blue">Returned Qnty</font></th>
                                                                                        <th width="100">Inv. Recv. Qnty</th>
                                                                                        <th width="50">UOM</th>
                                                                                        <th class="must_entry_caption" title="Must Entry Field." width="70"> <font color="blue">Rate </font></th>
                                                                                        <th width="90">Return Value</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody><tr align="center">
                                                                                        <td>
                                                                                            <input name="txt_item_description" id="txt_item_description" class="text_boxes" style="width:200px" placeholder="Display" readonly="" title="  Allowed Characters: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.-,%@!/&lt;&gt;?+[]{};: " type="text">
                                                                                            <input name="txt_prod_id" id="txt_prod_id" readonly="" disabled="" type="hidden">
                                                                                        </td>
                                                                                        <td>
                                                                                            <input name="txt_no_of_bag" id="txt_no_of_bag" class="text_boxes_numeric" style="width:50px" type="text">
                                                                                        </td>
                                                                                        <td>
                                                                                            <input name="txt_no_of_cone" id="txt_no_of_cone" class="text_boxes_numeric" style="width:50px" type="text">
                                                                                        </td>
                                                                                        <td>
                                                                                            <select name="cbo_store_name" id="cbo_store_name" class="combo_boxes" disabled="" style="width:100px" onchange="">\n<option value="0">Display</option>\n<option value="6">Chemical Store [JK]</option>\n<option value="12">Chemical Store [Tanima]</option>\n<option value="7">Finish Fabric Store [JK]</option>\n<option value="8">Finish Fabric Store [Tanima]</option>\n<option value="11">General Store [JK]</option>\n<option value="2">Grey Fabric Store [JK]</option>\n<option value="10">Grey Fabric Store [Tanima]</option>\n<option value="4">Spare Store [JK]</option>\n<option value="5">Spare Store [Tanima]</option>\n<option value="3">Trims Store [JK]</option>\n<option value="13">Trims Store [Tanima]</option>\n<option value="1">Yarn Store [JK]</option>\n<option value="9">Yarn Store [Tanima]</option>\n</select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input name="txt_return_qnty" id="txt_return_qnty" class="text_boxes_numeric" style="width:80px;" placeholder="Entry" onkeyup="fn_calculateAmount(this.value)" type="text">
                                                                                        </td>
                                                                                        <td>
                                                                                            <input name="txt_receive_qnty" id="txt_receive_qnty" class="text_boxes_numeric" style="width:100px" placeholder="Display" readonly="" type="text">
                                                                                        </td>
                                                                                        <td>
                                                                                            <select name="cbo_uom" id="cbo_uom" class="combo_boxes" disabled="" style="width:50px" onchange="">\n<option value="12" selected="">Kg</option>\n</select>                                    </td>
                                                                                        <td>
                                                                                            <input name="txt_rate" id="txt_rate" class="text_boxes_numeric" style="width:70px" placeholder="Display" readonly="" type="text">
                                                                                        </td>
                                                                                        <td>
                                                                                            <input name="txt_return_value" id="txt_return_value" class="text_boxes_numeric" style="width:90px" placeholder="Display" readonly="" type="text">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <input name="order_rate" id="order_rate" class="text_boxes_numeric" style="width:80px" placeholder="Display" readonly="" type="hidden">
                                                                                    <input name="order_ile_cost" id="order_ile_cost" class="text_boxes_numeric" style="width:80px" placeholder="Display" readonly="" type="hidden">
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
                                                                            <input id="before_prod_id" name="before_prod_id" value="" type="hidden">
                                                                            <input id="update_id" name="update_id" value="" type="hidden">
                                                                            <!-- -->
                                                                            <input value="Save" name="save" onclick="fnc_yarn_receive_return_entry(0)" style="width:80px" id="save1" class="formbutton" type="button">&nbsp;&nbsp;<input value="Update" name="update" onclick="show_button_disable_msg(1)" style="width:80px" id="update1" class="formbutton_disabled" type="button">&nbsp;&nbsp;<input value="Delete" name="delete" onclick="show_button_disable_msg(2)" style="width:80px" id="Delete1" class="formbutton_disabled" type="button">&nbsp;&nbsp;<input value="Refresh" name="refresh" onclick="fnResetForm()" style="width:80px" id="Refresh1" class="formbutton" type="button">&nbsp;&nbsp;<br><hr style="height:8px;"><input value="Print" name="print" onclick="show_no_permission_msg(4)" style="width:80px" id="Print1" class="formbutton_disabled" type="button">&nbsp;&nbsp;                        </td>
                                                                    </tr>
                                                                    </tbody></table>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div style="width:990px;" id="list_container_yarn"></div>
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