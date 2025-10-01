// Función para crear dinámicamente el carrusel desde PHP
document.addEventListener('DOMContentLoaded', function () {
    // Carrusel principal
    const carouselContainer = document.querySelector('.park-carousel-items');
    if (carouselContainer) {
        cargarMedios();
    }

    // Carrusel de servicios
    const serviciosContainer = document.querySelector('.park-carousel-items-service');
    if (serviciosContainer) {
        cargarMediosCarrusel('.galeria-container-service', '.park-carousel-items-service');
        inicializarCarouselConSelectores({
            carouselSelector: '.park-carousel-service',
            itemsSelector: '.park-carousel-items-service',
            prevSelector: '.carousel-prev-service',
            nextSelector: '.carousel-next-service',
            indicatorsSelector: '.carousel-indicators-service'
        });
    }
});

// Función para detectar si el dispositivo es táctil
function isTouchDevice() {
    return (('ontouchstart' in window) ||
        (navigator.maxTouchPoints > 0) ||
        (navigator.msMaxTouchPoints > 0));
}

// Función para cargar imágenes y videos en el carrusel principal
function cargarMedios() {
    const carouselItems = document.querySelector(".park-carousel-items");
    carouselItems.innerHTML = '';

    const galeriaContainer = document.querySelector('.galeria-container');
    if (!galeriaContainer) {
        console.error("No se encontró el contenedor de la galería");
        return;
    }

    try {
        const medios = JSON.parse(galeriaContainer.getAttribute('data-imagenes'));
        console.log("Medios cargados:", medios);

        if (!medios || medios.length === 0) {
            console.error("No se encontraron medios (imágenes o videos)");
            return;
        }

        medios.forEach((src, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('park-carousel-item');
            if (index === 0) {
                itemDiv.classList.add('active');
            }

            // Lógica para determinar si es un video o una imagen
            const isVideo = src.endsWith('.mp4') || src.endsWith('.webm') || src.endsWith('.ogg');
            const whatsappLink = galeriaContainer.getAttribute('data-whatsapp');
            let content;

            if (isVideo) {
                // Si es un video, crea un elemento <video>
                content = document.createElement('video');
                content.classList.add('park-image-media');
                content.controls = false;
                content.preload = "metadata";
                content.autoplay = true;
                content.loop = true;
                content.muted = true;

                const source = document.createElement('source');
                source.src = src;
                source.type = `video/${src.split('.').pop()}`; // Obtiene el tipo de archivo dinámicamente
                content.appendChild(source);
            } else {
                // Si es una imagen, usa la lógica existente
                const img = document.createElement('img');
                img.classList.add('park-image-media');
                img.src = src;
                img.alt = "Imagen del parque";
                
                if (whatsappLink) {
                    const link = document.createElement('a');
                    link.href = whatsappLink;
                    link.target = '_blank';
                    link.appendChild(img);
                    content = link;
                } else {
                    content = img;
                }
            }

            itemDiv.appendChild(content);
            carouselItems.appendChild(itemDiv);
        });

        console.log(`Se agregaron ${medios.length} elementos al carrusel`);
        inicializarCarousel();

    } catch (error) {
        console.error("Error al cargar los medios:", error);
    }
}


// Función para cargar imágenes y videos en el carrusel de servicios
function cargarMediosCarrusel(galeriaSelector, itemsSelector) {
    console.log("Cargando segundo carrusel...");
    const carouselItems = document.querySelector(itemsSelector);
    const galeriaContainer = document.querySelector(galeriaSelector);

    if (!carouselItems || !galeriaContainer) {
        return;
    }

    carouselItems.innerHTML = '';

    try {
        const medios = JSON.parse(galeriaContainer.getAttribute('data-imagenes'));
        const whatsappLink = galeriaContainer.getAttribute('data-whatsapp');

        medios.forEach((src, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('park-carousel-item');
            if (index === 0) itemDiv.classList.add('active');

            // Lógica para determinar si es un video o una imagen
            const isVideo = src.endsWith('.mp4') || src.endsWith('.webm') || src.endsWith('.ogg');
            let content;

            if (isVideo) {
                // Si es un video, crea un elemento <video>
                content = document.createElement('video');
                content.classList.add('park-image-media-service');
                content.controls = false;
                content.preload = "metadata";
                
                const source = document.createElement('source');
                source.src = src;
                source.type = `video/${src.split('.').pop()}`;
                content.appendChild(source);
            } else {
                 // Si es una imagen, usa la lógica existente
                const img = document.createElement('img');
                img.classList.add('park-image-media-service');
                img.src = src;
                img.alt = "Imagen del parque";

                if (whatsappLink) {
                    const link = document.createElement('a');
                    link.href = whatsappLink;
                    link.target = '_blank';
                    link.appendChild(img);
                    content = link;
                } else {
                    content = img;
                }
            }
            itemDiv.appendChild(content);
            carouselItems.appendChild(itemDiv);
        });
    } catch (error) {
        console.error("Error al cargar los medios del carrusel de servicios:", error);
    }
}


// --- LÓGICA DEL CARRUSEL ---

function inicializarCarousel() {
    console.log("Inicializando controles del carrusel...");

    const carousel = document.querySelector(".park-carousel");
    const carouselItems = document.querySelectorAll(".park-carousel-item");
    const prevBtn = document.querySelector(".carousel-prev");
    const nextBtn = document.querySelector(".carousel-next");
    const indicatorsContainer = document.querySelector(".carousel-indicators");

    if (!carousel || !carouselItems.length || !prevBtn || !nextBtn || !indicatorsContainer) {
        console.error("Faltan elementos del carrusel principal");
        return;
    }

    console.log(`Carrusel encontrado con ${carouselItems.length} elementos`);

    let currentIndex = 0;
    let intervalId;
    const totalItems = carouselItems.length;

    const isTouchDeviceFlag = isTouchDevice();
    console.log("¿Es dispositivo táctil?", isTouchDeviceFlag);

    indicatorsContainer.innerHTML = '';
    carouselItems.forEach((_, index) => {
        const indicator = document.createElement("div");
        indicator.classList.add("indicator");
        if (index === currentIndex) {
            indicator.classList.add("active");
        }
        indicator.addEventListener("click", () => {
            goToSlide(index);
        });
        indicatorsContainer.appendChild(indicator);
    });

    const indicators = document.querySelectorAll(".indicator");
    updateCarousel();

    if (!isTouchDeviceFlag) {
        startAutoplay();
        carousel.addEventListener("mouseenter", () => {
            stopAutoplay();
        });
        carousel.addEventListener("mouseleave", () => {
            startAutoplay();
        });
    }

    prevBtn.addEventListener("click", prevSlide);
    nextBtn.addEventListener("click", nextSlide);

    let touchStartX = 0;
    let touchEndX = 0;

    carousel.addEventListener("touchstart", (e) => {
        touchStartX = e.changedTouches[0].screenX;
        if (!isTouchDeviceFlag) {
            stopAutoplay();
        }
    }, { passive: true });

    carousel.addEventListener("touchend", (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        if (!isTouchDeviceFlag) {
            startAutoplay();
        }
    }, { passive: true });

    carouselItems.forEach((item, index) => {
        item.addEventListener("click", () => {
            if (index !== currentIndex) {
                goToSlide(index);
            }
        });
    });

    function handleSwipe() {
        const difference = touchStartX - touchEndX;
        if (difference > 50) {
            nextSlide();
        } else if (difference < -50) {
            prevSlide();
        }
    }

    function updateCarousel() {
        carouselItems.forEach((item) => {
            item.classList.remove("active", "prev", "next", "far-prev", "far-next", "back");
        });

        indicators.forEach((indicator, index) => {
            indicator.classList.toggle("active", index === currentIndex);
        });

        for (let i = 0; i < totalItems; i++) {
            const distance = calculateDistance(currentIndex, i, totalItems);
            if (distance === 0) {
                carouselItems[i].classList.add("active");
            } else if (distance === 1) {
                carouselItems[i].classList.add("next");
            } else if (distance === -1) {
                carouselItems[i].classList.add("prev");
            } else if (distance === 2) {
                carouselItems[i].classList.add("far-next");
            } else if (distance === -2) {
                carouselItems[i].classList.add("far-prev");
            } else {
                carouselItems[i].classList.add("back");
            }
        }
    }

    function calculateDistance(current, target, total) {
        const direct = target - current;
        const throughEnd = direct > 0 ? direct - total : direct + total;
        return Math.abs(direct) < Math.abs(throughEnd) ? direct : throughEnd;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        updateCarousel();
    }

    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
    }

    function startAutoplay() {
        stopAutoplay();
        intervalId = setInterval(nextSlide, 3000);
    }

    function stopAutoplay() {
        if (intervalId) {
            clearInterval(intervalId);
        }
    }
}

// --- INICIALIZADOR DE CARRUSEL REUTILIZABLE ---

function inicializarCarouselConSelectores({
    carouselSelector,
    itemsSelector,
    prevSelector,
    nextSelector,
    indicatorsSelector
}) {
    const carousel = document.querySelector(carouselSelector);
    const carouselItems = document.querySelectorAll(itemsSelector + ' .park-carousel-item');
    const prevBtn = document.querySelector(prevSelector);
    const nextBtn = document.querySelector(nextSelector);
    const indicatorsContainer = document.querySelector(indicatorsSelector);

    if (!carousel || !carouselItems.length || !prevBtn || !nextBtn || !indicatorsContainer) {
        console.error('No se encontraron todos los elementos del carrusel secundario');
        return;
    }

    let currentIndex = 0;
    let intervalId;
    const totalItems = carouselItems.length;
    const isTouchDeviceFlag = isTouchDevice();

    indicatorsContainer.innerHTML = '';
    carouselItems.forEach((_, index) => {
        const indicator = document.createElement('div');
        indicator.classList.add('indicator');
        if (index === currentIndex) indicator.classList.add('active');
        indicator.addEventListener('click', () => goToSlide(index));
        indicatorsContainer.appendChild(indicator);
    });
    const indicators = indicatorsContainer.querySelectorAll('.indicator');

    function updateCarousel() {
        carouselItems.forEach((item) => {
            item.classList.remove('active', 'prev', 'next', 'far-prev', 'far-next', 'back');
        });
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentIndex);
        });
        for (let i = 0; i < totalItems; i++) {
            const distance = calculateDistance(currentIndex, i, totalItems);
            if (distance === 0) {
                carouselItems[i].classList.add('active');
            } else if (distance === 1) {
                carouselItems[i].classList.add('next');
            } else if (distance === -1) {
                carouselItems[i].classList.add('prev');
            } else if (distance === 2) {
                carouselItems[i].classList.add('far-next');
            } else if (distance === -2) {
                carouselItems[i].classList.add('far-prev');
            } else {
                carouselItems[i].classList.add('back');
            }
        }
    }
    function calculateDistance(current, target, total) {
        const direct = target - current;
        const throughEnd = direct > 0 ? direct - total : direct + total;
        return Math.abs(direct) < Math.abs(throughEnd) ? direct : throughEnd;
    }
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        updateCarousel();
    }
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        updateCarousel();
    }
    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
    }
    function startAutoplay() {
        stopAutoplay();
        intervalId = setInterval(nextSlide, 3000);
    }
    function stopAutoplay() {
        if (intervalId) clearInterval(intervalId);
    }
    updateCarousel();
    if (!isTouchDeviceFlag) {
        startAutoplay();
        carousel.addEventListener('mouseenter', stopAutoplay);
        carousel.addEventListener('mouseleave', startAutoplay);
    }
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);
    let touchStartX = 0;
    let touchEndX = 0;
    carousel.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        if (!isTouchDeviceFlag) stopAutoplay();
    }, { passive: true });
    carousel.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        const difference = touchStartX - touchEndX;
        if (difference > 50) nextSlide();
        else if (difference < -50) prevSlide();
        if (!isTouchDeviceFlag) startAutoplay();
    }, { passive: true });
    carouselItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            if (index !== currentIndex) goToSlide(index);
        });
    });
}