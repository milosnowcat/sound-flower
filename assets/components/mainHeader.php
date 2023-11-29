<?php
    require_once('assets/php/conexion.php');
    $_SESSION['id'] = '1';
    $id = $_SESSION['id'];

    $selectorIMG = "SELECT Foto FROM usuarios WHERE Id = '$id'";
    $envioIMG = mysqli_query($conn, $selectorIMG);
    if(mysqli_num_rows($envioIMG) > 0){
        $filaUsuario = mysqli_fetch_assoc($envioIMG);
        $img = $filaUsuario['Foto'];
    }
    else{
        $img = "/assets/img/user.jpg";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/components/mainHeader.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <script src="assets/js/redirecciones.js"></script>
</head>
<body>
    <header id="main_Header">
        <section onclick="redireccionIndex()" id="logo_Container">
            <img src="logo.svg">
        </section>

        <nav id="navegation_Conatiner">
            <form action="" method="post">
                <label>
                    <section id="search_Container">
                        <input type="search" 
                        name="searchHeader"
                        placeholder="¿Qué canción quieres escuchar?"
                        >
                    </section>
                    <section id="lupa_Container">
                        <i class='bx bx-search'></i>
                    </section>
                </label>
            </form>
        </nav>

        <section onclick="redireccionUsuario(<?php echo $id ?>)" id="user_Container">
            <img src="<?php echo $img ?>">                    
        </section>
    </header>
</body>
</html>


