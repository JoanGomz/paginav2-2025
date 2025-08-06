// Función para crear dinámicamente el carrusel desde PHP
document.addEventListener('DOMContentLoaded', function () {
    // Carrusel principal (opcional)
    const carouselContainer = document.querySelector('.park-carousel-items');
    if (carouselContainer) {
        cargarImagenes();
    }

    // Carrusel de servicios (opcional)
    const serviciosContainer = document.querySelector('.park-carousel-items-service');
    if (serviciosContainer) {
        cargarImagenesCarrusel('.galeria-container-service', '.park-carousel-items-service');
        // Inicializar controles independientes para el secundario
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

function cargarImagenes() {
    // Obtenemos el contenedor donde se mostrarán las imágenes
    const carouselItems = document.querySelector(".park-carousel-items");

    // Limpiamos cualquier contenido previo
    carouselItems.innerHTML = '';

    // Obtenemos los paths de las imágenes del atributo de datos en el HTML
    const galeriaContainer = document.querySelector('.galeria-container');
    if (!galeriaContainer) {
        console.error("No se encontró el contenedor de la galería");
        return;
    }

    try {
        // Obtenemos el JSON de imágenes del atributo data
        const imagenes = JSON.parse(galeriaContainer.getAttribute('data-imagenes'));
        console.log("Imágenes cargadas:", imagenes);

        if (!imagenes || imagenes.length === 0) {
            console.error("No se encontraron imágenes");
            return;
        }

        // Creamos los elementos del carrusel
        imagenes.forEach((src, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('park-carousel-item');
            if (index === 0) {
                itemDiv.classList.add('active');
            }

            // Verificar si hay link de WhatsApp
            const whatsappLink = galeriaContainer.getAttribute('data-whatsapp');
            let content;
            if (whatsappLink) {
                content = document.createElement('a');
                content.href = whatsappLink;
                content.target = '_blank';
                const img = document.createElement('img');
                img.classList.add('park-image-media');
                img.src = src;
                img.alt = "Imagen del parque";
                content.appendChild(img);
            } else {
                content = document.createElement('img');
                content.classList.add('park-image-media');
                content.src = src;
                content.alt = "Imagen del parque";
            }

            itemDiv.appendChild(content);
            carouselItems.appendChild(itemDiv);
        });

        console.log("Se agregaron " + imagenes.length + " imágenes al carrusel");

        // Inicializar el carrusel después de agregar las imágenes
        inicializarCarousel();
    } catch (error) {
        console.error("Error al cargar las imágenes:", error);
    }
}


function cargarImagenesCarrusel(galeriaSelector, itemsSelector) {
    console.log("segundo carrusel");
    const carouselItems = document.querySelector(itemsSelector);
    const galeriaContainer = document.querySelector(galeriaSelector);
    console.log('Buscando:', galeriaSelector, itemsSelector);
    console.log('Encontrado:', galeriaContainer, carouselItems);

    if (!carouselItems || !galeriaContainer) {
        // No mostrar error si no existe, permite múltiples carruseles opcionales
        return;
    }

    // Limpiar contenido previo
    carouselItems.innerHTML = '';

    try {
        const imagenes = JSON.parse(galeriaContainer.getAttribute('data-imagenes'));
        const whatsappLink = galeriaContainer.getAttribute('data-whatsapp');

        imagenes.forEach((src, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('park-carousel-item');
            if (index === 0) itemDiv.classList.add('active');

            let content;
            if (whatsappLink) {
                content = document.createElement('a');
                content.href = whatsappLink;
                content.target = '_blank';
                const img = document.createElement('img');
                img.classList.add('park-image-media');
                img.src = src;
                img.alt = "Imagen del parque";
                content.appendChild(img);
            } else {
                content = document.createElement('img');
                content.classList.add('park-image-media-service');
                content.src = src;
                content.alt = "Imagen del parque";
            }

            itemDiv.appendChild(content);
            carouselItems.appendChild(itemDiv);
        });
    } catch (error) {
        console.error("Error al cargar las imágenes:", error);
    }
}


function inicializarCarousel() {
    console.log("Inicializando controles del carrusel...");

    const carousel = document.querySelector(".park-carousel");
    const carouselItems = document.querySelectorAll(".park-carousel-item");
    const prevBtn = document.querySelector(".carousel-prev");
    const nextBtn = document.querySelector(".carousel-next");
    const indicatorsContainer = document.querySelector(".carousel-indicators");

    // Verificar los elementos críticos
    if (!carousel) {
        console.error("No se encontró el elemento .park-carousel");
        return;
    }

    if (!carouselItems.length) {
        console.error("No se encontraron elementos .park-carousel-item");
        return;
    }

    if (!prevBtn) {
        console.error("No se encontró el botón .park-carousel-prev");
        return;
    }

    if (!nextBtn) {
        console.error("No se encontró el botón .carousel-next");
        return;
    }

    if (!indicatorsContainer) {
        console.error("No se encontró el contenedor .carousel-indicators");
        return;
    }

    console.log(`Carrusel encontrado con ${carouselItems.length} imágenes`);

    let currentIndex = 0;
    let intervalId;
    const totalItems = carouselItems.length;

    // Detectar si es un dispositivo táctil
    const isTouchDeviceFlag = isTouchDevice();
    console.log("¿Es dispositivo táctil?", isTouchDeviceFlag);

    // Limpiar los indicadores existentes
    indicatorsContainer.innerHTML = '';

    // Crear indicadores
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

    // Inicializar el carousel
    updateCarousel();

    // Solo iniciar autoplay si NO es un dispositivo táctil
    if (!isTouchDeviceFlag) {
        startAutoplay();

        // Solo añadir estos listeners si hay autoplay
        carousel.addEventListener("mouseenter", () => {
            stopAutoplay();
        });

        carousel.addEventListener("mouseleave", () => {
            startAutoplay();
        });
    }

    // Event listeners para los botones (siempre necesarios)
    prevBtn.addEventListener("click", prevSlide);
    nextBtn.addEventListener("click", nextSlide);

    // Touch events para dispositivos móviles (siempre necesarios para navegación táctil)
    let touchStartX = 0;
    let touchEndX = 0;

    carousel.addEventListener(
        "touchstart",
        (e) => {
            touchStartX = e.changedTouches[0].screenX;
            // En dispositivos táctiles, no necesitamos detener el autoplay aquí porque no hay autoplay
            if (!isTouchDeviceFlag) {
                stopAutoplay();
            }
        },
        { passive: true }
    );

    carousel.addEventListener(
        "touchend",
        (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            // En dispositivos táctiles, no necesitamos reiniciar el autoplay
            if (!isTouchDeviceFlag) {
                startAutoplay();
            }
        },
        { passive: true }
    );

    // Permitir hacer clic en un slide para activarlo
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
        // Resetear todas las clases
        carouselItems.forEach((item) => {
            item.classList.remove(
                "active",
                "prev",
                "next",
                "far-prev",
                "far-next",
                "back"
            );
        });

        // Actualizar indicadores
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle("active", index === currentIndex);
        });

        // Calcular posiciones relativas para cada tarjeta
        for (let i = 0; i < totalItems; i++) {
            // Calcular la distancia desde el índice actual
            const distance = calculateDistance(currentIndex, i, totalItems);

            // Asignar clases según la posición relativa
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

    // Función para calcular la distancia más corta entre dos índices en un círculo
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
/**
 * Inicializa un carrusel con controles independientes usando selectores personalizados.
 */
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
    // Inicializar
    updateCarousel();
    if (!isTouchDeviceFlag) {
        startAutoplay();
        carousel.addEventListener('mouseenter', stopAutoplay);
        carousel.addEventListener('mouseleave', startAutoplay);
    }
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);
    // Touch events
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
// --- FIN INICIALIZADOR REUTILIZABLE ---