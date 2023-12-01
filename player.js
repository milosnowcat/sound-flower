let player = document.getElementById('player');
let pausa = 1;
let imgPlay = "playerSvg/play-solid.svg";
var currentTime = player.currentTime;
let duration;
let canciones = document.getElementById('player').src;
let i = 0;
document.getElementById("player").src=canciones;

console.log(canciones);

//funcion para pausar y reproducir canciones
document.getElementById("jajawe").src=imgPlay;
document.getElementById('buttonAudio').addEventListener("click", function () {
    pausa += 1;
    if (pausa % 2 == 0) {
        player.pause();
        imgPlay = "playerSvg/play-solid.svg";
    } else {
        player.play();
        imgPlay = "playerSvg/pause-solid.svg";
    }
    document.getElementById("jajawe").src=imgPlay;
});


//funcion para cambiar el current time y el progreso de la barra
var intervalId = setInterval(function () {
    currentTime = Math.round(player.currentTime);
    duration = player.duration;
    document.getElementById('progress').style.width = (((100 / duration) * currentTime) + "%");
    document.getElementById('currentBar').innerHTML = (Math.floor(currentTime / 60)) + ":" + ((currentTime % 60) < 10 ? "0" + (currentTime % 60) : (currentTime % 60));
    document.getElementById('durationBar').innerHTML = (Math.floor(duration / 60) + ":" + Math.round(duration % 60));
}, 1000);


//boton de regreso a una cancion
document.getElementById("before__button").addEventListener("click", function () {
    i == 0 ? i = 1 : "";
    i--;
    document.getElementById("player").src=canciones[i];
    document.getElementById('player').play();
    imgPlay = "playerSvg/pause-solid.svg";
    document.getElementById("jajawe").src=imgPlay;
});

//boton de cancion siguiente
document.getElementById("next__button").addEventListener("click", function () {
    i == (canciones.length - 1) ? i = (canciones.length - 2) : "";
    console.log(canciones.length)
    i++;
    document.getElementById("player").src=canciones[i];
    document.getElementById('player').play();
    imgPlay = "playerSvg/pause-solid.svg";
    document.getElementById("jajawe").src=imgPlay;
});


//comprueba si la cancion ya termino para que se reproduzca la siguiente
var cambiarCancion = setInterval(function () {
    if(Math.round(duration) == currentTime) {
        i == (canciones.length - 1) ? i = 0 : i++;
        document.getElementById("player").src=canciones[i];
        document.getElementById('player').play();
    }
}, 1000);

// chilleando 

function reproducirCancion(idCancion, tipo, numero) {
    if(tipo === 'c') {
        idCancion++;
        if(idCancion == 51) {
            idCancion = 1;
        }
    }
    var url = "player.php?id=" + idCancion + "&t=" + tipo + "&n=" + numero;

    window.location.href = url;
}
