import { previewImg } from './main.js';

let foto = document.getElementById('foto');

foto.addEventListener('change', () => {
    console.log(foto.src)
    previewImg('preview', 'foto');
});
