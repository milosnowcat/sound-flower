<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/style.css">    
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/css/Home.css">
    <title>Home</title>
</head>
<body>
    <script src="assets/js/slider.js"></script>
    <?php
        require 'mainHeader.php';
    ?>

    <main id="main_Home">
        <section id="playlists_Container">
            <h1>Playlists</h1>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>Mis me gusta</h2>
                    <p>Playlist</p>
                </div>
            </a>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>Música clásica</h2>
                    <p>Playlist</p>
                </div>
            </a>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>El ghostic</h2>
                    <p>Playlist</p>
                </div>
            </a>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>Mix para llorar</h2>
                    <p>Playlist</p>
                </div>
            </a>

            <a class="add_Playlists" href="">
                <i class='bx bxs-plus-circle'></i>
            </a>
        </section>



        <section class="containers_Home">
            <h1>Favoritos</h1>
            <article class="box_Covers_Container">
                <a href="" class="box_Covers square_Covers">
                    <img src="assets/img/cat.jpeg">
                </a>
            </article>
            <div class="slider_Container">
                <button class="slider_prev"><</button>
                <button class="slider_next">></button>
            </div>
        </section>



        <section class="containers_Home">
            <h1>Artistas seguidos</h1>
            <article class="box_Covers_Container">
                <a href="" class="box_Covers round_Covers">
                    <img src="assets/img/wallhaven-e7qx3k.jpg">
                    <p>Cuarteto de Nos</p>
                </a>
            </article>
            <div class="slider_Container">
                <button class="slider_prev"><</button>
                <button class="slider_next">></button>
            </div>
        </section>



        <section class="containers_Home">
            <h1>Canciones</h1>
            <article class="box_Covers_Container">
                <a href="" class="box_Covers square_Covers">
                    <img src="assets/img/wallhaven-e7qx3k.jpg">
                    <i class='bx bx-play-circle' ></i>
                </a>
            </article>
            <div class="slider_Container">
                <button class="slider_prev"><</button>
                <button class="slider_next">></button>
            </div>
        </section>
    </main>


    <?php
        require 'mainFooter.php';
    ?>
</body>
</html>