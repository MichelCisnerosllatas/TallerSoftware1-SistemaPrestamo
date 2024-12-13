<div class="divGraficosDashboard">
    <div class="card">
        <div style="display: flex; justify-content: left; margin-left: 10px; margin-top: 10px">
            <h4>Sectores con Mas Prestamos</h4>
        </div>
        <div class="dicgrafiocsPasteles" id="CardGraficoPastel"></div>
    </div>

    <div class="card">
        <div style="display: flex; justify-content: left;margin-left: 10px; margin-top: 10px">
            <h4>Sectores con Mas Pagos</h4>
        </div>
        <div class="dicgrafiocsPasteles" id="CardGraficoPastel1"></div>
    </div>

    <div class="card">
        <div class="dicgrafiocsPasteles" id="charteder"></div>
    </div>
</div>


@script
<script>
        $(document).ready(function (){
            var options1 = {
                // series: [44, 55, 13, 50, 50],
                series: <?= json_encode($SeriesSectoresPrestamo) ?>,
                chart: {
                    width: 400,
                    type: 'pie',
                },
                // labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                labels: <?= json_encode($LabelSectoresPrestamo) ?>,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var options3 = {
                // series: [44, 55, 13, 50, 50],
                series: <?= json_encode($SeriesSectoresPagos) ?>,
                chart: {
                    width: 400,
                    type: 'pie',
                },
                // labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                labels: <?= json_encode($LabelSectoresPagos) ?>,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var options2 = {
                series: [{
                    name: "Monto",
                    data: <?= json_encode($ValoresMonto) ?>
                    // data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Prestamos de todo el Año',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: <?= json_encode($NombreMes) ?>
                    // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                }
            };
            // Configuración del gráfico de líneas con datos reales


            var chart1 = new ApexCharts(document.querySelector("#CardGraficoPastel"), options1);
            var chart2 = new ApexCharts(document.querySelector("#charteder"), options2);
            var chart3 = new ApexCharts(document.querySelector("#CardGraficoPastel1"), options3);

            chart1.render();
            chart2.render();
            chart3.render();
        })
</script>
@endscript
