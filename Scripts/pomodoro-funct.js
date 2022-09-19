// Segundos.
let seconds = 0;
let minutes;

// Variable para cambiar los valores.
let change = 0;

// Variable para saber en que ciclo voy.
let cicloPomodoro = 0;

// function pomodoroFunction(){
//     document.getElementById("btn-continuar-pomodoro").style.display = "none";
//     document.getElementById("btn-parar-pomodoro").style.display = "block";

//     // Tiempo.
//     var seconds = 0;
//     // var minutes = 0;

//     for (var change = 0; change < 2; change++) {
//         if(change == 0){
//             var minutes = document.getElementById("minutes").value;
//             break;
//         } else if(change == 1){
//             var minutes = document.getElementById("shortbreak").value;
//             break;
//         } else {
//             var minutes = document.getElementById("longbreak").value;
//             break;
//         }
//     }

//     console.log(minutes)

//     var pomodoro_timing = setInterval(function(){
//         if(minutes == 0 && seconds == 0){
//             swal({
//                 title: "¡Buen Trabajo!",
//                 text: "Has hecho bastante, ¡Tomate un descanso!",
//                 icon: "success",
//                 button: "Vale",
//             });

//             document.getElementById("btn-continuar-pomodoro").style.display = "block";
//             document.getElementById("btn-parar-pomodoro").style.display = "none";

//             clearInterval(pomodoro_timing); // Detenenemos el SetInterval.  
            
//         } 
        
//         else {
//             if (seconds == -1){
//                 seconds = 59; minutes--;
//             }
    
//             if(minutes < 10 && seconds < 10){
//                 document.getElementById("timer-funct").innerText = "0" + minutes + ":" + "0" + seconds;
//             } else if(seconds > 9 && minutes > 9){
//                 document.getElementById("timer-funct").innerText = minutes + ":" + seconds;
//             } else if(seconds < 10 && minutes > 10){
//                 document.getElementById("timer-funct").innerText = minutes + ":" + "0" + seconds;
//             } else if(minutes < 10 && seconds > 10){
//                 document.getElementById("timer-funct").innerText = "0" + minutes + ":" + seconds;
//             } 
    
//             seconds--;
//         }

//     }, 100);
// }

function pomodoroValues(){
    // Desde esta funcion, voy a controlar los valores.
    
    // return minutes;
}

function pomodoroTimer(){
    while (change <= 2) {
        if(change == 0){
            minutes = document.getElementById("minutes").value;
            break;
        } else if(change == 1){
            minutes = document.getElementById("shortbreak").value;
            break;
        } else {
            minutes = document.getElementById("longbreak").value;
            break;
        }
    }

    change++;
    
    // Desde esta funcion, voy a hacer el conteo.
    console.log("Minutos -> ", minutes);
    console.log("Segundos -> ", seconds);

    if(minutes == 0 && seconds == 0){
        cicloPomodoro += 1;
        pomodoroAlert();
    } 
    
    else {
        // Disminuimos un minuto y reiniciamos los segundos.
        if (seconds == -1){
            seconds = 59; minutes--;
        }

        // Alguna de esas se cumple SI o SI.
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
    }
}

function pomodoroAlert(){
    // Esta funcion, me da la alerta de los descansos.
    if(cicloPomodoro % 2 != 0){
        swal({
            title: "¡Buen Trabajo!",
            text: "Has hecho bastante, ¡Tomate un descanso!",
            icon: "success",
            button: "Vale",
        });
    } else if(ciclo % pomodoro == 0){
        swal({
            title: "¡De nuevo a la acción!",
            text: "Ya has descansado, ¡Sigamos!",
            icon: "success",
            button: "Vale",
        });
    }
}

function pomodoroExecute(){
    pomodoroValues();
    pomodoroTimer();
}

// pomodoroValues();

// console.log(change);
// pomodoroValues();

// console.log(change);
// pomodoroValues();