function pomodoroFunction(){
    document.getElementById("btn-continuar-pomodoro").style.display = "none";
    document.getElementById("btn-parar-pomodoro").style.display = "block";

    var minutes = document.getElementById("minutes").value;
    var seconds = 0;

    var shortBreak = document.getElementById("shortbreak").value;
    var longBreak = document.getElementById("longbreak").value;

    console.log(minutes)

    var pomodoro_timing = setInterval(function(){
        if(minutes == 0 && seconds == 0){
            swal({
                title: "¡Buen Trabajo!",
                text: "Has hecho bastante, ¡Tomate un descanso!",
                icon: "success",
                button: "Vale",
              });
            clearInterval(pomodoro_timing); // Detenenemos el SetInterval. 
        }

        if (seconds == -1){
            seconds = 59; minutes--;
        }

        if(minutes < 10 && seconds < 10){
            document.getElementById("timer-funct").innerText = "0" + minutes + ":" + "0" + seconds;
        } else if(seconds > 9 && minutes > 9){
            document.getElementById("timer-funct").innerText = minutes + ":" + seconds;
        } else if(seconds < 10 && minutes > 10){
            document.getElementById("timer-funct").innerText = minutes + ":" + "0" + seconds;
        } else if(minutes < 10 && seconds > 10){
            document.getElementById("timer-funct").innerText = "0" + minutes + ":" + seconds;
        } 

        seconds--;

    }, 100);
}
