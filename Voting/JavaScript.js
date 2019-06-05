$(document).ready(function() {

$('.like','.dislike').on('click', function() {
    $('.active').removeClass('active');
    $(this).addClass('active');
});
});
