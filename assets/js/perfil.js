import { previewImg, post } from './main.js';

let foto = document.getElementById('fot');

foto.addEventListener('change', () => {
    previewImg('preview', 'fot');
    post('fotoUsuario', '/assets/php/perfil.php');
});
