// Variables globales para controlar el autoplay del carrusel
let intervalId; // Almacena el ID del intervalo para poder detenerlo
let nextSlideRef; // Almacena una referencia a la función 'nextSlide' para el autoplay

// Función para detener el autoplay del carrusel
function stopAutoplay() {
    if (intervalId) {
        clearInterval(intervalId); // Limpia el intervalo existente
    }
}

// Función para iniciar el autoplay del carrusel
function startAutoplay() {
    stopAutoplay(); // Asegura que cualquier intervalo anterior se detenga antes de iniciar uno nuevo
    if (nextSlideRef) { // Solo inicia si la referencia a nextSlide está disponible
        intervalId = setInterval(nextSlideRef, 3000); // Inicia el autoplay cada 3 segundos
    }
}

const token = "IGAALFb3DI1KlBZAE1hS0FCNExhNmR6YjEwRjRwVEFWOE1pWWVLQjdmSWN0UGpoNE84YWFGdkFnT242R3hvT1JlNEFZAZAjYtWFNRQzJHaXhOR3FGeWlWWWxvbTd2ZAzJ2ODZA2bm82clVlOXRnTURwLUdiMkhEX0dNbEtqUWhPWlg3bwZDZD";

// Función asíncrona para obtener los datos de los posts de Instagram
const reels = async () => {
    try {
        // Realiza la solicitud a la API de Instagram Graph
        const response = await fetch(
            `https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,thumbnail_url,permalink,timestamp&access_token=${token}`
        );
        const datos = await response.json(); // Parsea la respuesta JSON

        // Llama a la función MostrarPost para renderizar los datos
        MostrarPost(datos);
        // console.log("Conexión exitosa", datos.data); // Para depuración: muestra los datos completos
    } catch (error) {
        console.log("Error: no se pudo conectar con la API", error);
    }
};

// Función para mostrar los posts en el HTML (creando las tarjetas del carrusel)
const MostrarPost = (reels) => {
    const containerReels = document.querySelector(".carousel-items");

    // Verifica si el contenedor del carrusel existe en el HTML
    if (!containerReels) {
        console.error("Error: El contenedor '.carousel-items' no fue encontrado en el HTML.");
        return;
    }

    // Limpia cualquier contenido existente en el contenedor para evitar duplicados
    containerReels.innerHTML = '';

    // Itera sobre los primeros 9 posts (slice(0, 9)) obtenidos de la API
    reels.data.slice(0, 9).forEach((reel, index) => {
        const reelCard = document.createElement("div");
        reelCard.classList.add("carousel-item");
        if (index === 0) reelCard.classList.add("active"); // El primer ítem se marca como activo inicialmente

        let mediaElement; // Variable para almacenar el elemento de imagen o video

        // Determina el tipo de medio y crea el elemento HTML correspondiente
        if (reel.media_type === "IMAGE" || reel.media_type === "CAROUSEL_ALBUM") {
            mediaElement = document.createElement("img");
            mediaElement.classList.add("instagram-media");
            mediaElement.src = reel.media_url;
            mediaElement.alt = "Post de Instagram";
        } else if (reel.media_type === "VIDEO") {
            mediaElement = document.createElement("video");
            mediaElement.classList.add("instagram-media");
            mediaElement.src = reel.media_url;
            mediaElement.controls = true; // Agrega los controles de reproducción del video

            // *** NUEVA FUNCIONALIDAD ***
            // Cuando el video empieza a reproducirse, detiene el autoplay del carrusel
            mediaElement.addEventListener("play", () => {
                console.log("reprodujo");
                stopAutoplay();
            });
            // Cuando el video termina, reanuda el autoplay del carrusel
            mediaElement.addEventListener("ended", () => {
              console.log("pauso");
                startAutoplay();
            });
            // Si el usuario pausa el video manualmente, también reanuda el autoplay
            mediaElement.addEventListener("pause", () => {
                startAutoplay();
                console.log("pauso");
            });
        }

        // Si se creó un elemento de medio, lo añade a la tarjeta del carrusel
        if (mediaElement) {
            reelCard.appendChild(mediaElement);
        }
        containerReels.appendChild(reelCard); // Añade la tarjeta al contenedor
    });

    inicializarCarousel(); // Llama a la función para inicializar la lógica del carrusel
};

// Función para inicializar la funcionalidad del carrusel (botones, indicadores, etc.)
const inicializarCarousel = () => {
    const carousel = document.querySelector(".carousel");
    const carouselItems = document.querySelectorAll(".carousel-item");
    const prevBtn = document.querySelector(".carousel-prev");
    const nextBtn = document.querySelector(".carousel-next");
    const indicatorsContainer = document.querySelector(".carousel-indicators");

    // Verifica si todos los elementos necesarios del carrusel existen
    if (!carousel || !prevBtn || !nextBtn || !indicatorsContainer || carouselItems.length === 0) {
        console.error("Error: Faltan elementos del carrusel en el HTML. Asegúrate de que las clases '.carousel', '.carousel-prev', '.carousel-next', '.carousel-indicators' y '.carousel-item' existan.");
        return;
    }

    let currentIndex = 0;
    const totalItems = carouselItems.length;

    // Limpia los indicadores existentes para evitar duplicados si se reinicia el carrusel
    indicatorsContainer.innerHTML = '';

    // Crea los indicadores de página (los pequeños puntos en la parte inferior)
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

    // Asigna la función nextSlide a la variable global nextSlideRef
    // Esto es crucial para que startAutoplay pueda llamarla
    nextSlideRef = nextSlide;

    // Inicializa la vista del carrusel y comienza el autoplay
    updateCarousel();
    startAutoplay();

    // Configura los event listeners para los botones de navegación
    prevBtn.addEventListener("click", prevSlide);
    nextBtn.addEventListener("click", nextSlide);

    // Detiene el autoplay cuando el mouse entra en el carrusel
    carousel.addEventListener("mouseenter", () => {
        stopAutoplay();
    });

    // Reanuda el autoplay cuando el mouse sale del carrusel
    carousel.addEventListener("mouseleave", () => {
        startAutoplay();
    });

    // Variables para manejar eventos táctiles (swipes) en dispositivos móviles
    let touchStartX = 0;
    let touchEndX = 0;

    // Registra la posición inicial del toque y detiene el autoplay
    carousel.addEventListener(
        "touchstart",
        (e) => {
            touchStartX = e.changedTouches[0].screenX;
            stopAutoplay();
        },
        { passive: true } // Indica que el listener no llamará a preventDefault()
    );

    // Registra la posición final del toque, maneja el swipe y reanuda el autoplay
    carousel.addEventListener(
        "touchend",
        (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startAutoplay();
        },
        { passive: true }
    );

    // Permite hacer clic en un slide para activarlo directamente
    carouselItems.forEach((item, index) => {
        item.addEventListener("click", () => {
            if (index !== currentIndex) {
                goToSlide(index);
            }
        });
    });

    // Función para manejar el deslizamiento (swipe)
    function handleSwipe() {
        const difference = touchStartX - touchEndX;
        if (difference > 50) { // Deslizamiento hacia la izquierda (siguiente)
            nextSlide();
        } else if (difference < -50) { // Deslizamiento hacia la derecha (anterior)
            prevSlide();
        }
    }

    // Actualiza las clases CSS de los ítems del carrusel para su posicionamiento
    function updateCarousel() {
        // Remueve todas las clases de posicionamiento de todos los ítems
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

        // Actualiza la clase 'active' del indicador de página
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle("active", index === currentIndex);
        });

        // Asigna las clases de posicionamiento según la distancia al ítem actual
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

    // Función para calcular la distancia más corta entre dos índices en un carrusel circular
    function calculateDistance(current, target, total) {
        const direct = target - current;
        const throughEnd = direct > 0 ? direct - total : direct + total;
        return Math.abs(direct) < Math.abs(throughEnd) ? direct : throughEnd;
    }

    // Avanza al siguiente slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        updateCarousel();
    }

    // Retrocede al slide anterior
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        updateCarousel();
    }

    // Va a un slide específico por su índice
    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
    }
};

// Llama a la función principal para iniciar la carga y visualización de los posts
reels();
