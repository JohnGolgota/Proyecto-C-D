// Segundos.
let seconds = 0;
var minutes = document.querySelector("#shortbreak").value;


// Variable para cambiar los valores.
let change = 0;

// Variable para saber en que ciclo voy.
let cicloPomodoro = 0;

function prueba(minutes){
    console.log( "hola", minutes);
}

let countdown = 0; // variable to set/clear intervals


let workTime = 25;
let breakTime = 5;

let isBreak = true;
let isPaused = true;

const status = document.querySelector("#status");

// TimerDisplay es el contedor.
const timerDisplay = document.querySelector(".timerDisplay");

// Boton para empezar el conteo.
const startBtn = document.querySelector("#start-btn");

// Boton para resetear el conteo.
const resetBtn = document.querySelector("#reset");

// Parte para modificar el tiempo de trabajo.
const workMin = document.querySelector("#work-min");

// Parte para modificar el tiempo de descanso.
const breakMin = document.querySelector("#break-min");

// Audio.
const alarm = document.createElement('audio'); // A bell sound will play when the timer reaches 0
alarm.setAttribute("src", "https://www.soundjay.com/misc/sounds/bell-ringing-05.mp3");


/* EVENT LISTENERS FOR START AND RESET BUTTONS */
// startBtn.addEventListener('click', () => {
//   // Cuando damos click, para countdown, que es la variable que inicia o detiene los intervalos.
//   clearInterval(countdown);

//   // Originarlmente "IsPaused" es True, Aca la convertimos en False. False,
//   isPaused = !isPaused;
//   console.log("IsPaused -> ", isPaused);

//   // Si es false, Ejecutar "Timer", que es la funcion del temporizador. [ FALSE: NO ESTA PARADO, TRUE: ESTA PARADO ]
//   if (!isPaused) {
//     countdown = setInterval(timer, 1000);
//     console.log("IsPaused -> ", isPaused);
//     console.log("Empezo El Pomodoro ->", countdown);
//   }
// })

// resetBtn.addEventListener('click', () => {
//   clearInterval(countdown);
//   seconds = workTime * 60;
//   countdown = 0;
//   isPaused = true;
//   isBreak = true;
// })

// /* TIMER - HANDLES COUNTDOWN */
// function timer() {
//   seconds--;
//   if (seconds < 0) {
//     clearInterval(countdown);
//     alarm.currentTime = 0;
//     alarm.play();
//     seconds = (isBreak ? breakTime : workTime) * 60;
//     isBreak = !isBreak;
//   }
// }

// --------------------------------------------------------------------------------- NO LO NECESITAMOS ------------------------------------------------------------------------ //

/* UPDATE WORK AND BREAK TIMES */
// let increment = 5;

// let incrementFunctions =
//   {
//     "#work-plus": function () { workTime = Math.min(workTime + increment, 60) },
//     "#work-minus": function () { workTime = Math.max(workTime - increment, 5) },
//     "#break-plus": function () { breakTime = Math.min(breakTime + increment, 60) },
//     "#break-minus": function () { breakTime = Math.max(breakTime - increment, 5) }
//   };

// for (var key in incrementFunctions) {
//   if (incrementFunctions.hasOwnProperty(key)) {
//     document.querySelector(key).onclick = incrementFunctions[key];
//   }
// }

// --------------------------------------------------------------------------------- NO LO NECESITAMOS ------------------------------------------------------------------------ //

/* UPDATE HTML CONTENT */
function countdownDisplay() {
    let minutes = 60; // Minutos que introduzca el usuario.
    let remainderSeconds = seconds % 60;
    timerDisplay.textContent = `${minutes}:${remainderSeconds < 10 ? '0' : ''}${remainderSeconds}`;
}


// --------------------------------------------------------------------------------- NO LO NECESITAMOS ------------------------------------------------------------------------ //

// Funcion PARA EL BOTON.
function buttonDisplay() {
  if (isPaused && countdown === 0) {
    startBtn.textContent = "START";
  } else if (isPaused && countdown !== 0) {
    startBtn.textContent = "Continue";
  } else {
    startBtn.textContent = "Pause";
  }
}

// --------------------------------------------------------------------------------- NO LO NECESITAMOS ------------------------------------------------------------------------ //

// function updateHTML() {
//   countdownDisplay();
//   // buttonDisplay();
//   isBreak ? status.textContent = "Keep Working" : status.textContent = "Take a Break!";
//   workMin.textContent = workTime;
//   breakMin.textContent = breakTime;
// }

// window.setInterval(updateHTML, 100);
// document.onclick = updateHTML;

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
    
    // if {
    //     // Disminuimos un minuto y reiniciamos los segundos.
    //     if (seconds == -1){
    //         seconds = 59; minutes--;
    //     }

    //     // Alguna de esas se cumple SI o SI.
    //     if(minutes < 10 && seconds < 10){
    //         document.getElementById("timer-funct").innerText = "0" + minutes + ":" + "0" + seconds;
    //     } else if(seconds > 9 && minutes > 9){
    //         document.getElementById("timer-funct").innerText = minutes + ":" + seconds;
    //     } else if(seconds < 10 && minutes > 10){
    //         document.getElementById("timer-funct").innerText = minutes + ":" + "0" + seconds;
    //     } else if(minutes < 10 && seconds > 10){
    //         document.getElementById("timer-funct").innerText = "0" + minutes + ":" + seconds;
    //     } 

    //     seconds--;
    // }


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