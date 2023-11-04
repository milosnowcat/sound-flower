-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2023 a las 18:35:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sound`
CREATE DATABASE sound CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE sound;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `Id` int(11) NOT NULL,
  `Portada` varchar(255) NOT NULL,
  `id_Artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Foto` varchar(255) NOT NULL DEFAULT '/assets/img/artist.jpg',
  `Id_Disquera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`Id`, `Nombre`, `Descripcion`, `Foto`, `Id_Disquera`) VALUES
(1, 'Akon', 'Akon', '/assets/img/artists/Akon.jpg', 1),
(2, 'Eminem', 'Eminem', '/assets/img/artists/Eminem.jpg', 1),
(3, 'Coolio', 'Coolio', '/assets/img/artists/Coolio.jpg', 2),
(4, 'L.V.', 'L.V.', '/assets/img/artists/L.V..jpg', 2),
(5, 'Bee Gees', 'Bee Gees', '/assets/img/artists/Bee Gees.jpg', 3),
(6, 'David Kushner', 'David Kushner', '/assets/img/artists/David Kushner.jpg', 4),
(7, 'The Living Tombstone', 'The Living Tombstone', '/assets/img/artists/The Living Tombstone.jpg', 5),
(8, 'Dina Rae', 'Dina Rae', '/assets/img/artists/Dina Rae.jpg', 6),
(9, 'Eminem', 'Eminem', '/assets/img/artists/Eminem.jpg', 6),
(10, 'WILLOW', 'WILLOW', '/assets/img/artists/WILLOW.jpg', 7),
(11, 'Edmofo', 'Edmofo', '/assets/img/artists/Edmofo.jpg', 8),
(12, 'Emma Peters', 'Emma Peters', '/assets/img/artists/Emma Peters.jpg', 8),
(13, 'FILV', 'FILV', '/assets/img/artists/FILV.jpg', 8),
(14, 'Jvstin', 'Jvstin', '/assets/img/artists/Jvstin.jpg', 8),
(15, 'Kim Petras', 'Kim Petras', '/assets/img/artists/Kim Petras.jpg', 9),
(16, 'Sam Smith', 'Sam Smith', '/assets/img/artists/Sam Smith.jpg', 9),
(17, 'LIT killah', 'LIT killah', '/assets/img/artists/LIT killah.jpg', 10),
(18, 'Chris Isaak', 'Chris Isaak', '/assets/img/artists/Chris Isaak.jpg', 11),
(19, 'Sickick', 'Sickick', '/assets/img/artists/Sickick.jpg', 12),
(20, 'KALEO', 'KALEO', '/assets/img/artists/KALEO.jpg', 13),
(21, 'Birdy', 'Birdy', '/assets/img/artists/Birdy.jpg', 14),
(22, 'Sigma', 'Sigma', '/assets/img/artists/Sigma.jpg', 14),
(23, 'Arctic Monkeys', 'Arctic Monkeys', '/assets/img/artists/Arctic Monkeys.jpg', 15),
(24, 'Kat Nestel', 'Kat Nestel', '/assets/img/artists/Kat Nestel.jpg', 16),
(25, 'Vicetone', 'Vicetone', '/assets/img/artists/Vicetone.jpg', 16),
(26, 'Sickick', 'Sickick', '/assets/img/artists/Sickick.jpg', 17),
(27, 'Tally Hall', 'Tally Hall', '/assets/img/artists/Tally Hall.jpg', 18),
(28, 'Laufey', 'Laufey', '/assets/img/artists/Laufey.jpg', 19),
(29, 'Mitski', 'Mitski', '/assets/img/artists/Mitski.jpg', 20),
(30, 'Baby Tate', 'Baby Tate', '/assets/img/artists/Baby Tate.jpg', 21),
(31, 'Kaliii', 'Kaliii', '/assets/img/artists/Kaliii.jpg', 21),
(32, 'Mon Laferte', 'Mon Laferte', '/assets/img/artists/Mon Laferte.jpg', 1),
(33, 'AURORA', 'AURORA', '/assets/img/artists/AURORA.jpg', 1),
(34, 'Qveen Herby', 'Qveen Herby', '/assets/img/artists/Qveen Herby.jpg', 22),
(35, 'Ice Spice', 'Ice Spice', '/assets/img/artists/Ice Spice.jpg', 9),
(36, 'Nicki Minaj', 'Nicki Minaj', '/assets/img/artists/Nicki Minaj.jpg', 9),
(37, 'Hexmane', 'Hexmane', '/assets/img/artists/Hexmane.jpg', 23),
(38, 'Ko$te', 'Ko$te', '/assets/img/artists/Ko$te.jpg', 23),
(39, 'Vicious Vampira', 'Vicious Vampira', '/assets/img/artists/Vicious Vampira.jpg', 23),
(40, 'Ashnikko', 'Ashnikko', '/assets/img/artists/Ashnikko.jpg', 24),
(41, 'Baby Tate', 'Baby Tate', '/assets/img/artists/Baby Tate.jpg', 24),
(42, 'cupcakKe', 'cupcakKe', '/assets/img/artists/cupcakKe.jpg', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cacion_artista`
--

CREATE TABLE `cacion_artista` (
  `Id` int(11) NOT NULL,
  `Id_Cancion` int(11) NOT NULL,
  `Id_Artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Archivo` varchar(500) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `Portada` varchar(500) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Id_Albun` int(11) NOT NULL,
  `Reproducciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion_playlist`
--

CREATE TABLE `cancion_playlist` (
  `Id` int(11) NOT NULL,
  `Id_Playlist` int(11) NOT NULL,
  `Id_Cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dislikes_usuario`
--

CREATE TABLE `dislikes_usuario` (
  `Id` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `Id` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos_cancion`
--

CREATE TABLE `generos_cancion` (
  `Id` int(11) NOT NULL,
  `Id_Genero` int(11) NOT NULL,
  `Id_Cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes_usuario`
--

CREATE TABLE `likes_usuario` (
  `Id` int(11) NOT NULL,
  `Id_Nombre` int(11) NOT NULL,
  `Id_Cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlists`
--

CREATE TABLE `playlists` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Foto` varchar(500) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Publica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidos`
--

CREATE TABLE `seguidos` (
  `Id` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `id_Artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Contraseña` varchar(500) NOT NULL,
  `Esta_Suscrito` int(11) NOT NULL DEFAULT 0,
  `Es_Disquera` int(11) NOT NULL DEFAULT 0,
  `Es_Admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Correo`, `Contraseña`, `Esta_Suscrito`, `Es_Disquera`, `Es_Admin`) VALUES
(1, 'Universal Records', 'universal@soundflower.rahcode.com', '$2y$10$dIPE3XYkheNjn.6fE8CQxull.0wNaPtBqvu83llXvDKgh/lQFB9Fm', 1, 1, 0),
(2, 'Tommy Boy Music', 'tommy@soundflower.rahcode.com', '$2y$10$sHRfNtceahuNu.QUIlOTruJ2wNeWYKwziGfg7MlzWs189E4oj9nVO', 1, 1, 0),
(3, 'UME', 'ume@soundflower.rahcode.com', '$2y$10$TQFz9iMWeVWlOMBBLEudSuj7r3CvBbZ2lHxDNxOePodelOqUeCaiq', 1, 1, 0),
(4, 'Miserable Music Group', 'miserable@soundflower.rahcode.com', '$2y$10$3JEEIQNHOkChnr.a.fggdOefLipsh2PprKx.bae4JaqaNMkz93Ml6', 1, 1, 0),
(5, 'Ghost Pixel Records', 'pixel@soundflower.rahcode.com', '$2y$10$8veZhSgoQyJyXXffqP.PC.JPRqXme4vFNbchJfGka.RKOh77m7yBe', 1, 1, 0),
(6, 'Aftermath', 'aftermath@soundflower.rahcode.com', '$2y$10$GmvOG9W2GH59KYDv8AE/8e1Tu2vGJgHM05fS7JMiMadtYz12sm9LG', 1, 1, 0),
(7, 'Roc Nation', 'roc@soundflower.rahcode.com', '$2y$10$RUAz0wrUsDHWR39xPHcN1.Nd1nI3TBKX7UK4ASso1vIYoF88PjPj2', 1, 1, 0),
(8, 'b1', 'b1@soundflower.rahcode.com', '$2y$10$TeF5ITvblvc7VPgqjHf4yeKSJ7a6teamShbfgzqiuL44ytfBEUTpa', 1, 1, 0),
(9, 'Capitol Records', 'capitol@soundflower.rahcode.com', '$2y$10$FMWj6Vesv.hrl8pGCaqBuuSuYY6ukXwv/GexEUDETd/ejJgColqmK', 1, 1, 0),
(10, 'WEA Latina', 'wea@soundflower.rahcode.com', '$2y$10$D2mccjxTH/Y7lTToapwrwuke/p6KzWvnlnxSi9NJC9xzL9y19An6m', 1, 1, 0),
(11, 'Chris Isaak', 'chris@soundflower.rahcode.com', '$2y$10$H6gQnqSmgu4.oPzBjy67Te936GqQRqaQpiJeTmLq8h1x0Z4QWMUBG', 1, 1, 0),
(12, 'SICK MUSIC', 'sick@soundflower.rahcode.com', '$2y$10$WoT5H.80Dkr9/32DB8hMDeamy4pzUBGigZ2m8.dfWYw3SQsE7O.E6', 1, 1, 0),
(13, 'Elektra', 'elektra@soundflower.rahcode.com', '$2y$10$HcdIdIsJkSWIEuIpq3Tu4uWY0qMu2JWtbCih3ZX1XP9roi2GWn1ZO', 1, 1, 0),
(14, 'Sony Music', 'sony@soundflower.rahcode.com', '$2y$10$gsV8GLXxZETq.F14g7uwAO7v67qy5vXb.0sQjNAoZjK8VdVJ4mDna', 1, 1, 0),
(15, 'Domino Recording', 'domino@soundflower.rahcode.com', '$2y$10$i5O1GmWjCrfDGwJFhjNJyeHqmXSw0QeRtgWOK0HwK5OwMkrlsQXoO', 1, 1, 0),
(16, 'Ultra Records', 'ultra@soundflower.rahcode.com', '$2y$10$3nWV/lA8vZmUNY8Jc6TxVuyjfB4LDx6xRFKbou8F79ap/U4J/DTnm', 1, 1, 0),
(17, '569881 Records', '569881@soundflower.rahcode.com', '$2y$10$sHb/pZtQhTnlQWzKaSAp2O3taPVoIjZ4PNTfcRpfu8QFfAnO.qwPC', 1, 1, 0),
(18, 'Tally Hall', 'tally@soundflower.rahcode.com', '$2y$10$xZrOjmFKatbaIJCqKIcyXOYzzF.3JlgCwp2wlztkukKRfY0KcZHCe', 1, 1, 0),
(19, 'Laufey', 'laufey@soundflower.rahcode.com', '$2y$10$VF286S8W74JdCczMIkpf7ecZU0dxo6jwm1vt9yN9zSrXsX8GwdrrW', 1, 1, 0),
(20, 'Dead Oceans', 'oceans@soundflower.rahcode.com', '$2y$10$YxZ9ng52NiYljnm88n/Tuuw.2RvQNAaesgU7YYnDTAtX6ltg21eyq', 1, 1, 0),
(21, 'Warner Records', 'warner@soundflower.rahcode.com', '$2y$10$ACcX.dGwkOiD95nlonUasOzNO0JFgXjxkWPsfugYO0tInyorDpIBC', 1, 1, 0),
(22, 'Checkbook Records', 'checkbook@soundflower.rahcode.com', '$2y$10$icr0KT4b2TuIheV06N07Jee.hBfZHLOyosdmsCFs1qncYqhs8lz5e', 1, 1, 0),
(23, 'MISERYMOB', 'miserymob@soundflower.rahcode.com', '$2y$10$rMatPOxKnqelxAtKKUGZ5OgeLKTAQ9MnHXvXy95qAFfV/kFgZyO.S', 1, 1, 0),
(24, 'Digital Picnic', 'picnic@soundflower.rahcode.com', '$2y$10$opv/lHX4wrx5NT9icU3LUeRgcqt5Y1H6xPswhvIpPZSIseHp5K8Oi', 1, 1, 0),
(25, 'cupcakKe', 'cupcakke@soundflower.rahcode.com', '$2y$10$IX5CcO5NiJMy1x5PsuZK/.3ZUIuPBMRxnVUEGMNUalAmfA3/Qqt2e', 1, 1, 0),
(26, 'Tarune', 'tarune@soundflower.rahcode.com', '$2y$10$6YB49HDt1erFh4xtViB.dOA1EKry7370LANQZS.7TOO2Nvg447jNG', 1, 1, 0),
(27, 'Polydor Records', 'polydor@soundflower.rahcode.com', '$2y$10$.4kTWWn4WgGTZXoDkjgssOjHZ0gasrrpfPNPAYzRkXqlLFwXO6WfG', 1, 1, 0),
(28, 'Parlophone', 'parlophone@soundflower.rahcode.com', '$2y$10$VQ2iacJRGFcqoi5aEJyCXuXomYGr6jJwZMnkFPVYXKoGFEggoLSrC', 1, 1, 0),
(29, 'Inmadurez Records', 'inmadurez@soundflower.rahcode.com', '$2y$10$mxK1v9cC9TL0IbuurZriFesyt4ym6rnexj4bkYn2pDBaDFHwQGTyi', 1, 1, 0),
(30, 'Atlantic Records', 'atlantic@soundflower.rahcode.com', '$2y$10$.gdGuf0NyVrGuideQftmPO.A5sftrZzlsOB56x0RKNFyjgIlU9m7i', 1, 1, 0),
(31, 'Big Machine Records', 'machine@soundflower.rahcode.com', '$2y$10$3vKPk8NPRldvYL7x5yO.9eaNtIMc0G0SoHp4jDsTGxg3IQIUfjq8a', 1, 1, 0),
(32, 'OMORI', 'omori@soundflower.rahcode.com', '$2y$10$woS1txCeJoxkiLa/.TdFV.r4KX.tv5.SQn72tOkE73uPwJeb3dAJy', 1, 1, 0),
(33, 'Pelo Music', 'pelo@soundflower.rahcode.com', '$2y$10$MOjUDKgW8ndH79Dcy2/J8O16sVrsnv8oJa57D/FJamid66RYhemVy', 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `cancion_playlist`
--
ALTER TABLE `cancion_playlist`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `dislikes_usuario`
--
ALTER TABLE `dislikes_usuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `generos_cancion`
--
ALTER TABLE `generos_cancion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `likes_usuario`
--
ALTER TABLE `likes_usuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `seguidos`
--
ALTER TABLE `seguidos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cancion_playlist`
--
ALTER TABLE `cancion_playlist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dislikes_usuario`
--
ALTER TABLE `dislikes_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos_cancion`
--
ALTER TABLE `generos_cancion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `likes_usuario`
--
ALTER TABLE `likes_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `playlists`
--
ALTER TABLE `playlists`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguidos`
--
ALTER TABLE `seguidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
