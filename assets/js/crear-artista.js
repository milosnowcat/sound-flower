import { previewImg } from './main.js';

let foto = document.getElementById('foto');

foto.addEventListener('change', () => {
    previewImg('preview', 'foto');
});
