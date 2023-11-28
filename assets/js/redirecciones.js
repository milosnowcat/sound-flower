function redireccionPlaylist(id){
    var nuevaURL = "/playlist.php?id=" + id;
    window.location.href = nuevaURL;
}

function redireccionCancion(id){
    var nuevaURL = "/cancion.php?id=" + id;
    window.location.href = nuevaURL;
}

function redireccionAlbum(id){
    var nuevaURL = "/album.php?id=" + id;
    window.location.href = nuevaURL;
}

function redireccionArtista(id){
    var nuevaURL = "/artista.php?id=" + id;
    window.location.href = nuevaURL;
}

function redireccionUsuario(id){
    var nuevaURL = "/usuario.php?id=" + id;
    window.location.href = nuevaURL;
}