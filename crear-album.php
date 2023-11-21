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
      <form action="assets/php/crear-album.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required />
        <label for="foto">Portada</label>
        <input type="file" name="foto" id="foto" accept="image/*" />
        <img id="preview" src="/assets/img/album.jpg" alt="album" />
        
        <label for="artista">Artista</label>
        <select name="artista" id="disquera" required>
        <?php
        if ($_SESSION['tipo'] == 3) {
            $query = "SELECT Id, Nombre FROM artistas";
        } else {
            $query = "SELECT Id, Nombre FROM artistas WHERE Id_Disquera = $usuario";
        }
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['Id'] ?>"><?php echo $row['Nombre'] ?></option>
        <?php
        }
        ?>
        </select>
        <input type="submit" value="Crear">
      </form>
      <script type="module" src="assets/js/crear-artista.js"></script>
    </body>
  </html>
<?php
  }
