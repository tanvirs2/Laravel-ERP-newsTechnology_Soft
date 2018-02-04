<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

<div style="width:800" align="center">
    <!--? ob_start() ?-->
    <table style="font-size:9px" width="700" bgcolor="#FFFFFF">
        <tbody><tr>
            <td rowspan="2" width="293" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{--<img src="../resources/images/asro_logo.png" width="146" height="66">--}} </td>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="+2"><b><u>নিয়োগ পত্র</u></b></font><br>
                <b>APPOINTMENT LETTER</b></td>
        </tr>
        <tr>
            <td width="395" align="left">&nbsp;</td>
        </tr>
        <tr>
            <td width="293"><b>Unit: WestApparel LTD.</b></td>
            <td width="395">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="font-size:9px" width="100%">
                    <tbody><tr>
                        <td width="14%">কার্ড নং</td>
                        <td width="16%">:<!--? echo $row["id_card_no"]; ?--></td>
                        <td width="12%">নামঃ</td>
                        <td width="27%">:<!--? echo $row["full_name_bangla"]; ?--></td>
                        <td width="6%">পদবী</td>
                        <td width="25%">:<!--? echo $designation; ?--></td>
                    </tr>
                    <tr>
                        <td>গ্রেডে  (শ্রমিক/কর্মচারী)</td>
                        <td>:<!--? echo $row["salary_grade"]; ?--></td>
                        <td style="font-family:'Kalpurush ANSI'">যোগদানের  তারিখঃ</td>
                        <td>:<!--? echo $row["joining_date"]; ?--></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody></table>
            </td>

        </tr>
        <tr>
            <td><b>চাকুরীর শর্ত ও নিয়মাবলী </b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><b>১। বেতন ও ভাতাঃ</b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="font-size:9px" width="100%">
                    <tbody><tr>
                        <td width="43%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ক) মূল বেতন (Monthly Basic Pay) </td>
                        <td style="font-family:'Kalpurush ANSI'" width="34%">টাকাঃ..................<!--? echo $basic_salary; ?-->...........................</td>
                        <td style=" border:1px solid;font-family:'Kalpurush ANSI'" width="23%" align="center"> প্রতি ঘন্টায় ওভারটাইম</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;খ) বাড়ী ভাড়া (House Rent-40% of Basic pay)</td>
                        <td style="font-family:'Kalpurush ANSI'">টাকাঃ..................<!--? echo $house_rent; ?-->...........................</td>
                        <td rowspan="3" style="border:1px solid;font-family:'Kalpurush ANSI'"> টাকাঃ....<!--? echo $overtime; ?-->.......</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;গ) চিকিৎসাভাতা (Medical Allowance)</td>
                        <td style="font-family:'Kalpurush ANSI'">টাকাঃ..................<!--? echo $medical_allowance; ?-->...........................</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ঘ) অন্যান্য ভাতা (Other Allowance)</td>
                        <td style="font-family:'Kalpurush ANSI'">টাকাঃ..................<!--? echo $others; ?-->...........................</td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>

                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; মোট বেতন (Monthly Gross Pay)</td>
                        <td style="font-family:'Kalpurush ANSI'">টাকাঃ..................<!--? echo $gross; ?-->......................./=</td>
                    </tr>
                    </tbody></table>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <!--
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;মোট বেতন (Monthly Gross Pay)</td>
          <td>টাকাঃ..................<!? echo $gross; ?>......................./=</td>
        </tr>
        -->
        <tr>
            <td colspan="2"><b>২। কর্মঘন্টা ও ওভারটাইমঃ </b></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ক) দৈনিক কর্মঘন্টা				ঃ ০৮ ঘন্টা। 		খ) বিরতি ঃ	 	প্রতিকর্ম  দিবস/শিফটে ১ ঘন্টা। </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;খ) দৈনিক ওভারটাইমঃ শ্রমিকের সম্মিত ক্রমে সর্বোচ্চ ০২  ঘন্টা বা সরকারী নিয়ম মোতাবেক। দৈনিক ০৮ ঘন্টার বেশী কাজ ও.টি. হিসাবে গনঃ করা হয়। </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;গ) ওভারটাইম হিসাবঃ মূল বেতনের দ্বিগুন হারে হিসাব করা হয়। হিসাব মূল বেতন ২০৮×২×মূল ওভারটাইম ঘন্টা।</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ঘ) বেতন প্রদানের সময়ঃ প্রত্যেক মাসের ১ম সপ্তাহে বেতন ও ওভারটাইম একত্রে প্রদান করা হয়।</td>
        </tr>
        <tr>
            <td colspan="2"><b>৩। সাধারণ ছুটিঃ</b></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ক) সাপ্তাহিক ছুটিঃ সপ্তাহে ০১(এক) দিন সাধারনত  শুক্রবার। </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;খ) উৎসবজনিত ছুটিঃ বছরে ১১(এগারো) দিন (পূর্ণ বেতনে)।</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;গ) নৈমিত্তিক ছুটিঃ বছরে ১০(দশ) দিন (পূর্ণ বেতনে)।</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ঘ) চিকিৎসা ছুটিঃ বছরে ১৪(চৌদ্দ) দিন।</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ঙ) অর্জিত ছুটিঃ প্রতি ১৮ কর্মদিনের জন্য ১(এক) দিন (পূর্ণ বেতনে) কমপক্ষে ০১ বছর চাকুরী পূর্ণ করলে। সর্বোচ্চ ৮০ দিন পর্যন্ত জমা করা যাবে।</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;চ) মাতৃত্বকালীন ছুটিঃ ১৬ সপ্তাহ বা ১১২(একশত বারো) দিন (পূর্ণ বেতনে)।মাতৃত্বকালীন আইন, ২০০৬ মোতাবেক।</td>
        </tr>
        <tr>
            <td colspan="2"><b>৪। অন্যান্য সুবিধাঃ</b></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ক) প্রাথমিক চিকিৎসা সুবিধা প্রদান করা হয়।</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;খ) অন্যান্য ধর্মালম্বীদের জন্য তাদের নিজ প্রধান ধর্মীয় উৎসবে পর্যন্ত ছুটি প্রদান করা হয়।</td>
        </tr>
        <tr>
            <td colspan="2"><b>৫। শর্তাবলীঃ </b></td>
        </tr>
        <tr>
            <td colspan="2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ক) আপনাকে ০৩(তিন) মাসের প্রবেশনকালীন সময়ের  জন্য নিয়োগ করা হল। কৃতিত্বের সাথে প্রবেশনকালীন সময় সমাপ্তির পর চাকরী স্থায়ীকরণ  পত্র প্রদান করা হবে এবং আপনি নিয়মিত শ্রমিক/কর্মচারী হিসেবে বিবেচিত হবে। প্রবেশন  পিরিয়ডে কোম্পানী যে কোন সময় কোন প্রকার নোটিশ ছাড়াই আপনার চাকুরীর অবসান করতে  পারেন বা আপনিও চাকুরী থেকে ইস্তফা নিতে পারেন। সেক্ষেত্রে আপনার হাজিরা অনুযায়ী  সকল পাওনা পরিশোধ করা হবে। </td>
        </tr>
        <tr>
            <td colspan="2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;খ) চাকুরী স্থায়ী হবার পর স্বেচ্ছায় চাকুরী ছেড়ে দিতে চাইলে ৬০(ষাট) দিনের লিখিত নোটিশ বা নোটিশের পরিবর্তে বেতন সমর্পন করতে হবে। অন্যদিকে কর্তৃপক্ষ আপনার চাকুরীর অবসান করতে চাইলে ১২০(একশত বিশ) দিনের লিখিত নোটিশ অথবা নোটিশের পরিবর্তে মজুরী প্রদান করবেন।</td>
        </tr>
        <tr>
            <td colspan="2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;গ) আপনার চাকুরী কোম্পানী কর্তৃক জারীকৃত বিধি-বিধান ও বাংলাদেশ প্রচলিত শ্রম আইন দ্বারা পরিচালিত হবে। কোম্পানীর যাবতীয় নিয়ম কানুন পরিবর্তনযোগ্য এবং আপনি পরিবর্তিত নিয়ম-কানুন সর্বদা মেনে চলবে বাধ্য থাকবেন। আপনি যদি কখনও কোন রুপ অসদাচরণের অপরাধে দোষী প্রমানিত হন, তবে কর্তৃপক্ষ আইন মোতাবেক আপনাকে চাকুরীচ্যুতিসহ যে কোন শাস্তি দিতে পারবেন।</td>
        </tr>
        <tr>
            <td colspan="2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ঘ) কর্তৃপক্ষ প্রয়োজনবোধে আপনাকে এই প্রতিষ্ঠানের যে কোন বিভাগে বা এই গ্রুপের যে কোন কারখানায়/অফিসে বদলি করতে পারবেন।</td>
        </tr>
        <tr>
            <td colspan="2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ঙ) অত্র প্রতিষ্ঠানের কর্মরত থাকাকালীন সময় অন্য কোথাও প্রত্যেক্ষ বা পরোক্ষভাবে কোন চাকুরী গ্রহন করতে পারবেন না। আপনার চাকুরীর পরি-সমাপ্তি ঘটলে আপনি এই কোম্পানির সমস্ত কাগজপত্র, দলিলাদি অথবা কোন বস্ত আপনার হেফাজতে থাকলে, সেই সকল দ্রব্যাদি আপনি ফেরত দিবেন এবং কোম্পানির ব্যবসা সংক্রান্ত কোন কাগজপত্রের নকল অথবা অংশ বিশেষ আপনার নিকট রাখতে পারবেন না।</td>
        </tr>

        <tr>
            <td colspan="2" align="right">&nbsp;</td>
        </tr>

        <tr>
            <td colspan="2" align="right"><p>------------------------------------<br>
                    নিয়োগকারী(Employer)&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
        </tr>
        <tr>
            <td colspan="2">প্রত্যেয়নঃ </td>
        </tr>
        <tr>
            <td colspan="2" style="font-family:'Kalpurush ANSI'" align="justify"><p style="font-family:'Kalpurush ANSI'">আমি ......<!--? echo $row["full_name_bangla"]; ?-->.......এই নিয়োগ পত্রের  শর্তাবলী পাঠ করেছি/আমাকে পাঠ করে শুনানো হয়েছে। এতে বর্ণিত শর্তাদি সম্পূর্ণরুপে  অবগত হয়ে, আমি স্বেচ্ছায় ও স্বজ্ঞানে উপরোক্ত শর্তসমূহ মেনে নিয়ে, এই নিয়োগপত্রে  স্বাক্ষর করে অনুলিপি গ্রহন করছি। এবং ওয়েস্টএপারেল গ্রুপে....<!--? echo $row["joining_date"]; ?-->.....তারিখ হতে কাজে  যোগদান করছি। </p></td>
        </tr>
        <tr>
            <td>তারিখ.....................................</td>
            <td align="right"><p>------------------------------------<br>প্রার্থীর স্বাক্ষর&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
        </tr>
        </tbody></table>

</div>

</body>

<script>
    $(document).ready(function(){
        window.print();
    });
</script>
</html>

