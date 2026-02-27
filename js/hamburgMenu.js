document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".hamburger-menu");
  const sidebar = document.querySelector(".sidebar-menu");
  const closeBtn = document.querySelector(".close-btn");
  const overlay =
    document.querySelector(".overlay") || document.createElement("div");

  if (!document.querySelector(".overlay")) {
    overlay.classList.add("overlay");
    document.body.appendChild(overlay);
  }

  if (hamburger) {
    hamburger.addEventListener("click", () => {
      if (sidebar) sidebar.classList.add("active");
      if (overlay) overlay.classList.add("active");
    });
  }

  function closeMenu() {
    if (sidebar) sidebar.classList.remove("active");
    if (overlay) overlay.classList.remove("active");
  }

  if (closeBtn) closeBtn.addEventListener("click", closeMenu);
  if (overlay) overlay.addEventListener("click", closeMenu);
});

// funcion para el subrayado del menú de navegación
document.addEventListener("DOMContentLoaded", function () {
  const desktopNavLinks = document.querySelectorAll(
    ".direeciones .desktop-nav-header",
  );
  const currentPathname = window.location.pathname;

  desktopNavLinks.forEach((link) => {
    const linkHref = link.href;
    const linkPathname = new URL(linkHref).pathname;
    const linkText = link.textContent.toLowerCase();

    const normalize = (path) => path.replace(/\/+$/, "");

    const current = normalize(currentPathname);
    const target = normalize(linkPathname);

    // Elimina la clase 'active' de todos los enlaces al inicio del ciclo
    link.classList.remove("active");

    // Coincidencia exacta
    if (current === target) {
      link.classList.add("active");
    }

    //Coincidencia por subpágina (ej: parques.php y parque.php)
    else if (
      ["parques.php", "parque.php"].includes(current.split("/").pop()) &&
      linkPathname.includes("parques.php")
    ) {
      link.classList.add("active");
    }

    // Coincidencia con index
    else if (current === "/" && linkPathname.includes("index.php")) {
      link.classList.add("active");
    }

    // Si la URL termina exactamente en '/servicios'
    else if (current.endsWith("/servicios") && linkText.includes("servicios")) {
      link.classList.add("active");
    }

    // Si la URL termina exactamente en '/servicio.php para servicio al cliente'
    else if (
      current.endsWith("servicio.php") &&
      linkText.includes("contacto")
    ) {
      link.classList.add("active");
    }

    // Si estás en preguntas frecuentes, resaltar SERVICIOS
    else if (
      current.includes("preguntasfrecuentes") &&
      linkText.includes("servicios")
    ) {
      link.classList.add("active");
    } else if (current.includes("cotizar") && linkText.includes("servicios")) {
      link.classList.add("active");
    }

    //Si está en política, resaltar servicios
    else if (current.includes("politica") && linkText.includes("servicios")) {
      link.classList.add("active");
    } else if (
      current.includes("nuestraempresa") &&
      linkText.includes("servicios")
    ) {
      link.classList.add("active");
    }
  });
});

// script de leer mas y leer menos en politica de privacidad
document.addEventListener("DOMContentLoaded", function () {
  const expandableSectionWrapper = document.querySelector(
    ".expandable-section-wrapper",
  );

  if (expandableSectionWrapper) {
    const expandableContent = expandableSectionWrapper.querySelector(
      ".expandable-content",
    );
    const leerMasBtn = expandableSectionWrapper.querySelector(".leer-mas-btn");
    const leerMenosBtn =
      expandableSectionWrapper.querySelector(".leer-menos-btn");

    // Aseguramos el estado inicial
    expandableContent.style.display = "none";
    leerMenosBtn.style.display = "none";
    leerMasBtn.style.display = "block";

    // Event listener para el botón "Leer más"
    leerMasBtn.addEventListener("click", function () {
      expandableContent.style.display = "block";
      leerMasBtn.style.display = "none";
      leerMenosBtn.style.display = "block";
    });

    leerMenosBtn.addEventListener("click", function () {
      expandableContent.style.display = "none";
      leerMasBtn.style.display = "block";
      leerMenosBtn.style.display = "none";
    });
  }
});

//script del aside
document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("click", function (event) {
    const btn = event.target.closest(".enlaces-derecha-parques");
    const dropdown = document.getElementById("myDropdown");

    if (btn) {
      if (dropdown) dropdown.classList.toggle("show");
    } else {
      if (dropdown && dropdown.classList.contains("show")) {
        if (!event.target.closest("#myDropdown")) {
          dropdown.classList.remove("show");
        }
      }
    }
  });
});

// Script de intersection observer en el apartado de parques
document.addEventListener("DOMContentLoaded", function () {
  if (window.innerWidth <= 768) {
    const observerOptions = {
      root: null,
      threshold: 0.6,
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("aparecer");

          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    const target = document.querySelector(".enlaces-derecha-parques");
    if (target) {
      observer.observe(target);
    }
  }
});

// Script para el intersection observer en pantllas pequeñas
document.addEventListener("DOMContentLoaded", function () {
  if (window.innerWidth <= 768) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const loop = () => {
              entry.target.classList.add("intersection");

              setTimeout(() => {
                entry.target.classList.remove("intersection");

                setTimeout(loop, 5000);
              }, 10000);
            };

            loop();

            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.2 },
    );

    const target = document.querySelector(".dominick-derecha");
    if (target) {
      observer.observe(target);
    }
  }
});

//script para el pop-up de parques
function lista() {
  var attracctionList = document.getElementById("modal");
  var close = document.getElementById("close");
  attracctionList.classList.add("visible");
  attracctionList.classList.remove("modal");
  close.addEventListener("click", function () {
    attracctionList.classList.add("modal");
    attracctionList.classList.remove("visible");
  });
}

function proximamente() {
  var blog = document.getElementById("blog-footer");
  var close = document.getElementById("close-footer");

  blog.classList.add("visible-footer");
  blog.classList.remove("blog-footer");
  close.addEventListener("click", function () {
    blog.classList.add("blog-footer");
    blog.classList.remove("visible-footer");
  });
}
