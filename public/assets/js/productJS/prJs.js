$(document).ready(function () {
    var subConFld, subConTxt;
    $(".subCon").click(function () {
        subConFld = $(this).parent().children(".subConNm");
        subConTxt = $(this).parent().children("span");
        $("#subCon").modal();
    });

    $("#subConNmSv").click(function () {
        var subConNm = $('#subConNm').val();
        subConFld.val(subConNm);
        subConTxt.text(subConNm);
    });
});