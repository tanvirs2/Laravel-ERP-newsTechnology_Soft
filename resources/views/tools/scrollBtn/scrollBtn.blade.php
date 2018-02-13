<style>

</style>
<script>
    $(document).ready(function () {
        $('.scrollleft').click(function () {
            $('#table-scrollable').animate({
                scrollLeft: '-=300'
            }, 1000);
        });
        $('.scrollright').click(function () {
            $('#table-scrollable').animate({
                scrollLeft: '+=300'
            }, 1000);
        });
        $('.rstLeft').click(function () {
            $('#table-scrollable').animate({
                scrollLeft: '-=5000'
            }, 1000);
        });
        $('.rstRight').click(function () {
            $('#table-scrollable').animate({
                scrollLeft: '+=5000'
            }, 1000);
        });
    });
</script>
<div id="scrollBtn">
    <div class="scroll-btn scrollleft text-center">LEFT</div>
    <button class="rstLeft" style="float: left; margin: 1px"><b><</b></button>
    <button class="rstRight" style="float: left; margin: 1px"><b>></b></button>
    <div class="scroll-btn scrollright text-center">RIGHT</div>
</div>