document.addEventListener("DOMContentLoaded", function () {
    const boxContainers = document.querySelectorAll(".box_Covers_Container");
    const arrowBtns = document.querySelectorAll(".slider_button");
    // Obtiene el ancho de la primera portada en el primer contenedor
    const firstCoverWidth = boxContainers[0].querySelector(".box_Covers").offsetWidth;

    // Variables para el arrastre
    let isDragging = false, startX, startScrollLeft;

    // Manejador de eventos para los botones de flecha
    arrowBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            // Determina la dirección basándose en la clase del botón
            const direction = this.classList.contains("button_left") ? -1 : 1;
            // Encuentra el contenedor asociado y ajusta el desplazamiento
            const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
            container.scrollLeft += direction * firstCoverWidth;
        });
    });

    // Función que inicia el arrastre
    const draggStart = function (e) {
        isDragging = true;
        // Encuentra el contenedor asociado y configura las variables de inicio
        const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
        container.classList.add("draggin");
        startX = e.pageX;
        startScrollLeft = container.scrollLeft;
    }

    // Función que se ejecuta durante el arrastre
    const dragging = function (e) {
        if (!isDragging) return;
        // Encuentra el contenedor asociado y ajusta el desplazamiento en función del arrastre
        const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
        container.scrollLeft = startScrollLeft - (e.pageX - startX);
    }

    // Función que detiene el arrastre
    const draggStop = function () {
        isDragging = false;
        // Encuentra el contenedor asociado y elimina la clase de arrastre
        const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
        container.classList.remove("draggin");
    }

    // Asocia funciones de arrastre a eventos del contenedor
    boxContainers.forEach(container => {
        container.addEventListener("mousedown", draggStart);
        container.addEventListener("mousemove", dragging);
        container.addEventListener("mouseup", draggStop);
    });
});

