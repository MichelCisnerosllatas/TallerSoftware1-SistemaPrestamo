document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('.div_contenedor').addEventListener('click', function (event) {
        //solo muestra el modal de clientes.
        if (event.target && event.target.id === 'btnPrestamoSeleccionarCliente'){
            event.preventDefault();
            const modal = document.getElementById('modalListadoClientePrestamo');
            modal.style.display = "block";
            window.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        }

        if(event.target && event.target.id === 'botonCancelarModalListadoClientePrestamo2'){
            event.preventDefault();
            const modal = document.getElementById('modalListadoClientePrestamo');
            modal.style.display = "none";
        }


        //solo muestra la ventana del Nuevo Prestaamo.
        if (event.target && event.target.id === 'botonNuevoPrestamo' || event.target && event.target.id === 'botonNuevoPrestamo1') {
            const ventanaNuevoPrestamo = document.getElementById('ventana-content-NuevoPrestamo');
            const tablaPrestamos = document.getElementById('tablaPrestamos');
            limpiarParametrosPrestamosMantenimiento();
            tablaPrestamos.style.display = "none";
            ventanaNuevoPrestamo.style.display = "block";
        }

        //solo cierra la ventana del Nuevo Prestaamo.
        if (event.target && event.target.id === 'botonCancelarventanaNuevoPrestamo2' || event.target && event.target.id === 'botonCancelarventanaNuevoPrestamo1') {
            const ventanaNuevoPrestamo = document.getElementById('ventana-content-NuevoPrestamo');
            const tablaPrestamos = document.getElementById('tablaPrestamos');
            tablaPrestamos.style.display = "block";
            ventanaNuevoPrestamo.style.display = "none";
        }

        //seleccionamos el cliente desde la tabla.
        if (event.target && event.target.id === 'btnseleccionarcliente'){
            const clienteData = JSON.parse(event.target.getAttribute('data-cliente'));

            const modal = document.getElementById('modalListadoClientePrestamo');
            const inputPrestamoSeleccionarCliente = document.getElementById('inputPrestamoSeleccionarCliente');
            const inputPrestamoSeleccionarClienteIDCliente = document.getElementById('inputPrestamoSeleccionarClienteIDCliente');

            inputPrestamoSeleccionarClienteIDCliente.value = clienteData["IdCliente"];
            inputPrestamoSeleccionarCliente.value = clienteData["NombreCliente"];
            modal.style.display = "none";
        }

        if(event.target && event.target.id === 'btnprestamoMono100' || event.target && event.target.id === 'btnprestamoMono200' || event.target && event.target.id === 'btnprestamoMono300' || event.target && event.target.id === 'btnprestamoMono500' || event.target && event.target.id === 'btnprestamoMono1000'){
            event.preventDefault();
            const inputPrestamoSeleccionarCliente = document.getElementById('inputMontoPrestamo');

            if(event.target.id === "btnprestamoMono100"){
                inputPrestamoSeleccionarCliente.value = 100.00;
            }

            if(event.target.id === "btnprestamoMono200"){
                inputPrestamoSeleccionarCliente.value = 200.00;
            }

            if(event.target.id === "btnprestamoMono300"){
                inputPrestamoSeleccionarCliente.value = 300.00;
            }

            if(event.target.id === "btnprestamoMono500"){
                inputPrestamoSeleccionarCliente.value = 500.00;
            }

            if(event.target.id === "btnprestamoMono1000"){
                inputPrestamoSeleccionarCliente.value = 1000.00;
            }
            CalcularPrestamo();
        }

        if(event.target && event.target.id === 'botonRegistrarPrestamo'){
            enviarvaloresPrestamosComponeteInsertar();
        }
    });

    document.querySelector('.div_contenedor').addEventListener('change', function (event) {
        if (event.target && event.target.id === 'selectinteresprestamo' || event.target && event.target.id === 'selectFormaPagoprestamo' || event.target && event.target.id === 'selectIdTipoCobroprestamo') {
            CalcularPrestamo();
        }
    });

    document.querySelector('.div_contenedor').addEventListener('input', function (event) {
        if (event.target && event.target.id === 'inputMontoPrestamo') {
            CalcularPrestamo();
        }
    });

    function enviarvaloresPrestamosComponeteInsertar(){
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Antes de registrar verifica muy bien los datos del prestamo?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, Registrar',
            cancelButtonText: 'No, Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const fechaprestamo = new Date();
                const fechaLocal = fechaprestamo.getFullYear() + "-" +
                    ("0" + (fechaprestamo.getMonth() + 1)).slice(-2) + "-" +
                    ("0" + fechaprestamo.getDate()).slice(-2) + " " +
                    ("0" + fechaprestamo.getHours()).slice(-2) + ":" +
                    ("0" + fechaprestamo.getMinutes()).slice(-2) + ":" +
                    ("0" + fechaprestamo.getSeconds()).slice(-2);

                // Aquí obtienes el IdCliente del objeto que se pasa en el modal
                const datosPrestamoParametros = {
                    idprestamo: document.getElementById('inputIDPrestamo').value,
                    idcliente: document.getElementById('inputPrestamoSeleccionarClienteIDCliente').value,
                    tipomoneda: "1", //Soles
                    tipoprestamo: "1", //Efectivo
                    porcentajeinteres: document.getElementById('selectinteresprestamo').value,
                    montointeres: document.getElementById("labelValorMontoInteresPrestamo").innerHTML,
                    montoprestado: document.getElementById("inputMontoPrestamo").value,
                    montocalculado: "0.00",
                    montodevolucion: document.getElementById("labelValorMontoTotalRecibirPrestamo").innerHTML,
                    fecharegistro: fechaLocal,
                    idtipopago: document.getElementById('selectIdTipoCobroprestamo').value,
                    base: document.getElementById('selectIdTipoFormateadaprestamo').value,
                    cuotas: document.getElementById("labelvalornumeroCuotaPrestamo").innerHTML,
                    montocuota: document.getElementById("labelValorMontoCuotaPrestamo").innerHTML,
                    fechavencimiento: document.getElementById("labelValorFechaVencimientoPrestamo").innerHTML,
                    observacionprestamo: document.getElementById('txtinputObservacionPrestamo').value,
                };

                // Verifica si Livewire está disponible antes de emitir el evento
                if (window.Livewire) {
                    Livewire.dispatch('mantenimientoPrestamoRecibeDesdeJS', [datosPrestamoParametros]);

                    // Escuchar cuando el proceso ha terminado
                    // Livewire.on('clienteInsertadoExitosamente', () => {
                    //     cerrarModalNuevoCliente();
                    // });
                } else {
                    console.error('Livewire no está disponible');
                }
            } else {
                // Acción si elige "No"
                console.log('Acción cancelada');
            }
        });


    }

    function limpiarParametrosPrestamosMantenimiento(){
        document.getElementById("inputMontoPrestamo").value = "";
        document.getElementById("txtbuscarprestamo").value = "";
        document.getElementById("labelValorMontoTotalRecibirPrestamo").innerHTML = "S/. 0.00";
        document.getElementById("labelvalornumeroCuotaPrestamo").innerHTML = "No definido";
        document.getElementById("labelValorMontoCuotaPrestamo").innerHTML = "S/. 0,00";
        document.getElementById("labelValorMontoInteresPrestamo").innerHTML = "S/. 0,00";
        document.getElementById("labelValorFechaVencimientoPrestamo").innerHTML = "No definido";
        document.getElementById("labelValorFechacobroPrestamo").innerHTML = "No definido";
    }

    function CalcularPrestamo(){
        const inputMontoPrestamo = document.getElementById("inputMontoPrestamo").value;
        const selectInteres = document.getElementById('selectinteresprestamo').value;
        let selectTipoCobro = document.getElementById('selectIdTipoCobroprestamo').value;
        let fechavencimiento = "";
        let fechaCobro = obtenerFechaActual();

        // let labelvalornumeroCuotaPrestamo = document.getElementById("labelvalornumeroCuotaPrestamo");
        // let labelValorMontoCuotaPrestamo = document.getElementById("labelValorMontoCuotaPrestamo");
        // let labelValorMontoTotalRecibirPrestamo = document.getElementById("labelValorMontoTotalRecibirPrestamo");

        switch (selectTipoCobro){
            case "1":{
                selectTipoCobro = 24;
                fechavencimiento = CalcularFechaVencimiento("1", selectTipoCobro);
                fechaCobro = "Diario/No Domingos";
                break;
            }

            case "2":{
                selectTipoCobro = 4;
                fechavencimiento = CalcularFechaVencimiento("2", selectTipoCobro);
                fechaCobro = "Cada " + fechaCobro.diaSemana
                break;
            }

            case "3":{
                selectTipoCobro = 15;
                fechavencimiento = CalcularFechaVencimiento("3", selectTipoCobro);
                fechaCobro = "Todos los " + fechaCobro.fecha + " /Mensual"
                break;
            }
        }

        if(validarDoublePrestamo(inputMontoPrestamo)){
            const MontoCuota = CalcularMontoCuota(inputMontoPrestamo, selectInteres, selectTipoCobro);
            const MontoInteres = CalcularMontoInteresPrestamo(inputMontoPrestamo, selectInteres);
            let montoTotal = parseFloat(inputMontoPrestamo) + parseFloat(MontoInteres);

            document.getElementById("labelValorMontoTotalRecibirPrestamo").innerHTML = `S/. ${montoTotal.toFixed(2)}`;
            document.getElementById("labelvalornumeroCuotaPrestamo").innerHTML = `${selectTipoCobro}`;
            document.getElementById("labelValorMontoCuotaPrestamo").innerHTML = `S/ ${MontoCuota}`;
            document.getElementById("labelValorMontoInteresPrestamo").innerHTML = `S/ ${MontoInteres}`;
            document.getElementById("labelValorFechaVencimientoPrestamo").innerHTML = fechavencimiento.diaSemana + ", " + fechavencimiento.fecha;
            document.getElementById("labelValorFechacobroPrestamo").innerHTML = fechaCobro.toString();
        }
    }

    function CalcularMontoCuota(montoprestamo, interes, tiempo) {
        let errorMensaje = document.querySelector("#errorMensaje");

        if (isNaN(montoprestamo) || isNaN(interes) || isNaN(tiempo)) {
            errorMensaje.style.display = "block";
            // inputField.style.borderColor = "red";
            console.log("Por favor ingrese valores numéricos válidos.");
            return;
        }

        montoprestamo = parseFloat(montoprestamo);
        interes = parseFloat(interes) / 100; // Convertir porcentaje a decimal.
        tiempo = parseInt(tiempo);

        let montocuota = (montoprestamo + (montoprestamo * interes)) / tiempo;
        return montocuota.toFixed(2);
    }

    function CalcularMontoInteresPrestamo(montoprestamo, interes) {
        if (isNaN(montoprestamo) || isNaN(interes)) {
            console.log("Por favor ingrese valores numéricos válidos.");
            return;
        }

        montoprestamo = parseFloat(montoprestamo);
        interes = parseFloat(interes) / 100;
        let montointerers = montoprestamo * interes;
        return montointerers.toFixed(2);
    }

    function CalcularFechaVencimiento(tipo, cantidad) {
        let fecha = new Date();

        if (tipo === '1') {
            fecha.setDate(fecha.getDate() + cantidad);
        } else if (tipo === '2') {
            fecha.setDate(fecha.getDate() + (cantidad * 7));
        } else if (tipo === '3') {
            fecha.setDate(fecha.getDate() + cantidad);
        }

        const diasDeLaSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        let diaSemana = diasDeLaSemana[fecha.getDay()];

        return {
            fecha: fecha.toLocaleDateString(), // Formato de fecha: "MM/DD/YYYY"
            diaSemana: diaSemana
        };
    }

    function obtenerFechaActual() {
        let fecha = new Date();  // Obtiene la fecha actual

        // Obtener día, mes y año
        let dia = fecha.getDate(); // Día del mes (1-31)
        let mes = fecha.getMonth() + 1; // Mes (0-11, así que sumamos 1)
        let año = fecha.getFullYear(); // Año (YYYY)

        // Si el día o mes es menor de 10, agregamos un 0 para el formato de dos dígitos
        dia = dia < 10 ? '0' + dia : dia;
        mes = mes < 10 ? '0' + mes : mes;

        // Formato "DD/MM/YYYY"
        let fechaFormateada = `${dia}/${mes}/${año}`;
        const diasDeLaSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        let diaSemana = diasDeLaSemana[fecha.getDay()];  // Día de la semana (0-6)

        // Devolver la fecha y el día de la semana
        return {
            fecha: fechaFormateada,
            mes: mes,
            diaSemana: diaSemana
        };
    }

    function validarDoublePrestamo(valor) {
        let regex = /^[+-]?(\d+(\.\d*)?|\.\d+)$/;
        return regex.test(valor);
    }
});
