function init() {
    const btnmenu = document.getElementById('btnmenu');
    const nav = document.getElementById('nav');

    btnmenu.addEventListener('click', toggleMenu); // Agrega el evento al botón
    navegacionPaginas();
    setupInitialRedirect();
}

function toggleMenu() {
    const nav = document.getElementById('nav');
    nav.classList.toggle('collapse'); // Alterna la clase 'collapse'
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








// // SIDEBAR TOGGLE
//
// // Estas variables deben estar globales
// let sidebarOpen = false;
// let sidebar = null;
// let overlay = null;
//
// function openSidebar() {
//     if (!sidebarOpen && sidebar && overlay) {
//         sidebar.classList.add('sidebar-responsive');
//         overlay.classList.add('active');
//         sidebarOpen = true;
//     }
// }
//
// function closeSidebar() {
//     if (sidebarOpen && sidebar && overlay) {
//         sidebar.classList.remove('sidebar-responsive');
//         overlay.classList.remove('active');
//         sidebarOpen = false;
//     }
// }
//
// // Esperamos a que el DOM esté completamente cargado para inicializar los elementos
// document.addEventListener("DOMContentLoaded", function() {
//     // Inicializamos el sidebar y el overlay una vez que el DOM esté listo
//     sidebar = document.getElementById('sidebar');
//     overlay = document.getElementById('overlay');
//
//     const menuIcon = document.querySelector('.menu-icon');
//     const closeButton = document.querySelector('.sidebar-title span'); // El botón de cerrar dentro del sidebar
//
//     // Añadimos el evento de clic al botón hamburguesa para abrir el sidebar
//     menuIcon.addEventListener('click', openSidebar);
//
//     // Añadimos el evento de clic al botón de cerrar dentro del sidebar
//     closeButton.addEventListener('click', closeSidebar);
//
//     // Añadimos el evento de clic al overlay para cerrar el sidebar cuando se haga clic fuera de él
//     overlay.addEventListener('click', closeSidebar);
// });
//
//
// // ---------- CHARTS ----------
//
// // BAR CHART
// const barChartOptions = {
//     series: [
//         {
//             data: [10, 8, 6, 4, 2],
//         },
//     ],
//     chart: {
//         type: 'bar',
//         height: 350,
//         toolbar: {
//             show: false,
//         },
//     },
//     colors: ['#246dec', '#cc3c43', '#367952', '#f5b74f', '#4f35a1'],
//     plotOptions: {
//         bar: {
//             distributed: true,
//             borderRadius: 4,
//             horizontal: false,
//             columnWidth: '40%',
//         },
//     },
//     dataLabels: {
//         enabled: false,
//     },
//     legend: {
//         show: false,
//     },
//     xaxis: {
//         categories: ['Laptop', 'Phone', 'Monitor', 'Headphones', 'Camera'],
//     },
//     yaxis: {
//         title: {
//             text: 'Count',
//         },
//     },
// };
//
// const barChart = new ApexCharts(
//     document.querySelector('#bar-chart'),
//     barChartOptions
// );
// barChart.render();
//
// // AREA CHART
// const areaChartOptions = {
//     series: [
//         {
//             name: 'Purchase Orders',
//             data: [31, 40, 28, 51, 42, 109, 100],
//         },
//         {
//             name: 'Sales Orders',
//             data: [11, 32, 45, 32, 34, 52, 41],
//         },
//     ],
//     chart: {
//         height: 350,
//         type: 'area',
//         toolbar: {
//             show: false,
//         },
//     },
//     colors: ['#4f35a1', '#246dec'],
//     dataLabels: {
//         enabled: false,
//     },
//     stroke: {
//         curve: 'smooth',
//     },
//     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
//     markers: {
//         size: 0,
//     },
//     yaxis: [
//         {
//             title: {
//                 text: 'Purchase Orders',
//             },
//         },
//         {
//             opposite: true,
//             title: {
//                 text: 'Sales Orders',
//             },
//         },
//     ],
//     tooltip: {
//         shared: true,
//         intersect: false,
//     },
// };
//
// const areaChart = new ApexCharts(
//     document.querySelector('#area-chart'),
//     areaChartOptions
// );
// areaChart.render();
