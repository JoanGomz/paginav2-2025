
let intervalId; 
let nextSlideRef; 


function stopAutoplay() {
    if (intervalId) {
        clearInterval(intervalId); 
    }
}


function startAutoplay() {
    stopAutoplay(); 
    if (nextSlideRef) { 
        intervalId = setInterval(nextSlideRef, 3000); 
    }
}

 const token = "EAAtAVZBDoEV0BQ0roEJmLwgdGtr2nBc7e3E9en4ySqJBstSV3WFHuZA0LF3HMFiU7vdBIsXyDCr1CFxe1TMxdOOCWs23znZCEgKdq8Le6MLjVKBwDjSpJHJwkMeAYWHMZA9NAkCgT0X8ZCylW3odRuUJ8R40ZBCUkqna2Poa2iAn3cuR4bvlybHk8ZAzFr4";

const reels = async () => {
    try {
        const response = await fetch(
            `https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,thumbnail_url,permalink,timestamp&access_token=${token}`
        );
        const datos = await response.json(); 

        MostrarPost(datos);
    } catch (error) {
        console.log("Error: no se pudo conectar con la API", error);
    }
};
document.addEventListener("DOMContentLoaded", () => {
const MostrarPost = (reels) => {
    const containerReels = document.querySelector(".carousel-items");

    if (!containerReels) {
        console.error("Error: El contenedor '.carousel-items' no fue encontrado en el HTML.");
        return;
    }

    containerReels.innerHTML = '';

    reels.data.slice(0, 9).forEach((reel, index) => {
        const reelCard = document.createElement("div");
        reelCard.classList.add("carousel-item");
        if (index === 0) reelCard.classList.add("active"); 

        let mediaElement;

        if (reel.media_type === "IMAGE" || reel.media_type === "CAROUSEL_ALBUM") {
            mediaElement = document.createElement("img");
            mediaElement.classList.add("instagram-media");
            mediaElement.src = reel.media_url;
            mediaElement.alt = "Post de Instagram";
        } else if (reel.media_type === "VIDEO") {
            mediaElement = document.createElement("video");
            mediaElement.classList.add("instagram-media");
            mediaElement.src = reel.media_url;
            mediaElement.controls = true; 

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
        containerReels.appendChild(reelCard); 
    });

    inicializarCarousel(); 
}
});


const inicializarCarousel = () => {
    const carousel = document.querySelector(".carousel");
    const carouselItems = document.querySelectorAll(".carousel-item");
    const prevBtn = document.querySelector(".carousel-prev");
    const nextBtn = document.querySelector(".carousel-next");
    const indicatorsContainer = document.querySelector(".carousel-indicators");


    if (!carousel || !prevBtn || !nextBtn || !indicatorsContainer || carouselItems.length === 0) {
        console.error("Error: Faltan elementos del carrusel en el HTML. Asegúrate de que las clases '.carousel', '.carousel-prev', '.carousel-next', '.carousel-indicators' y '.carousel-item' existan.");
        return;
    }

    let currentIndex = 0;
    const totalItems = carouselItems.length;

    
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

    
    nextSlideRef = nextSlide;

    
    updateCarousel();
    startAutoplay();

   
    prevBtn.addEventListener("click", prevSlide);
    nextBtn.addEventListener("click", nextSlide);

    
    carousel.addEventListener("mouseenter", () => {
        stopAutoplay();
    });

    carousel.addEventListener("mouseleave", () => {
        startAutoplay();
    });

    
    let touchStartX = 0;
    let touchEndX = 0;

    
    carousel.addEventListener(
        "touchstart",
        (e) => {
            touchStartX = e.changedTouches[0].screenX;
            stopAutoplay();
        },
        { passive: true } 
    );


    carousel.addEventListener(
        "touchend",
        (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startAutoplay();
        },
        { passive: true }
    );


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
};


reels();
