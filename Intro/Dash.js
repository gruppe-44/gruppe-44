
window.onload = function dateMonth() {

    var dateMonth = new Date(); 
    
    var date = dateMonth.getDate();
    
    date = (date<10?"0":"")+date;
    
    var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    
    document.getElementById("numberBack").innerHTML = date;

    document.getElementById("monthBack").innerHTML = month[dateMonth.getMonth()];
    
}

 /* Hans' Vote Box*/

var votedDown = document.getElementById("votedDown");
var votedUp = document.getElementById("votedUp");

var downVote = document.getElementById("thumbsDown");
var upVote = document.getElementById("thumbsUp");

var countDown = 0;
var countUp = 0;

votedDown.onclick = function() {
    if (countDown < 5) { 
        countDown += 1;
        votedDown.innerHTML = "downvotes: " + countDown;
   } else {
        votedDown.innerHTML = "downvotes: 5";
    }
}

votedUp.onclick = function() {
  if (countUp < 5) { 
        countUp += 1;
        votedUp.innerHTML = "<br>" + "upvotes: " + countUp;
    } else {
        votedUp.innerHTML = "<br>" + "upvotes: 5";
    }
}

 /* End Hans' Vote Box*/