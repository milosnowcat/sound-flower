<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['tipo'] < 2) {
?>
<script>
  alert("Inicia sesión como disquera para entrar");
  location.href = "/login.html";
</script>
<?php
} else {
  include_once 'assets/php/conexion.php';
  $usuario = $_SESSION['id'];
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="assets/css/popi.css">    
      <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
      <title>Document</title>
    </head>
    <body id="bg">
    <main class="mainpops">

<div class="overlay active" id="overlay" >
  <div class="popup" id="popup">
      <div class="ion">
        <a href="/" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i id="cerrar" class='bx bx-x'></i></a>
      </div>
      <h1>Crea tu cancion</h1>     
      <form action="assets/php/crear-cancion.php" method="post" enctype="multipart/form-data">

      <div class="input-field" id="nombre">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required />
      </div>


        <div class="input-field" id="nombre">
          <label for="archivo">Sube qui tu archivo</label>
          <input class="ayuda" type="file" name="archivo" id="archivo" accept="audio/*" required />
        </div>
        <br>
        


        <div class="input-field" id="nombre">
          <label for="duracion">Duracion</label>
          <input type="time" name="duracion" id="duracion" required>
        </div>
        

        <?php
        if ($_SESSION['tipo'] == 3) {
            $query_artista = "SELECT Id, Nombre FROM artistas";
        } else {
            $query_artista = "SELECT Id, Nombre FROM artistas WHERE Id_Disquera = $usuario";
        }
        $result_artista = mysqli_query($conn, $query_artista);
        ?>


        <div class="input-field" id="nombre">
          <label>Selecciona el Album.</label>
        </div>
        <select class="sele" name="album" id="album" required>
        <?php
        while ($row_artista = mysqli_fetch_array($result_artista)) {
            $query_album = "SELECT * FROM albumes WHERE Id_Artista = " . $row_artista["Id"];
            $result_album = mysqli_query($conn, $query_album);

            while ($row_album = mysqli_fetch_array($result_album)) {
        ?>
                <option value="<?php echo $row_album['Id'] ?>"><?php echo $row_album['Nombre'] ?></option>
        <?php
            }
        ?>
        <?php
        }
        ?>
        </select>


        <div class="input-field" id="nombre">
          <label>Selecciona el Artistas.</label>
        </div>
        <select class="sele" name="artistas[]" id="artistas" required multiple>
        <?php
        $result_artista = mysqli_query($conn, $query_artista);
        while ($row_artista = mysqli_fetch_array($result_artista)) {
        ?>
            <option class="opp" value="<?php echo $row_artista['Id'] ?>"><?php echo $row_artista['Nombre'] ?></option>
        <?php
        }
        ?>
        </select>


        <div id="terminar" >
          <input class="cerrar-popup" type="submit" value="CREAR">
        </div>


      </form>
  </div>
</div>
</main>
<script src="/assets/js/popi.js"></script>   
      
    </body>
  </html>
<?php
}

