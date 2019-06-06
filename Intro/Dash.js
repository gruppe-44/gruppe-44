
 $(document).ready(function() {
window.onload = function dateMonth() {

    var dateMonth = new Date(); 
    
    var date = dateMonth.getDate();
    
    date = (date<10?"0":"")+date;
    
    var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    
    document.getElementById("numberBack").innerHTML = date;

    document.getElementById("monthBack").innerHTML = month[dateMonth.getMonth()];
    
}

 /* Hans' Vote Box*/

 /* $(document).ready(function() {

    $('.thumb').on('click', function() {
        var cnt=0;
        var btn = $(this);
        btn.button('loading');
        setTimeout(function () {
            cnt++;
            btn.button('reset');
            btn.text('  ' + cnt);
        }, 1000);
    });
    });
 */
 /* End Hans' Vote Box*/
});