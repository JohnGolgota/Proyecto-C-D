var seconds = prompt("Segundos -> ");
var minutes = prompt("Minutos -> ");
var pomodoro_timing = setInterval(function(){
    if(minutes == 0 && seconds == 0){
        alert("Cuenta Regresiva Terminada");
        clearInterval(pomodoro_timing); // Detenenemos el SetInterval. 
    }

    if (seconds == 0){
        seconds = 60; minutes--;
    }

    if(minutes <= 10 && seconds <= 10){
        console.log(minutes + ":" + seconds); 
    } else if(seconds < 10 && minutes < 10){
        console.log("0" + minutes + ":" + "0" + seconds);
    } else if(seconds <= 10){
        console.log("0" + minutes + ":" + seconds);
    } else if(minutes <= 10){
        console.log(minutes + ":" + "0" + seconds);
    } 

    seconds--;

}, 100);