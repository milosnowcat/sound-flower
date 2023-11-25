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
      <title>Document</title>
    </head>
    <body>
      <form action="assets/php/crear-cancion.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required />
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" id="archivo" accept="audio/*" required />
        <label for="duracion">Duracion</label>
        <input type="time" name="duracion" id="duracion" required>

        <?php
        if ($_SESSION['tipo'] == 3) {
            $query_artista = "SELECT Id, Nombre FROM artistas";
        } else {
            $query_artista = "SELECT Id, Nombre FROM artistas WHERE Id_Disquera = $usuario";
        }
        $result_artista = mysqli_query($conn, $query_artista);
        ?>
        <label for="album">Album</label>
        <select name="album" id="album" required>
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
        <label for="artistas">Artistas</label>
        <select name="artistas[]" id="artistas" required multiple>
        <?php
        $result_artista = mysqli_query($conn, $query_artista);
        while ($row_artista = mysqli_fetch_array($result_artista)) {
        ?>
            <option value="<?php echo $row_artista['Id'] ?>"><?php echo $row_artista['Nombre'] ?></option>
        <?php
        }
        ?>
        </select>
        <input type="submit" value="Crear">
      </form>
    </body>
  </html>
<?php
}

