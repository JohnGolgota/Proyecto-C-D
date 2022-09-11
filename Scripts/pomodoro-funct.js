// var seconds = prompt("Segundos -> ");
// var minutes = prompt("Minutos -> ");
// var seconds = 60;
// var minutes = 5;
// var pomodoro_timing = setInterval(function(){
//     if(minutes == 0 && seconds == 0){
//         alert("Cuenta Regresiva Terminada");
//         clearInterval(pomodoro_timing); // Detenenemos el SetInterval. 
//     }

//     if (seconds == -1){
//         seconds = 59; minutes--;
//     }

//     if(minutes < 10 && seconds < 10){
//         console.log("0" + minutes + ":" + "0" + seconds); 
//     } else if(seconds > 9 && minutes > 9){
//         console.log(minutes + ":" + seconds);
//     } else if(seconds < 10 && minutes > 10){
//         console.log(minutes + ":" + "0" + seconds);
//     } else if(minutes < 10 && seconds > 10){
//         console.log("0" + minutes + ":" + seconds);
//     } 

//     seconds--;

// }, 100);