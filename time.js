    document.addEventListener('DOMContentLoaded', function() {
        
    let date= new Date();
    
    let countdownInterval; 

    let time = document.getElementById("time");
            
    function startCountdown() {
        countdownInterval = setInterval(function() { 
        date= new Date();

        time.textContent = date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
        }, 1000);
    }
    startCountdown();    
    });