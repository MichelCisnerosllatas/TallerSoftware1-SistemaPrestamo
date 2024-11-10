function init() {
    const btnmenu = document.getElementById('btnmenu');
    const btndrawer = document.getElementById('btndrawer');
    const overlay = document.getElementById('overlay');

    btnmenu.addEventListener('click', function() {
        if (window.innerWidth <= 600){
            toggle_nav_cel();
        } else {
            abrir_nav_PC();
        }
    });

    btndrawer.addEventListener('click', function() {
        cerrar_nav_cel();
    });

    overlay.addEventListener('click', function() {
        cerrar_nav_cel(); //click en el fondo se cierra el drawer
    });

    // Cerrar el menú al hacer clic en las opciones de navegación en dispositivos móviles
    document.querySelectorAll('.menu_navegacion a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 600) {
                cerrar_nav_cel(); // Cerrar el menú después de hacer clic en una opción de navegación
            }
        });
    });

    navegacionPaginas();
    setupInitialRedirect();
}

// Función para alternar el menú en dispositivos móviles
function toggle_nav_cel() {
    const nav = document.getElementById('nav');
    const overlay = document.getElementById('overlay');
    if (nav.classList.contains('menu-open')) {
        cerrar_nav_cel(); // Si el menú está abierto, lo cerramos
    } else {
        abrir_nav_cel(); // Si el menú está cerrado, lo abrimos
    }
}

function abrir_nav_PC() {
    const nav = document.getElementById('nav');
    nav.classList.toggle('collapse'); // Alterna la clase 'collapse'
}

function abrir_nav_cel() {
    const nav = document.getElementById('nav');
    const overlay = document.getElementById('overlay');
    nav.classList.add('menu-open'); // Mostrar el menú en dispositivos móviles
    overlay.style.display = 'block'; // Mostrar el overlay
}

function cerrar_nav_cel() {
    const nav = document.getElementById('nav');
    const overlay = document.getElementById('overlay');
    nav.classList.remove('menu-open'); // Ocultar el menú en dispositivos móviles
    overlay.style.display = 'none'; // Ocultar el overlay
}

function navegacionPaginas() {
    const links = document.querySelectorAll('.menu_navegacion a');
    const contentDiv = document.querySelector('.div_contenedor');
    const currentUrl = window.location.href; // Obtener la URL actual

    // Añadir un evento de clic a todos los enlaces de la barra de navegación
    links.forEach(link => {
        link.addEventListener('click', function (event) {
            const href = link.getAttribute('href');
            const title = link.textContent.trim(); // Obtener el texto del enlace como el título

            //no redirecciono si esta activo el enlace
            if (link.classList.contains('active') || currentUrl === href) {
                event.preventDefault(); // Evita la recarga
                return;
            }

            event.preventDefault();
            links.forEach(l => l.classList.remove('active')); //Remuevo el enlace actual para agregar el recien clickeado
            link.classList.add('active');

            // Limpiar el contenido actual
            contentDiv.innerHTML = '<p>Cargando...</p>';

            // Hacer la petición AJAX
            fetch(href, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // Laravel detecta que es una solicitud AJAX
                }
            })
                .then(response => response.text()) // Convertir la respuesta en texto
                .then(data => {
                    contentDiv.innerHTML = data; // Cargar el contenido en el div
                    document.title = `Sistema Prestamos | ${title}`; // nombre que sale en el titulo Navegador

                    // Vuelve a inicializar el modal después de cargar el contenido por AJAX
                    //iniciarPrestamo();
                })
                .catch(error => {
                    console.error('Error al cargar el contenido:', error);
                    contentDiv.innerHTML = '<p>Ocurrió un error al cargar el contenido.</p>';
                });
        });
    });
}

function setupInitialRedirect() {
    const currentUrl = window.location.href;

    // Verificar si la URL es la principal y redirigir a "Dashboard"
    if (currentUrl.includes('/Principal')) {
        // Redirigir a la sección Dashboard automáticamente
        const dashboardLink = document.querySelector('a[href="/Dashboard"]'); // Ajusta esta ruta si es diferente
        if (dashboardLink) {
            dashboardLink.click(); // Simular un clic en el enlace de Dashboard
        }
    }
}
document.addEventListener('DOMContentLoaded', init);
