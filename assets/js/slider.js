document.addEventListener("DOMContentLoaded", function () {
    const boxContainers = document.querySelectorAll(".box_Covers_Container");
    const arrowBtns = document.querySelectorAll(".slider_button");
    const firstCoverWidth = boxContainers[0].querySelector(".box_Covers").offsetWidth;

    let isDragging = false, startX, startScrollLeft;

    arrowBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            const direction = this.classList.contains("button_left") ? -1 : 1;
            const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
            container.scrollLeft += direction * firstCoverWidth;
        });
    });

    const draggStart = function (e) {
        isDragging = true;
        const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
        container.classList.add("draggin");
        startX = e.pageX;
        startScrollLeft = container.scrollLeft;
    }

    const dragging = function (e) {
        if (!isDragging) return;
        const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
        container.scrollLeft = startScrollLeft - (e.pageX - startX);
    }

    const draggStop = function () {
        isDragging = false;
        const container = this.closest(".containers_Home").querySelector(".box_Covers_Container");
        container.classList.remove("draggin");
    }

    boxContainers.forEach(container => {
        container.addEventListener("mousedown", draggStart);
        container.addEventListener("mousemove", dragging);
        container.addEventListener("mouseup", draggStop);
    });
});
