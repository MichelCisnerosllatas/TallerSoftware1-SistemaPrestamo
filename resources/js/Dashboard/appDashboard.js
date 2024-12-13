// Cargar la API de Google Charts
document.addEventListener('DOMContentLoaded', function() {
    // console.log("Dashboard está a punto de cargarse.");
    document.querySelector('.menu_navegacion').addEventListener('click', function (event) {
        if(event.target && event.target.id === 'enlaceDashboard'){
            // document.getElementById("divPagosDiariosDasboard").style.display = "none";
            // document.getElementById("cardpagosaldiaInicioIndicatorCircule").style.display = "flex";
        }
    });
});

// // Función para dibujar el gráfico
// function drawChart() {
//     google.charts.load('current', {'packages':['corechart']});
//     var data = new google.visualization.DataTable();
//     data.addColumn('string', 'Topping');
//     data.addColumn('number', 'Slices');
//     data.addRows([
//         ['Mushrooms', 3],
//         ['Onions', 1],
//         ['Olives', 1],
//         ['Zucchini', 1],
//         ['Pepperoni', 2]
//     ]);
//
//     var options = {
//         'title': 'How Much Pizza I Ate Last Night',
//         'width': 400,
//         'height': 300
//     };
//
//     var chart = new google.visualization.PieChart(document.getElementById('idgraficoSectoresinicio'));
//     chart.draw(data, options);
// }

// Ejecutar drawChart solo después de cargar el contenido dinámicamente

