
function getDaysRemaining(endtime){
var t = Date.parse(endtime) - Date.parse(new Date());
  var days = Math.floor( t/(1000*60*60*24) );
  return days;
}
function getPercentage(starttime, endtime) {
  startDate = Date.parse(starttime);
  endDate = Date.parse(endtime);
  diff = endDate - startDate;
  totalDays = Math.floor( diff/(1000*60*60*24) );
  var progressDiff = Date.parse(new Date()) - Date.parse(starttime);
  var progressDays = Math.floor( progressDiff/(1000*60*60*24) );
  totalDaysLeft = progressDays/totalDays;
  decimalToPercent = (1-totalDaysLeft);
  percentageDays = Math.floor(decimalToPercent * 100);
  percentagemin = (100-percentageDays)
  percentage = (0+percentagemin)
  return percentage
}
var startDate = '2019-05-02';
var endDate = '2019-07-06';
var daysLeft = getDaysRemaining(endDate);
var percentComplete = getPercentage(startDate, endDate);
document.getElementById('bar').style.width = percentComplete.toString() + '%';

var countdown = document.getElementById('daysleft');
countdown.innerHTML = daysLeft.toString();

timer = setInterval(showRemaining, 1000);