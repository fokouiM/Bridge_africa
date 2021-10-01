window.onload = function time2(){
var h1 = document.getElementsByTagName('time')[0];
var start = document.getElementById('strt');
var stop = document.getElementById('stp');
var reset = document.getElementById('rst');
var sec = 0;
var min = 0;
var hrs = 0;
var t;

function tick(){
    sec++;
    if (sec >= 60) {
        sec = 0;
        min++;
        if (min >= 60) {
            min = 0;
            hrs++;
        }
    }
}
function add() {
    tick();
    h1.textContent = (hrs > 9 ? hrs : "0" + hrs)
        	 + ":" + (min > 9 ? min : "0" + min)
       		 + ":" + (sec > 9 ? sec : "0" + sec);
    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}

timer();
}



// window.onload = function time(){
//     var heure = document.getElementById('timetime')[0];
//     var seconde = 0;
//     var minute = 0;
//     var heusec = 0;
//     var z;

//     function tick(){
//         seconde++;
//         if (seconde >= 60) {
//             seconde = 0;
//             minute++;
//             if (minute >= 60) {
//                 minute = 0;
//                 heusec++;
//             }
//         }
//     }
//     function add() {
//         tick();
//         heure.textContent = (heusec > 9 ? heusec : "0" + heusec)
//                  + ":" + (minute > 9 ? minute : "0" + minute)
//                     + ":" + (seconde > 9 ? seconde : "0" + seconde);
//         timer();
//     }
//     function timer() {
//         z = setTimeout(add, 1000);
//     }

//     timer();
//     }
