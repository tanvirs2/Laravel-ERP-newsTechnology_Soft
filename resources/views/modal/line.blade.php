<!-- Modal -->
<div class="modal fade lineSelectModal" role="dialog" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button id="closeLineModal" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="portlet box red-sunglo">
                    <div style="background: #d35400" class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-users"></i>Line Select
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
                                            <th>Line Name</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <div style="" id="">
                                        <table class="rpt_table table table-bordered" id="list_view" rules="all" width="198" height="" cellspacing="0"
                                               cellpadding="0" border="0">
                                            <tbody id="lineTable">
                                            <tr class="fltrow">
                                                <th><input id="lineCodeSearch" style="width:40px;" class="flt" placeholder="Code" type="text"></th>
                                                <th><input id="searchLineCriteria" class="flt" placeholder="Search Line" type="text"></th>
                                            </tr>
                                            <?php use App\LineProduction;
                                            $lines = LineProduction::all();
                                            $sl = 1;
                                            ?>
                                            @foreach($lines as $line)
                                                <tr onclick="js_set_line('{{ $line->id }}', '{{ $line->line_name }}')"
                                                    style="cursor:pointer" id="tr_1" height="20" bgcolor="#FFFFFF">
                                                    <td width="50">{{ $sl++ }}</td>
                                                    <td align="left"><p>{{ $line->line_name }}</p></td>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    $("#searchLineCriteria").on("keyup", function () {
        var typeCrac = $(this).val().toLowerCase();
        $("#lineTable tr p").each(function() {
            var match = $(this).text().toLowerCase();
            $(this).closest('tr')[ match.indexOf(typeCrac) !== -1 ? 'show' : 'hide' ]();
        });
    });

    $("#lineCodeSearch").on("keyup", function () {
        var typeCrac = $(this).val().toLowerCase();
        $("#lineTable tr td:first-child").each(function() {
            var match = $(this).text().toLowerCase();
            //alert(match);
            $(this).closest('tr')[ match.indexOf(typeCrac) !== -1 ? 'show' : 'hide' ]();
        });
    });


    $("#lineTable tr p").click(function () {
        $("#closeLineModal").click();
    });

    $('[name="line"]').click(function () {
        //alert();
        $(".lineSelectModal").modal();
    });

    function js_set_line(id, line) {
        lineName = line;
        lineId = id;
        $('[name="line"]').val(line);
    }
</script>