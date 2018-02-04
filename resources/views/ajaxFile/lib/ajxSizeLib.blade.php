<div class="portlet box red-sunglo">
    <div style="background: #d35400" class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i>Size Select
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
                            <th>Size Name</th>
                        </tr>
                        </thead>
                    </table>
                    <div style="" id="">
                        <table class="rpt_table table table-bordered" id="list_view" rules="all" width="198" height="" cellspacing="0"
                               cellpadding="0" border="0">
                            <tbody id="sizeTable">
                            <tr class="fltrow">
                                <th><input id="sizeCodeSearch" style="width:40px;" class="flt" placeholder="Code" type="text"></th>
                                <th><input id="searchSizeCriteria" class="flt" placeholder="Search Size" type="text"></th>
                            </tr>
                            <?php use App\Sizes;
                            $sizes = Sizes::all();
                            $sl = 1;
                            ?>
                            @foreach($sizes as $size)
                                <tr onclick="js_set_size('{{ $size->id }}', '{{ $size->size_name }}')"
                                    style="cursor:pointer" id="tr_1" height="20" bgcolor="#FFFFFF">
                                    <td width="50">{{ $sl++ }}</td>
                                    <td align="left"><p>{{ $size->size_name }}</p></td>
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
<button style="display: none" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


<script>
    $("#searchSizeCriteria").on("keyup", function () {
        var typeCrac = $(this).val().toLowerCase();
        $("#sizeTable tr p").each(function() {
            var match = $(this).text().toLowerCase();
            $(this).closest('tr')[ match.indexOf(typeCrac) !== -1 ? 'show' : 'hide' ]();
        });
    });

    $("#sizeCodeSearch").on("keyup", function () {
        var typeCrac = $(this).val().toLowerCase();
        $("#sizeTable tr td:first-child").each(function() {
            var match = $(this).text().toLowerCase();
            //alert(match);
            $(this).closest('tr')[ match.indexOf(typeCrac) !== -1 ? 'show' : 'hide' ]();
        });
    });

    var szLib;
    function js_set_size(szId, szName) {
        szLib = { 'szId':szId, 'szName':szName};
        $(".myAjaxModalChild ").modal('hide');
    }
    window.szLib;

    var sizeName;
    $("#sizeTable tr p").click(function () {
        sizeName = $(this).text();
        $(".myAjaxModalChild ").modal('hide');
    });
    window.sizeName;
</script>