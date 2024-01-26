    document.addEventListener('DOMContentLoaded', function() {
        
    let date= new Date();
    
    let countdownInterval; 

    let time = document.getElementById("time");
            
    function startCountdown() {
        countdownInterval = setInterval(function() { 
        date= new Date();

    let hour=date.getHours();
    if (hour<10) {hour=`0${hour}`;}

    let min=date.getMinutes();
    if (min<10) {min=`0${min}`;}

    let sec=date.getSeconds();
    if (sec<10) {sec=`0${sec}`;}
    
        time.textContent = hour+":"+min+":"+sec;
        }, 1000);
    }
    startCountdown();    
    });