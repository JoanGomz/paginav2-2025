document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.querySelector('.hamburger-menu');
  const sidebar = document.querySelector('.sidebar-menu');
  const closeBtn = document.querySelector('.close-btn');
  const overlay = document.querySelector('.overlay') || document.createElement('div');
  
  if (!document.querySelector('.overlay')) {
    overlay.classList.add('overlay');
    document.body.appendChild(overlay);
  }

  if (hamburger) {
    hamburger.addEventListener('click', () => {
      if (sidebar) sidebar.classList.add('active');
      if (overlay) overlay.classList.add('active');
    });
  }

  function closeMenu() {
    if (sidebar) sidebar.classList.remove('active');
    if (overlay) overlay.classList.remove('active');
  }

  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  if (overlay) overlay.addEventListener('click', closeMenu);
});

// funcion para el subrayado del menú de navegación 
document.addEventListener('DOMContentLoaded', function () {
  const desktopNavLinks = document.querySelectorAll('.direeciones .desktop-nav-header');
  const currentPathname = window.location.pathname;

  desktopNavLinks.forEach(link => {
    const linkHref = link.href;
    const linkPathname = new URL(linkHref).pathname;
    const linkText = link.textContent.toLowerCase();

    // Normalizador básico (sin necesidad de SITE_URL)
    const normalize = (path) => path.replace(/\/+$/, '');

    const current = normalize(currentPathname);
    const target = normalize(linkPathname);

    // Elimina la clase 'active' de todos los enlaces al inicio del ciclo
    link.classList.remove('active');

    // Coincidencia exacta
    if (current === target) {
      link.classList.add('active');
    }

    //Coincidencia por subpágina (ej: parques.php y parque.php)
    else if (
      ['parques.php', 'parque.php'].includes(current.split('/').pop()) &&
      linkPathname.includes('parques.php')
    ) {
      link.classList.add('active');
    }

    // Coincidencia con index
    else if (current === '/' && linkPathname.includes('index.php')) {
      link.classList.add('active');
    }
    
   
    // Si la URL termina exactamente en '/servicios'
    else if (current.endsWith('/servicios') && linkText.includes('servicios')) {
        link.classList.add('active');
    }
    
    // Si la URL termina exactamente en '/servicio.php para servicio al cliente'
    else if (current.endsWith('servicio.php') && linkText.includes('contacto')) {
        link.classList.add('active');
    }

    // Si estás en preguntas frecuentes, resaltar SERVICIOS
    else if (
      current.includes('preguntasfrecuentes') &&
      linkText.includes('servicios')
    ) {
      link.classList.add('active');
    }
    else if(
      current.includes('cotizar') &&
      linkText.includes('servicios')
    ){
      link.classList.add('active');
    }

    //Si está en política, resaltar servicios
    else if(
      current.includes('politica')&&
      linkText.includes('servicios')
    ){
      link.classList.add('active')
    }
  });
});


// script de leer mas y leer menos en politica de privacidad
document.addEventListener('DOMContentLoaded', function() {
  // Seleccionamos el contenedor principal de la funcionalidad de "leer más/menos" para esta sección
  const expandableSectionWrapper = document.querySelector('.expandable-section-wrapper');

  if (expandableSectionWrapper) {
      const expandableContent = expandableSectionWrapper.querySelector('.expandable-content');
      const leerMasBtn = expandableSectionWrapper.querySelector('.leer-mas-btn');
      const leerMenosBtn = expandableSectionWrapper.querySelector('.leer-menos-btn');

      // Aseguramos el estado inicial
      expandableContent.style.display = 'none';
      leerMenosBtn.style.display = 'none';
      leerMasBtn.style.display = 'block';

      // Event listener para el botón "Leer más"
      leerMasBtn.addEventListener('click', function() {
          expandableContent.style.display = 'block'; // Muestra el contenido
          leerMasBtn.style.display = 'none';         // Oculta "Leer más"
          leerMenosBtn.style.display = 'block';      // Muestra "Leer menos"
      });

      // Event listener para el botón "Leer menos"
      leerMenosBtn.addEventListener('click', function() {
          expandableContent.style.display = 'none';   // Oculta el contenido
          leerMasBtn.style.display = 'block';         // Muestra "Leer más"
          leerMenosBtn.style.display = 'none';        // Oculta "Leer menos"
      });
  }
});
//script del aside
var dropdownButton = document.querySelector('.dropbtn');


dropdownButton.addEventListener('click', function() {
  document.getElementById("myDropdown").classList.toggle("show");
});


window.onclick = function(event) {
  if (!event.target.matches('.dropbtn') && !event.target.closest('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}