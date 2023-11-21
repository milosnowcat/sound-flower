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
      <title>Document</title>
    </head>
    <body>
      <form action="assets/php/crear-disquera.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required />
        <label for="mail">Correo</label>
        <input type="email" name="mail" id="mail" value="@soundflower.rahcode.com" required />
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" id="pass" readonly />
        <input type="submit" value="Crear" />
      </form>
      <script type="module" src="assets/js/crear-disquera.js"></script>
    </body>
  </html>
<?php
  }
