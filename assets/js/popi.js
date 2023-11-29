var btnAbrirPopup = document.getElementById('abrir-popup'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarpopup = document.getElementById('btn-cerrar-popup');
    
    btnAbrirPopup.addEventListener('click', function(){
        overlay.classList.add('active');
        popup.classList.add('active');
    });
    btnCerrarpopup.addEventListener('click', function(){
        overlay.classList.remove('active');
        popup.classList.remove('active');
    });
