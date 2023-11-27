<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
?>
<script>
  alert("Inicia sesión como administrador para entrar");
  location.href = "/login.html";
</script>
<?php
} else {
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
    <body>
    <main class="mainpops">

<div class="btnhi">
  <input class="abrir-popu2" id="abrir-popup" type="submit" value="Crear cancion" > 
</div>

<div class="overlay" id="overlay" >
  <div class="popup" id="popup">
      <div class="ion">
        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i id="cerrar" class='bx bx-x'></i></a>
      </div>
      <h1>Crea tu disquera</h1>     
      <form action="assets/php/crear-disquera.php" method="post">

      <div class="input-field" id="nombre">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required />
      </div>
        

      <div class="input-field" id="nombre">
        <label for="mail">Correo</label>
        <input type="email" name="mail" id="mail" value="@soundflower.rahcode.com" required />
      </div>
        

      <div class="input-field" id="nombre">
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" id="pass" readonly />
      </div>
        
        

        <div id="terminar" >
          <input class="cerrar-popup" type="submit"value="CREAR">
        </div>

      </form>
  </div>
</div>
</main>
<script src="/assets/js/popi.js"></script> 

      <script type="module" src="assets/js/crear-disquera.js"></script>
    </body>
  </html>
<?php
  }
