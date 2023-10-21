# Base de Datos

## Usuarios

- id
- nombre
- usuario
- correo
- contraseña
- esta_suscrito
- es_disquera
- es_admin

## Canciones

- id
- nombre
- archivo
- duracion
- portada
- numero
- id_album
- reproducciones

## Artistas

- id
- nombre
- descripción
- foto
- id_disquera

## Cancion_Artista

- id
- id_cancion
- id_artista

## Albumes

- id
- portada
- id_artista

## Likes_Usuario

- id
- id_usuario
- id_cancion

## Dislikes_Usuario

- id
- id_usuario
- id_cancion

## Favoritos

- id
- id_usuario
- id_album

## Seguidos

- id
- id_usuario
- id_artista

## Playlists

- id
- nombre
- foto
- id_usuario
- es_publica

## Cancion_Playlist

- id
- id_playlist
- id_cancion
