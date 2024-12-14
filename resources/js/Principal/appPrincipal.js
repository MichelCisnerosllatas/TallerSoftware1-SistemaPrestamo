document.addEventListener('DOMContentLoaded', init);
import ApexCharts from 'apexcharts';
window.ApexCharts = ApexCharts;  // Exponer a window para usar en Blade

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
            // contentDiv.innerHTML = '<p>Cargando...</p>';
            contentDiv.innerHTML = '<div style="display: flex; justify-content: center; align-items: center"><p>Cargando...</p></div>'
            // Hacer la petición AJAX
            fetch(href, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // Laravel detecta que es una solicitud AJAX
                }
            })
                .then(response => response.text()) // Convertir la respuesta en texto
                .then(data => {
                    // localStorage.setItem('datosinicio', true);
                    // sessionStorage.setItem('lastPageData', data);
                    contentDiv.innerHTML = data; // Cargar el contenido en el div
                    document.title = `Sistema Prestamos | ${title}`; // nombre que sale en el titulo Navegador

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
        var dashboardLink = document.querySelector('a[href="/Dashboard"]'); // Ajusta esta ruta si es diferente
        if (dashboardLink) {
            dashboardLink.click(); // Simular un clic en el enlace de Dashboard
        }else {
            dashboardLink = document.querySelector('a[href="/Cliente"]');
            dashboardLink.click();
        }
    }
}

// Función que simula la espera de 10 segundos antes de ejecutar la acción
async function alimentarDashbordPagosDiarios() {
    console.log("Iniciando...");

    const contentDiv = document.getElementById("divPagosDiariosDasboard");
    const indicatorDiv = document.getElementById("cardpagosaldiaInicioIndicatorCircule");

    // Verifica que los elementos existan
    if (!contentDiv || !indicatorDiv) {
        console.error("Uno de los elementos no se encontró");
        return;
    }

    // Ocultamos el contenido y mostramos el círculo de carga
    contentDiv.style.display = "none";
    indicatorDiv.style.display = "block";

    // Esperamos 1 segundo
    await new Promise(resolve => setTimeout(resolve, 1000));

    console.log("Pasó el tiempo...");

    // Ahora, después de 1 segundo, ocultamos el círculo y mostramos el contenido
    indicatorDiv.style.display = "none";
    contentDiv.style.display = "block";
}



// En appPrincipal.js
window.preguntarSI_NO = function(titulo, mensaje = null, confirmButtonText = "Sí", cancelButtonText = "No") {
    const texto = mensaje || '¿Estás seguro de realizar esta acción?';

    return Swal.fire({
        title: titulo,
        text: texto,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            return true;  // El usuario presionó "Sí"
        } else if (result.isDismissed) {
            return false;  // El usuario presionó "No"
        }
    });
}

// Función para abrir el modal de carga con un título y mensaje
window.SweetProgressOpen1 = function(titulo, mensaje = null, allowOutsideClick = false) {
    return Swal.fire({
        title: titulo,
        text: mensaje,
        allowOutsideClick: allowOutsideClick,
        didOpen: () => {
            Swal.showLoading();
        }
    });
}

// Función para cerrar el modal de carga
window.SweetProgressClose1 = function() {
    return Swal.close();
}

window.circuleProgressindicatorOpen = function (){
    document.getElementById("idcirlculeprogresindicator").style.display = "flex";
}

window.circuleProgressindicatorClose = function (){
    document.getElementById("idcirlculeprogresindicator").style.display = "none";
}

window.validarcorreoglobal = function (input){
    let vlidr = false;
    // const correoField = document.getElementById('correo');
    const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!correoRegex.test(input.value.trim())) {
        // correoField.classList.add('input-error'); // Resaltar en rojo
        Swal.fire({
            icon: 'error',
            title: 'Correo inválido',
            text: 'Por favor, ingresa un correo electrónico válido.',
        });
    } else {
        vlidr = true;
        // correoField.classList.remove('input-error');
    }
    return vlidr;
}

window.SweetAlertPrincipal2 = function (icon = "info", titulo = null, mensaje = null, footer = null, showCancelButton = false, confirmButtonText = "Aceptar", cancelButtonText = "Cancelar", timer = 0) {
    return Swal.fire({
        icon: icon,
        title: titulo || 'Título por defecto',
        text: mensaje || 'Texto por defecto',
        footer: footer || '',
        showCancelButton: showCancelButton,
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        timer: timer
    });
}
