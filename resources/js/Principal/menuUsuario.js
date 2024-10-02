document.addEventListener('DOMContentLoaded', function () {
    initDropdownMenu();
    handleOutsideClick();
    setupDropdownLinks();
});

// Función para mostrar u ocultar el dropdown
function initDropdownMenu() {
    const dropbtn = document.querySelector('.dropbtn');
    if (dropbtn) {
        dropbtn.addEventListener('click', function() {
            document.getElementById("myDropdown").classList.toggle("show");
        });
    }
}

// Función para cerrar el dropdown si el usuario hace clic fuera de él
function handleOutsideClick() {
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    };
}

// Función para manejar enlaces del dropdown (Perfil, Ajustes, Cerrar Sesión)
function setupDropdownLinks() {
    const dropdownLinks = document.querySelectorAll('.dropdown-content a');
    const contentDiv = document.querySelector('.div_contenedor'); // Contenedor de contenido AJAX
    const navLinks = document.querySelectorAll('.menu_navegacion a'); // Enlaces del menú de navegación

    dropdownLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            const href = link.getAttribute('href');
            console.log(href);
            // Si el enlace es "Cerrar Sesión", manejar con AJAX (POST request)
            if (href === '/logout') {
                event.preventDefault();
                logoutUser(); // Llama la función para el logout
            } else {
                // Manejar las otras páginas como "Perfil" y "Ajustes"
                event.preventDefault();
                loadPage(href, contentDiv, navLinks);
            }
        });
    });
}

// Función para hacer logout usando AJAX
function logoutUser() {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/logout', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json',
        }
    })
        .then(response => {
            if (response.ok) {
                // Redirigir al login sin historial
                window.location.replace('/login');
            } else {
                console.error('Error al cerrar sesión');
            }
        })
        .catch(error => {
            console.error('Error al hacer la solicitud:', error);
        });
}

// Función para cargar contenido AJAX (Perfil, Ajustes)
function loadPage(href, contentDiv, navLinks) {
    contentDiv.innerHTML = '<p>Cargando...</p>';

    // Remover la clase 'active' de los enlaces del menú de navegación
    navLinks.forEach(navLink => {
        navLink.classList.remove('active');
    });

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
        })
        .catch(error => {
            console.error('Error al cargar el contenido:', error);
            contentDiv.innerHTML = '<p>Ocurrió un error al cargar el contenido.</p>';
        });
}


// document.addEventListener('DOMContentLoaded', function () {
//
//     // Función para mostrar u ocultar el dropdown
//     function btndropdownUsuario() {
//         document.getElementById("myDropdown").classList.toggle("show");
//     }
//
//     // Evento de clic en el botón de dropdown
//     const dropbtn = document.querySelector('.dropbtn');
//     if (dropbtn) {
//         dropbtn.addEventListener('click', btndropdownUsuario);
//     }
//
//     // Cerrar el dropdown si el usuario hace clic fuera de él
//     window.onclick = function(event) {
//         if (!event.target.matches('.dropbtn')) {
//             var dropdowns = document.getElementsByClassName("dropdown-content");
//             for (let i = 0; i < dropdowns.length; i++) {
//                 let openDropdown = dropdowns[i];
//                 if (openDropdown.classList.contains('show')) {
//                     openDropdown.classList.remove('show');
//                 }
//             }
//         }
//     };
//
//     // Cargar contenido AJAX para "Perfil" y "Ajustes"
//     const dropdownLinks = document.querySelectorAll('.dropdown-content a');
//     const contentDiv = document.querySelector('.div_contenedor'); // Asegúrate de tener este contenedor definido
//     const navLinks = document.querySelectorAll('.menu_navegacion a'); // Enlaces del menú de navegación
//
//     dropdownLinks.forEach(link => {
//         link.addEventListener('click', function(event) {
//             const href = link.getAttribute('href');
//
//             // Si el enlace es para "Cerrar Sesión", usar window.location.href
//             if (href === '/login') {
//                 event.preventDefault();
//                 window.location.replace('/login');
//                 //window..href = href;
//             }else{
//                 event.preventDefault();
//                 contentDiv.innerHTML = '<p>Cargando...</p>';
//
//                 // Remover la clase 'active' de los enlaces del menú de navegación
//                 navLinks.forEach(navLink => {
//                     navLink.classList.remove('active');
//                 });
//
//                 // Hacer la petición AJAX
//                 fetch(href, {
//                     method: 'GET',
//                     headers: {
//                         'X-Requested-With': 'XMLHttpRequest' // Laravel detecta que es una solicitud AJAX
//                     }
//                 }) .then(response => response.text()) // Convertir la respuesta en texto
//                 .then(data => {
//                     contentDiv.innerHTML = data; // Cargar el contenido en el div
//                 })
//                 .catch(error => {
//                     console.error('Error al cargar el contenido:', error);
//                     contentDiv.innerHTML = '<p>Ocurrió un error al cargar el contenido.</p>';
//                 });
//             }
//         });
//     });
// });
