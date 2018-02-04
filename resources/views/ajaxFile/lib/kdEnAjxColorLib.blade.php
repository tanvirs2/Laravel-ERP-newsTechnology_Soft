<div class="portlet box red-sunglo">
    <div style="background: #d35400" class="portlet-title">
        <div class="caption">
            <i class="fa fa-paint-brush"></i>Color Select
        </div>

    </div>
    <div class="portlet-body">

        <div class="form-body">
            <div align="center">
                <input id="color_name" name="color_name" type="hidden">
                <div>
                    <table class="rpt_table" rules="all" width="220" cellspacing="0" cellpadding="0" border="0">
                        <thead>
                        <tr>
                            <th width="42">Sl No</th>
                            <th>Color Name</th>
                        </tr>
                        </thead>
                    </table>
                    <div style="" id="">
                        <table class="rpt_table table table-bordered" id="list_view" rules="all" width="198" height="" cellspacing="0"
                               cellpadding="0" border="0">
                            <tbody id="colorTable">
                            <tr class="fltrow">
                                <th><input id="colorCodeSearch" style="width:40px;" class="flt" placeholder="Code" type="text"></th>
                                <th><input id="searchCriteria" class="flt" placeholder="Search Color" type="text"></th>
                            </tr>
                            <?php use App\Color;
                            $colors = Color::all();
                            $sl = 1;
                            ?>
                            @foreach($colors as $color)
                                <tr onclick="js_set_value('{{ $color->id }}', '{{ $color->color_name }}')"
                                    style="cursor:pointer" id="tr_1" height="20" bgcolor="#FFFFFF">
                                    <td width="50">{{ $sl++ }}</td>
                                    <td align="left"><p>{{ $color->color_name }}</p></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<script>
    $("#searchCriteria").on("keyup", function () {
        var typeCrac = $(this).val().toLowerCase();
        $("#colorTable tr p").each(function() {
            var match = $(this).text().toLowerCase();
            $(this).closest('tr')[ match.indexOf(typeCrac) !== -1 ? 'show' : 'hide' ]();
        });
    });

    $("#colorCodeSearch").on("keyup", function () {
        var typeCrac = $(this).val().toLowerCase();
        $("#colorTable tr td:first-child").each(function() {
            var match = $(this).text().toLowerCase();
            //alert(match);
            $(this).closest('tr')[ match.indexOf(typeCrac) !== -1 ? 'show' : 'hide' ]();
        });
    });


    $("#colorTable tr p").click(function () {
        $("#closeColorModal").click();
    });
</script>