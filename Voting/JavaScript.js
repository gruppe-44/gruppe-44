$(document).ready(function() {

$('.like','.dislike').on('click', function() {
    $('.active').removeClass('active');
    $(this).addClass('active');
    var cnt=2;
    var btn = $(this);
    btn.button('loading');
    setTimeout(function () {
        cnt++;
        btn.button('reset');
        btn.text('  ' + cnt);
    }, 1000);
});
});