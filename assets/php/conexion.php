<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sound";
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn,'utf8');

if (!$conn){
    echo '<h1>Ha ocurrido un error al conectar con la base de datos >:3</h1><img src="/assets/img/cat.jpeg" alt="gato">';
}
