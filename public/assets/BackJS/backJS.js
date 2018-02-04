/**
 * Created by Tanvir on 6/12/2017.
 */
/*Base URL*/
var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var laravelBaseUrl = baseUrl + "/public";
/*Base URL*/
$(document).ready(function () {
    //alert(laravelBaseUrl);
    $(function(){

        // Bind an event to window.onhashchange that, when the hash changes, gets the
        // hash and adds the class "selected" to any matching nav link.
        $(window).hashchange( function(){
            var hash = location.hash;

            // Set the page title based on the hash.
            document.title = ( hash.replace( /^#/, '' ) || document.title );

            // Iterate over all nav links, setting the "selected" class as-appropriate.

            var url = window.location.href;
            //alert(url.substring(url.indexOf('#'), url.indexOf('dataChk')));

            if (url.includes('#ShipmentSchedule') == true) {
                $('.content-wrapper:eq(0)').load(laravelBaseUrl+'/Order?chart='+new Date().getFullYear());
            }
            if (url.includes('#ShipmentSchedule?chart=') == true) {
                $('.content-wrapper:eq(0)').load(laravelBaseUrl+'/Order?chart='+new Date().getFullYear());
            }

            /*if (url.substring(url.indexOf('#')) == '#ShipmentSchedule') {
                $('.content-wrapper:eq(0)').load(laravelBaseUrl+'/Order');
            }
            if (url.substring(url.indexOf('#'), url.indexOf('dataChk')) == '#ShipmentSchedule/customer_name/') {
                $('.content-wrapper:eq(0)').load(laravelBaseUrl+'/Order');
            }*/
        });

        // Since the event is only triggered when the hash changes, we need to trigger
        // the event now, to handle the hash the page may have loaded with.
        $(window).hashchange();

    });
});