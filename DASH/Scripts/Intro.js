var end = new Date('07/06/2019');

var _second = 1000;
var _minute = _second * 60;
var _hour = _minute * 60;
var _day = _hour * 24;
var timer;
    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {
            clearInterval(timer);
            document.getElementById('daysleft').innerHTML = 'EXPIRED!';
            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);
        document.getElementById('daysleft').innerHTML = days;
}
            
timer = setInterval(showRemaining, 1000);