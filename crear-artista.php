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
            <div class="io">
              <a href="/" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i id="cerrar" class='bx bx-x'></i></a>
            </div>
            <h1>Crea tu album</h1>     

            <form action="assets/php/crear-artista.php" method="post" enctype="multipart/form-data">

              <div class="input-field" id="nombre">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required />
              </div>


              <div class="input-field" id="nombre">
                <label for="descripcion">Descripción</label>
                <textarea class="text" name="descripcion" id="descripcion" cols="30" rows="10" required></textarea>
              </div>
              
              <div class="input-field" id="nombre">
                <label for="foto">Cambiar Foto <br> <img class="imags" id="preview" src="/assets/img/artist.jpg" alt="album" /></label>
                <input class="ayuda" type="file" name="foto" id="foto" accept="image/*" />
              </div>

              <?php
              if ($_SESSION['tipo'] == 3) {
                ?>
                <div class="input-field" id="nombre">
                  <label>Selecciona la Disquera.</label>
                </div>
                
                <select class="sele" name="disquera" id="disquera" required>
                  <?php
                  $query = 'SELECT Id, Nombre FROM usuarios WHERE Tipo_Usuario = 2';
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <option value="<?php echo $row['Id'] ?>"><?php echo $row['Nombre'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              <?php
              }
              ?>


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
