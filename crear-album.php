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
    <body class="bodypop">
      <main class="mainpops">

        <div class="btnhi">
          <input class="abrir-popu2" id="abrir-popup" type="submit" value="Crear album" > 
        </div>

        <div class="overlay" id="overlay" >
          <div class="popup" id="popup">
              <div class="ion">
                <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i id="cerrar" class='bx bx-x'></i></a>
              </div>
              <h1>Crea tu album</h1>       
              <form action="assets/php/crear-album.php" method="post" enctype="multipart/form-data"  class="separado">
                
                <div class="input-field" id="nombre">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" required />
                </div>
                  
                <div class="input-field" id="nombre">
                  <label for="foto" class="foto" >Cambiar portada <br> <img class="imags" id="preview" src="/assets/img/album.jpg" alt="album" /></label>
                  <input class="ayuda"  type="file" name="foto" id="foto" accept="image/*" />
                  
                </div>
                <br>
                <div class="input-field" id="nombre">
                  <label>Selecciona el artista.</label>
                </div>

                <select class="sele" name="artista" id="artista" required>
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

                <div id="terminar" >
                  <input class="cerrar-popup" type="submit"value="CREAR">
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
