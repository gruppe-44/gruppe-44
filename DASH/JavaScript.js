$(document).ready(function() {

$('.thumbup',).on('click', function() {
    var cnt=0;
    var btn = $(this);
    btn.button('loading');
    setTimeout(function () {
        cnt++;
        btn.button('reset');
        btn.text('  ' + cnt);
    });
});

$('.thumbdown',).on('click', function() {
    var cnt=0;
    var btn = $(this);
    btn.button('loading');
    setTimeout(function () {
        cnt++;
        btn.button('reset');
        btn.text('  ' + cnt);
    });
});
});