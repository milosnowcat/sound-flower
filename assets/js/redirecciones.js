function redireccionPlaylist(id){
    var nuevaURL = "/playlist.php?id=" + id;
    window.location.href = nuevaURL;
}

function redireccionCancion(id){
    var nuevaURL = "/player.php?id=" + id + "&t=c";
    window.location.href = nuevaURL;
}

function redireccionAlbum(id){
    var nuevaURL = "/album.php?id=" + id;
    window.location.href = nuevaURL;
}

function redireccionArtista(nom){
    var nuevaURL = "/artista.php?nombre=" + nom;
    window.location.href = nuevaURL;
}

function redireccionUsuario(){
    var nuevaURL = "/usuario.php";
    window.location.href = nuevaURL;
}

function redireccionIndex(){
    window.location.href = "/";
}