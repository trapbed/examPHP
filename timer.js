document.addEventListener('DOMContentLoaded', function() {//прослушиватель событий на загрузку страницы
    let  timerElement = document.getElementById('timer');//переменная, хранящая блок с селектором timer

    let countdownInterval;//создание переменной без ее определения
    let timeRemaining = 30; //переменная со значением начала отсчета
   
    function updateTimerDisplay() {//функция ввода переменной начала отсчета
      timerElement.textContent = timeRemaining;
    }
  
    function startCountdown() {//функция обратного отсчета
      updateTimerDisplay(); 
  
      countdownInterval = setInterval(function() {
        timeRemaining--;
  
        if (timeRemaining < 1) {//если значение меньше 1 вызывается функция переадресации
          clearInterval(countdownInterval);
          redirection();
        } else {
          updateTimerDisplay();//в ином случае отсчет продолжается
        }
      }, 1000);
    }
  
    function redirection() {//переадресация
      location.href="fail.html";
    }
  
    startCountdown();
  });
  