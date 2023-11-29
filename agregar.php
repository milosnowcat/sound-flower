<?php
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: /login.html");
} else {
  include_once 'assets/php/conexion.php';
  $usuario = $_SESSION['id'];
  $cancion = $_GET['id'];
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
    <body class="bodypop" id="bg">
      <main class="mainpops">

        <div class="overlay active" id="overlay" >
          <div class="popup" id="popup">
              <div class="ion">
                <a href="/" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i id="cerrar" class='bx bx-x'></i></a>
              </div>
              <h1>Agrega a tus playlist</h1>
              <form action="assets/php/agregar.php" method="post" enctype="multipart/form-data"  class="separado">

              <select class="sele" name="playlist" id="artistas" required>
              <?php
              $sql = "SELECT * FROM playlists WHERE Id_Usuario = $usuario";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                  <option class="opp" value="<?php echo $row['Id'] ?>"><?php echo $row['Nombre'] ?></option>
              <?php
              }
              ?>
              </select>

              <input type="hidden" name="cancion" value="<?php echo $cancion ?>">

                <div id="terminar" >
                  <input class="cerrar-popup" type="submit"value="AGREGAR">
                </div>
              </form>
          </div>
        </div>
      </main>
      <script src="/assets/js/popi.js"></script>
      <script type="module" src="assets/js/crear-artista.js"></script>
    </body>
  </html>
<?php
}
