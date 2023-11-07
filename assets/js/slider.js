// document.addEventListener('DOMContentLoaded', function() {
//     const containers = document.querySelectorAll('.containers_Home');
    
//     containers.forEach(container => {
//         const slider = container.querySelector('.box_Covers_Container');
//         const prevButton = container.querySelector('.slider_prev');
//         const nextButton = container.querySelector('.slider_next');
//         const items = container.querySelectorAll('.box_Covers');
//         let currentIndex = 0;
//         const itemWidth = items[0].offsetWidth;

//         nextButton.addEventListener('click', () => {
//             if (currentIndex < items.length - 1) {
//                 currentIndex++;
//                 updateSlider();
//             }
//         });

//         prevButton.addEventListener('click', () => {
//             if (currentIndex > 0) {
//                 currentIndex--;
//                 updateSlider();
//             }
//         });

//         function updateSlider() {
//             const translateX = -currentIndex * itemWidth;

//             items.forEach((item, index) => {
//                 item.style.transform = `translateX(${(index - currentIndex) * itemWidth}px)`;
//             });
//         }

//         updateSlider();
//     });
// });


// document.addEventListener('DOMContentLoaded', function() {
//     const containers = document.querySelectorAll('.containers_Home');

//     containers.forEach(container => {
//         const slider = container.querySelector('.box_Covers_Container');
//         const prevButton = container.querySelector('.slider_prev');
//         const nextButton = container.querySelector('.slider_next');
//         const items = container.querySelectorAll('.box_Covers');
//         let currentIndex = 0;
//         const itemWidth = items[0].offsetWidth + 2 * 16; // Ancho del elemento + 2rem de separación

//         nextButton.addEventListener('click', () => {
//             if (currentIndex < items.length - 4) { // Muestra 4 elementos a la vez
//                 currentIndex++;
//                 updateSlider();
//             }
//         });

//         prevButton.addEventListener('click', () => {
//             if (currentIndex > 0) {
//                 currentIndex--;
//                 updateSlider();
//             }
//         });

//         function updateSlider() {
//             const translateX = -currentIndex * itemWidth;
//             slider.style.transform = `translateX(${translateX}px)`;
//         }

//         updateSlider();
//     });
// });


document.addEventListener('DOMContentLoaded', function() {
    const containers = document.querySelectorAll('.containers_Home');

    containers.forEach(container => {
        const slider = container.querySelector('.box_Covers_Container');
        const items = container.querySelectorAll('.box_Covers');
        let currentIndex = 0;
        const itemWidth = items[0].offsetWidth + 2 * 16; 

        function updateSlider() {
            items.forEach((item, index) => {
                const left = (index - currentIndex) * itemWidth;
                item.style.left = `${left}px`;
            });
        }

        function nextSlide() {
            if (currentIndex < items.length - 4) {
                currentIndex++;
                updateSlider();
            }
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        }

        const prevButton = container.querySelector('.slider_prev');
        prevButton.addEventListener('click', prevSlide);

        const nextButton = container.querySelector('.slider_next');
        nextButton.addEventListener('click', nextSlide);

        updateSlider();
    });
});