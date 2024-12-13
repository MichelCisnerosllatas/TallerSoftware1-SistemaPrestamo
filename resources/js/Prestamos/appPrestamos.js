document.addEventListener('DOMContentLoaded', function () {
    let timeout = null;
    let DatosPrestmosObtenidos = {};

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
            const cardprestamomant = document.getElementById('cardprestamomant');
            const cardprestamoresultadomant = document.getElementById('cardprestamoresultadomant');
            const tablaPrestamos = document.getElementById('tablaPrestamos');

            limpiarParametrosPrestamosMantenimiento();
            tablaPrestamos.style.display = "none";
            ventanaNuevoPrestamo.style.display = "block";

            cardprestamomant.style.display = "block";
            cardprestamoresultadomant.style.display = "block";
            document.getElementById('btnagregarpagoprestamodetalleMant').style.display = "none";
            document.getElementById('ventanaPrestamoFooter').style.display = "flex";
            document.getElementById('cardprestamodetalle1').style.display = "none";
            document.getElementById('cardprestamodetalle2').style.display = "none";
            document.getElementById('ventanaTitlePrestamoMant').innerHTML = "Nuevo Prestamo";

        }

        //solo cierra la ventana del Nuevo Prestaamo.
        if (event.target && event.target.id === 'botonCancelarventanaNuevoPrestamo2' || event.target && event.target.id === 'botonCancelarventanaNuevoPrestamo1') {
            cerrarVentanaMantenimientoPrestamo();
            // const ventanaNuevoPrestamo = document.getElementById('ventana-content-NuevoPrestamo');
            // const tablaPrestamos = document.getElementById('tablaPrestamos');
            // tablaPrestamos.style.display = "block";
            // ventanaNuevoPrestamo.style.display = "none";
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

        if (event.target && event.target.id === 'btnOpcionesPrestamo') {
            handleButtonClick(event);
        }

        if(event.target && event.target.id === 'checkedPagoCompletoPrestamodetalle'){
            const checked = document.getElementById("checkedPagoCompletoPrestamodetalle").checked;
            // document.getElementById("checkedPagoCompletoPrestamodetalle").checked = !document.getElementById("checkedPagoCompletoPrestamodetalle").checked;
            if(!checked) {
                document.getElementById("IDinputIngresarCuotasNuevoPagoPrestamoDetalle").style.display = "none";
            }
            else{
                document.getElementById("IDinputIngresarCuotasNuevoPagoPrestamoDetalle").style.display = "flex";
            }
        }

        if (event.target && event.target.id === 'btnagregarpagoprestamodetalleMant'){
            DatosPrestmosObtenidos = {
                idprestamo: document.getElementById('labelValorIdPrestamoDetalle').innerHTML,
                montocuota: document.getElementById("labelValorMontoCuotaPrestamoDetalle").innerHTML,
                montodevolucion : "S/. " + document.getElementById("labelValorMontoTotalRecibirPrestamoDetalle").innerHTML,
                montorestante : document.getElementById("labelValorMontoRestantePrestamoDetalle").innerHTML,
                montopagados : document.getElementById("labelValorMontoPagadasPrestamoDetalle").innerHTML,
                cuotapagadas : document.getElementById("labelvalornumeroCuotapagadasPrestamoDetalle").innerHTML,
                cuotatotal : document.getElementById("labelValorCuotaTotalPrestamoDetalle").innerHTML
            };

            abrirNuevoPagoModalPrestamoDetalle(DatosPrestmosObtenidos);
        }

        if(event.target && event.target.id === 'botonRegistrarpagoprestamodetalle'){
            const togle = document.getElementById("checkedPagoCompletoPrestamodetalle");
            const montopago = document.getElementById("idMontoPagoModalPrestamodetalle").value;
            if(validarPagoNulosPrestamoDetalle(montopago)){
                ParametrosPagosPrestamodetalleJavaScript(togle.checked).then(r => null);
            }
        }

        if(event.target && event.target.id === 'idbuttoncerrarcuadroError'){
            document.getElementById("idDivErrorNuevoPagoPrestamoDetalle").style.display = "none";
        }

        if (event.target && event.target.id === 'botonCancelarModalNuevopagoprestamodetalle2' || event.target && event.target.id === 'botonCancelarModalNuevopagoprestamodetalle1'){
            cerrarmodalNuevoPagoPrestamoDetalle();
            // document.getElementById("modalNuevoPagoPrestmoDetalleSombra").style.display = "none";
        }

        if (event.target && event.target.id === 'idlabeldetalleprestamo') {
            const ventanaNuevoPrestamo = document.getElementById('ventana-content-NuevoPrestamo');
            const cardprestamomant = document.getElementById('cardprestamomant');
            const cardprestamoresultadomant = document.getElementById('cardprestamoresultadomant');
            const cardprestamodetalle1 = document.getElementById('cardprestamodetalle1');
            const cardprestamodetalle2 = document.getElementById('cardprestamodetalle2');
            const tablaPrestamos = document.getElementById('tablaPrestamos');

            limpiarParametrosPrestamosMantenimiento();
            tablaPrestamos.style.display = "none";
            ventanaNuevoPrestamo.style.display = "block";

            cardprestamomant.style.display = "none";
            cardprestamoresultadomant.style.display = "none";
            cardprestamodetalle1.style.display = "block";
            cardprestamodetalle2.style.display = "block";
            cardprestamodetalle1.style.height = "calc(95vh - 3rem)";
            cardprestamodetalle2.style.height = "calc(95vh - 3rem)";

            document.getElementById('ventanaPrestamoFooter').style.display = "none";
            document.getElementById('ventanaTitlePrestamoMant').innerHTML = "Detalle del Prestamo";


            const index = event.target.getAttribute('data-index');
            const button = document.querySelector(`[data-Prestamo][data-index="${index}"]`);

            if (button) {
                const dataprestamo = JSON.parse(button.getAttribute('data-Prestamo'));
                console.log(dataprestamo);

                // Ahora puedes llamar a la función `detalleprestamo` con los datos del prestamo
                detalleprestamo(dataprestamo).then(r => null);
            } else {
                console.log('No se encontró el botón con data-index ' + index);
            }
            // detalleprestamo(dataprestamo).then(r => null);
        }

        if (event.target && event.target.id === 'idlabeleliminarprestamo') {
            const index = event.target.getAttribute('data-index');
            const button = document.querySelector(`[data-Prestamo][data-index="${index}"]`);

            if (button) {
                const dataprestamo = JSON.parse(button.getAttribute('data-Prestamo'));
                reciclarprestamoinicio(dataprestamo);
            } else {
                console.log('No se encontró el botón con data-index ' + index);
            }
        }

        if (event.target && event.target.id === 'idlabelAgregarPagoprestamo'){
            const index = event.target.getAttribute('data-index');
            const button = document.querySelector(`[data-Prestamo][data-index="${index}"]`);

            if (button) {
                const dataprestamo = JSON.parse(button.getAttribute('data-Prestamo'));

                DatosPrestmosObtenidos = {
                    idprestamo: dataprestamo["IdPrestamo"],
                    montocuota: dataprestamo["MontoCuota"],
                    montodevolucion : "S/. " + dataprestamo["MontoDevolucion"],
                    montorestante : dataprestamo["MontoRestante"],
                    montopagados : dataprestamo["SumaTotalPagos"],
                    cuotapagadas : dataprestamo["CuotasPagadas"],
                    cuotatotal : dataprestamo["Cuotas"]
                };

                abrirNuevoPagoModalPrestamoDetalle(DatosPrestmosObtenidos);
                // // Ahora puedes llamar a la función `detalleprestamo` con los datos del prestamo
                // abrirNuevoPagoModalPrestamoDetalle({
                //     montocuota: dataprestamo["MontoCuota"],
                //     montodevolucion : "S/. " + dataprestamo["MontoDevolucion"],
                //     montorestante : dataprestamo["MontoRestante"],
                //     montopagados : dataprestamo["SumaTotalPagos"],
                // });
            } else {
                console.log('No se encontró el botón con data-index ' + index);
            }
        }

        if(event.target && event.target.id === 'idlabeleditarprestamo'){
            limpiarParametrosPrestamosMantenimiento();
            document.getElementById('tablaPrestamos').style.display = "none";
            document.getElementById('ventana-content-NuevoPrestamo').style.display = "block";

            document.getElementById('cardprestamomant').scrollTop = 0;
            document.getElementById('cardprestamoresultadomant').scrollTop = 0;
            document.getElementById('cardprestamomant').style.display = "block";
            document.getElementById('cardprestamoresultadomant').style.display = "block";
            document.getElementById('btnagregarpagoprestamodetalleMant').style.display = "none";
            document.getElementById('ventanaTitlePrestamoMant').innerHTML = "Editar Prestamo";

            document.getElementById('ventanaPrestamoFooter').style.display = "none";
            document.getElementById('cardprestamodetalle1').style.display = "none";
            document.getElementById('cardprestamodetalle2').style.display = "none";


            const index = event.target.getAttribute('data-index');
            const button = document.querySelector(`[data-Prestamo][data-index="${index}"]`);

            if (button) {
                const dataprestamo = JSON.parse(button.getAttribute('data-Prestamo'));

                document.getElementById("inputMontoPrestamo").value = dataprestamo["MontoPrestado"];
                document.getElementById("inputIDPrestamo").value = dataprestamo["IdPrestamo"];
                document.getElementById("inputPrestamoSeleccionarCliente").value = dataprestamo["Cliente"];
                document.getElementById("inputPrestamoSeleccionarClienteIDCliente").value = dataprestamo["IdCliente"];

                document.getElementById("labelValorMontoTotalRecibirPrestamo").innerHTML = "S/. " + dataprestamo["MontoDevolucion"];
                document.getElementById("labelvalornumeroCuotaPrestamo").innerHTML = dataprestamo["Cuotas"];
                document.getElementById("labelValorMontoCuotaPrestamo").innerHTML = dataprestamo["MontoCuota"];
                document.getElementById("labelValorMontoInteresPrestamo").innerHTML = dataprestamo["MontoInteres"];
                document.getElementById("labelValorFechaVencimientoPrestamo").innerHTML = dataprestamo["FechaPlazo"];
                document.getElementById("labelValorFechacobroPrestamo").innerHTML = dataprestamo["FechaPago"];
            } else {
                console.log('No se encontró el botón con data-index ' + index);
            }
        }

        if(event.target && event.target.id === 'btnbuscarPrestamoInicio'){
            buscarprestamoInicio();
        }

        if(event.target && event.target.id === 'btnreloadPrestamoInicio'){
            document.getElementById("txtbuscarprestamo").value = "";
            if (window.Livewire) {
                Livewire.dispatch('listarPrestamoInicioRecibeDesdeJS');
            }
        }

        if(event.target && event.target.id === 'idbutoncuotadecremento'){
            let cuota =  parseInt(document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value)
            if(cuota == 2){
                return
            }

            if(cuota !== DatosPrestmosObtenidos["CuotaTotal"]){
                cuota -= 1;
            }
            document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value = cuota;
            calcularpago();
        }

        if(event.target && event.target.id === 'idbutoncuotaincremento'){
            let cuota =  parseInt(document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value)
            let cuotactual = parseInt(DatosPrestmosObtenidos["cuotatotal"]) - parseInt(DatosPrestmosObtenidos["cuotapagadas"]);


            if(cuota !== cuotactual){
                cuota += 1;
            }
            document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value = cuota;
            calcularpago();
        }
    });

    document.querySelector('.div_contenedor').addEventListener('change', function (event) {
        if (event.target && event.target.id === 'selectinteresprestamo' || event.target && event.target.id === 'selectFormaPagoprestamo' || event.target && event.target.id === 'selectIdTipoCobroprestamo') {
            CalcularPrestamo();
        }
    });

    document.querySelector('.div_contenedor').addEventListener('input', function (event) {
        if (event.target && event.target.id === 'inputMontoPrestamo') {
            // Expresión regular para validar números enteros o decimales con 1 punto máximo
            const regex = /^\d+(\.\d{0,2})?$/;

            // Si el valor no coincide con la expresión regular, lo limpiamos
            if (!regex.test(event.target.value)) {
                event.target.value = event.target.value.slice(0, -1);
            }

            // Validar si el valor es válido y realizar cálculos
            if (validarprestamonulos(document.getElementById("inputMontoPrestamo").value)) {
                CalcularPrestamo();
            }
        }


        if (event.target && event.target.id === 'idMontoPagoModalPrestamodetalle') {
            const montopagoActual = parseFloat(document.getElementById("idMontoPagoModalPrestamodetalle").value.replace(/[^0-9.-]+/g, "")) || 0;

            // Limpiamos el timeout anterior si el usuario sigue escribiendo
            clearTimeout(timeout);
            document.getElementById("idMontoPagoModalPrestamodetalle").style.backgroundColor = "white";
            // Establecemos un nuevo timeout para esperar 1 segundo después de que el usuario termine de escribir
            timeout = setTimeout(function() {
                // let montorestanteActual = parseFloat(document.getElementById("labelValorMontoRestantePrestamoDetalle").innerHTML.replace(/[^0-9.-]+/g, "")) || 0;
                let montorestanteActual = parseFloat(DatosPrestmosObtenidos["montorestante"]);
                let restactual = 0.00;
                if (montopagoActual === 0 || montopagoActual === '') {
                    restactual = montorestanteActual;
                } else {
                    restactual = montorestanteActual - montopagoActual;
                }

                // Asegurarse de que el valor nunca sea negativo
                restactual = restactual < 0 ? 0 : restactual;

                // Actualizar el monto restante en el DOM
                document.getElementById("lblmontorestanteNuevoPagoModal").innerHTML = restactual.toFixed(2).toString();

            }, 10);

            if(validarPagoNulosPrestamoDetalle(parseFloat(document.getElementById("idMontoPagoModalPrestamodetalle").value))){

            }
        }

        if (event.target && event.target.id === 'idinputNumCuotasPersonalizadasPrestamoDetalle'){
            if(document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value === ''){
                document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value = 2;
            }
            // const montocuota = parseFloat(document.getElementById("MontoCuotaLabelModalNuevoPagoPrestamodetalle").innerHTML);
            // const numcuotas = parseInt(document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value);
            // // if(validarPagoNulosPrestamoDetalle(parseFloat(document.getElementById("idMontoPagoModalPrestamodetalle").value))){
            // //
            // // }
        }

        if(event.target && event.target.id === 'txtbuscarprestamo'){
            buscarprestamoInicio();
        }

        if(event.target && event.target.id === 'checkedPagoCompletoPrestamodetalle'){
            const togle = document.getElementById("checkedPagoCompletoPrestamodetalle");
            if(togle.checked){
                document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value = 2;
                calcularpago();
            }else{
                document.getElementById("idMontoPagoModalPrestamodetalle").value = parseFloat(DatosPrestmosObtenidos["montocuota"]).toFixed(2);
            }
        }
    });

    function calcularpago(){
        let cuota =  parseInt(document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value)
        const montoCuota = parseFloat(DatosPrestmosObtenidos["montocuota"]);
        const montoPagoActual = montoCuota * cuota;
        document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value = cuota;
        document.getElementById("idMontoPagoModalPrestamodetalle").value = montoPagoActual.toFixed(2);
    }
    function buscarprestamoInicio(){
        if (window.Livewire) {
            Livewire.dispatch('buscarprestamoRecibeDesdeJS', [{
                buscar: document.getElementById("txtbuscarprestamo").value
            }]);
        }
    }

    function abrirNuevoPagoModalPrestamoDetalle(dataprestamo){
        const modal = document.getElementById("modalNuevoPagoPrestmoDetalleSombra");
        document.getElementById("idDivErrorNuevoPagoPrestamoDetalle").style.display = "none";
        document.getElementById("idtogglePagoCompletoPrestamoDetalle").style.display = "flex";
        document.getElementById("idMontoPagoModalPrestamodetalle").style.backgroundColor = "white";
        document.getElementById("idMontoPagoModalPrestamodetalle").value = dataprestamo["montocuota"];
        document.getElementById("checkedPagoCompletoPrestamodetalle").checked = false;
        document.getElementById("IDinputIngresarCuotasNuevoPagoPrestamoDetalle").style.display = "none";
        document.getElementById("inputMontoPrestamo").style.backgroundColor = "#ffffff";

        const cuotactualverifica = parseInt(dataprestamo["cuotatotal"]) - parseInt(dataprestamo["cuotapagadas"]);
        if(dataprestamo["cuotapagadas"] === '0' || cuotactualverifica === 1){
            document.getElementById("idtogglePagoCompletoPrestamoDetalle").style.display = "none";
        }

        document.getElementById("MontoCuotaLabelModalNuevoPagoPrestamodetalle").innerHTML = dataprestamo["montocuota"];
        document.getElementById("MontodevolucionLabelModalNuevoPagoPrestamodetalle").innerHTML = dataprestamo["montodevolucion"];
        document.getElementById("lblmontorestanteNuevoPagoModal").innerHTML = dataprestamo["montorestante"];
        document.getElementById("lblmontopagadosNuevoPagoModal").innerHTML = dataprestamo["montopagados"];
        // document.getElementById("MontoCuotaLabelModalNuevoPagoPrestamodetalle").innerHTML = document.getElementById("labelValorMontoCuotaPrestamoDetalle").innerHTML
        // document.getElementById("MontodevolucionLabelModalNuevoPagoPrestamodetalle").innerHTML = "S/. " + document.getElementById("labelValorMontoTotalRecibirPrestamoDetalle").innerHTML
        // document.getElementById("lblmontorestanteNuevoPagoModal").innerHTML = document.getElementById("labelValorMontoRestantePrestamoDetalle").innerHTML;
        modal.style.display = "flex";

        // window.addEventListener('click', function (event) {
        //     if (event.target === modal) {
        //         modal.style.display = "none";
        //     }
        // });
    }

    function validarPagoNulosPrestamoDetalle(montopago) {
        let exito = true;
        let mensaje = "El Parametro es Requerido";

        // Obtener los valores a validar
        const togle = document.getElementById("checkedPagoCompletoPrestamodetalle");
        const montorestante = parseFloat(DatosPrestmosObtenidos["montorestante"]);
        const numcuotas = parseInt(document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value);
        const montocuotas = parseFloat(DatosPrestmosObtenidos["montocuota"]);

        // Validar que el montoPago no esté vacío ni sea 0
        if (isNaN(montopago) || montopago <= 0) {
            exito = false;
            mensaje = "El Parametro es Requerido";
        }
        // Validar el formato correcto del montoPago (es un número)
        else if (!validarDoublePrestamo(montopago)) {
            exito = false;
            mensaje = "Formato no Permitido";
        }
        // Si el checkbox "Pago Completo" está marcado
        else if (togle.checked) {
            // Validar que las cuotas sean válidas
            let cuotascalculo = montopago / montocuotas;
            if (numcuotas === "0" || numcuotas === "" || parseInt(numcuotas) <= 0) {
                exito = false;
                mensaje = "La Cuota es Requerida";
            } else if(numcuotas !== cuotascalculo){
                exito = false;
                mensaje = "Pago Insuficiente para las Cuotas Ingresadas.";
            } else if (montopago > montorestante) {
                exito = false;
                mensaje = "El Pago es demasiado para las Cuotas Ingresadas.";
            }
        }
        // Si no es un "Pago Completo", validar que el montoPago sea igual a las cuotas
        else if (montopago > montocuotas) {
            exito = false;
            mensaje = "El Monto Pago supera a la Cuota";
        } else if (montopago < montocuotas){
            exito = false;
            mensaje = "El pago es muy poco para la Cuota";
        }

        // Mostrar error si la validación no es exitosa
        if (!exito) {
            document.getElementById("idDivErrorNuevoPagoPrestamoDetalle").style.display = "flex";
            document.getElementById("idMontoPagoModalPrestamodetalle").style.backgroundColor = "#ffbea9";
            document.getElementById("idparrafoerrorNuevoPagoPrestamoDetalle").innerHTML = mensaje;
        } else {
            // Ocultar el mensaje de error si es válido
            document.getElementById("idDivErrorNuevoPagoPrestamoDetalle").style.display = "none";
            document.getElementById("idMontoPagoModalPrestamodetalle").style.backgroundColor = "white";
        }

        return exito;
    }

    async function ParametrosPagosPrestamodetalleJavaScript(togle){
        try {
            // Mostrar el modal de carga mientras se procesa
            Swal.fire({
                title: 'Procesando...',
                text: 'Estamos registrando el Pago, por favor espera.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();  // Muestra el spinner de carga
                }
            });

            const fecha = new Date();
            const fechaLocalPago = fecha.getFullYear() + "-" +
                ("0" + (fecha.getMonth() + 1)).slice(-2) + "-" +
                ("0" + fecha.getDate()).slice(-2) + " " +
                ("0" + fecha.getHours()).slice(-2) + ":" +
                ("0" + fecha.getMinutes()).slice(-2) + ":" +
                ("0" + fecha.getSeconds()).slice(-2);

            let result;
            if(togle){
                const cuotas = document.getElementById("idinputNumCuotasPersonalizadasPrestamoDetalle").value;
                for (let i = 0; i < cuotas; i++){
                    result = await enviarParametrosPagosPrestamodetalleLivewire({
                        idpago: "",
                        idprestamo: DatosPrestmosObtenidos["idprestamo"],
                        montopago: document.getElementById("MontoCuotaLabelModalNuevoPagoPrestamodetalle").innerHTML,
                        montorestante: document.getElementById("lblmontorestanteNuevoPagoModal").innerHTML,
                        fecharegistro: fechaLocalPago,
                        observacionprestamo: "AUN NO ASIGNADO",
                    });
                }
            }else{
                const datospagosparametros = {
                    idpago: "",
                    idprestamo: DatosPrestmosObtenidos["idprestamo"],
                    montopago: document.getElementById("idMontoPagoModalPrestamodetalle").value,
                    montorestante: document.getElementById("lblmontorestanteNuevoPagoModal").innerHTML,
                    fecharegistro: fechaLocalPago,
                    observacionprestamo: "AUN NO ASIGNADO",
                };
                result = await enviarParametrosPagosPrestamodetalleLivewire(datospagosparametros);
            }

            if (result) {
                result = await mostrarpagosprestamoDetallePrestamo({
                    "IdPrestamo": DatosPrestmosObtenidos["idprestamo"],
                    // "IdPrestamo": document.getElementById("labelValorIdPrestamoDetalle").innerHTML.toString()
                });

                result = await ListarPrestamosInicio();
                if(result){
                    Swal.close();
                    cerrarmodalNuevoPagoPrestamoDetalle();
                    Swal.fire({
                        title: '¡Pago Registrado!',
                        text: 'El Pago ha sido registrado correctamente.',
                        icon: 'success',
                        timer: 2000
                    }).then((result) => {
                        // if (result.isConfirmed) {
                        //     cerrarmodalNuevoPagoPrestamoDetalle();
                        // }else if (result.isDismissed) {
                        //     cerrarmodalNuevoPagoPrestamoDetalle();
                        // }
                    });
                }

                // document.getElementById("idcirlculeprogresindicator").style.display = "none";
                // document.getElementById("idtablaprestamoMostrarpagos").style.display = "flex";
            }
        } catch (error) {
            Swal.close();
            console.log("Error en el proceso:", error);
        }
    }

    function enviarParametrosPagosPrestamodetalleLivewire(datapagos){
        return new Promise((resolve, reject) => {
            if (window.Livewire) {
                Livewire.dispatch('mantenimientopagos', [datapagos]);

                // Escuchar cuando el proceso ha terminado
                Livewire.on('terminadomantenimientopagos', () => {
                    console.log("Proceso terminado");
                    resolve(true); // Resolvemos la promesa cuando el proceso termina
                });
            } else {
                reject('Livewire no está disponible');
            }
        });
    }

    function ListarPrestamosInicio(){
        return new Promise((resolve, reject) => {
            if (window.Livewire) {
                Livewire.dispatch('listarPrestamoInicioRecibeDesdeJS');
                resolve(true);
                // // Escuchar cuando el proceso ha terminado
                // Livewire.on('terminadomantenimientopagos', () => {
                //     console.log("Proceso terminado");
                //     resolve(true); // Resolvemos la promesa cuando el proceso termina
                // });
            } else {
                reject('Livewire no está disponible');
            }
        });
    }

    async function detalleprestamo(dataprestamo) {
        document.getElementById("idcirlculeprogresindicator").style.display = "flex";
        document.getElementById("idtablaprestamoMostrarpagos").style.display = "none";
        document.getElementById('btnagregarpagoprestamodetalleMant').style.display = "none";
        if(dataprestamo["Estado"] !== 'Completado'){
            document.getElementById('btnagregarpagoprestamodetalleMant').style.display = "block";
        }

        document.getElementById("labelValorIdPrestamoDetalle").innerHTML = dataprestamo["IdPrestamo"];
        document.getElementById("labelValorestadoPrestamodetalle").innerHTML = dataprestamo["Estado"];
        document.getElementById("labelValorFechacobroPrestamoDetalle").innerHTML = dataprestamo["FechaRegistro"];
        document.getElementById("labelValorHoraPrestamoDetalle").innerHTML = dataprestamo["HoraRegistro"];
        document.getElementById("labelValorCuotaTotalPrestamoDetalle").innerHTML = dataprestamo["Cuotas"];
        document.getElementById("labelValorMontoCuotaPrestamoDetalle").innerHTML = dataprestamo["MontoCuota"];
        document.getElementById("labelValorTipoPagoPrestamodetalle").innerHTML = dataprestamo["NombreTipoPago"];
        document.getElementById("labelValorFechacobroPrestamodetalle").innerHTML = dataprestamo["FechaPago"];
        document.getElementById("labelvalorInteresPrestamoDetalle").innerHTML = dataprestamo["PorcentajeInteres"] + '%';
        document.getElementById("labelValorMontoINteresPrestamoDetalle").innerHTML = dataprestamo["MontoInteres"];
        document.getElementById("labelValorMontoTotalRecibirPrestamoDetalle").innerHTML = dataprestamo["MontoDevolucion"];
        document.getElementById("labelValorFechaVencimientoPrestamoVISTADetalle").innerHTML = dataprestamo["FechaPlazo"];
        document.getElementById("labelValorObservacionPrestamoVISTADetalle").innerHTML = dataprestamo["ObservacionPrestamo"];
        document.getElementById("labelValorMontoPrestadoPrestamoDetalle").innerHTML = dataprestamo["MontoPrestado"];

        //Esta parte toma el Pago
        try {
            const result = await mostrarpagosprestamoDetallePrestamo(dataprestamo);

            // Si result es true, significa que el proceso terminó correctamente
            if (result) {
                document.getElementById("idcirlculeprogresindicator").style.display = "none";
                document.getElementById("idtablaprestamoMostrarpagos").style.display = "flex";
            }
        } catch (error) {
            console.error("Error en el proceso:", error);
        }
    }

    function mostrarpagosprestamoDetallePrestamo(dataprestamo) {
        return new Promise((resolve, reject) => {
            if (window.Livewire) {
                Livewire.dispatch('listarpagosprestamoDesdeJS', [dataprestamo]);
                Livewire.on('respuestalistarpagosprestamoDesdeJS', (data) => {
                    document.getElementById("labelvalornumeroCuotapagadasPrestamoDetalle").innerHTML = data[0]["CuotaPagadas"];
                    document.getElementById("labelValorMontoPagadasPrestamoDetalle").innerHTML = data[0]["MontoPagadas"];
                    document.getElementById("lblmontopagadosNuevoPagoModal").innerHTML = data[0]["MontoPagadas"];
                    // document.getElementById("lblmontorestanteNuevoPagoModal").innerHTML = data[0]["MontoRestante"];
                    document.getElementById("labelValorMontoRestantePrestamoDetalle").innerHTML = data[0]["MontoRestante"];
                    resolve(true); // Resolvemos la promesa cuando el proceso termina

                });
            } else {
                // Si Livewire no está disponible, rechazamos la promesa
                reject('Livewire no está disponible');
            }
        });
    }

    function enviarvaloresPrestamosComponeteInsertar(){
        if(validarprestamonulos(document.getElementById("inputMontoPrestamo").value)){
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Antes de registrar verifica muy bien los datos del prestamo?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, Registrar',
                cancelButtonText: 'No, Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Mostrar el modal de carga mientras se procesa
                    Swal.fire({
                        title: 'Procesando...',
                        text: 'Estamos registrando el préstamo, por favor espera.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();  // Muestra el spinner de carga
                        }
                    });
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
                        fechapago: document.getElementById('labelValorFechacobroPrestamo').innerHTML,
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
                        Livewire.on('prestamoInsertadoExitosamente', () => {
                            Swal.close();
                            Swal.fire({
                                title: '¡Éxito!',
                                text: 'El préstamo ha sido registrado correctamente.',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    cerrarVentanaMantenimientoPrestamo();
                                }else if (result.isDismissed) {
                                    cerrarVentanaMantenimientoPrestamo();
                                }
                            });

                        });
                    } else {
                        console.error('Livewire no está disponible');
                    }
                } else {
                    // Acción si elige "No"
                    console.log('Acción cancelada');
                }
            });
        }
    }

    function limpiarParametrosPrestamosMantenimiento(){
        document.getElementById('cardprestamomant').scrollTop  = 0;
        document.getElementById('cardprestamoresultadomant').scrollTop  = 0;
        document.getElementById('cardprestamodetalle1').scrollTop  = 0;
        document.getElementById('cardprestamodetalle2').scrollTop = 0;

        document.getElementById("labelerrorprestamoinputMontoPrestamo").style.display = "none";
        document.getElementById("inputMontoPrestamo").style.backgroundColor = "#ffffff";

        document.getElementById("inputMontoPrestamo").value = "";
        document.getElementById("txtbuscarprestamo").value = "";
        document.getElementById("inputIDPrestamo").value = "";
        document.getElementById("txtinputObservacionPrestamo").value = "";
        document.getElementById("inputPrestamoSeleccionarCliente").value = "";
        document.getElementById("inputPrestamoSeleccionarClienteIDCliente").value = "";
        document.getElementById("labelValorMontoTotalRecibirPrestamo").innerHTML = "S/. 0.00";
        document.getElementById("labelvalornumeroCuotaPrestamo").innerHTML = "No definido";
        document.getElementById("labelValorMontoCuotaPrestamo").innerHTML = "S/. 0,00";
        document.getElementById("labelValorMontoInteresPrestamo").innerHTML = "S/. 0,00";
        document.getElementById("labelValorFechaVencimientoPrestamo").innerHTML = "No definido";
        document.getElementById("labelValorFechacobroPrestamo").innerHTML = "No definido";
    }

    function cerrarmodalNuevoPagoPrestamoDetalle(){
        document.getElementById("idMontoPagoModalPrestamodetalle").value = "";
        document.getElementById("modalNuevoPagoPrestmoDetalleSombra").style.display = "none";
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

            document.getElementById("labelValorMontoTotalRecibirPrestamo").innerHTML = montoTotal.toFixed(2).toString();
            document.getElementById("labelvalornumeroCuotaPrestamo").innerHTML = selectTipoCobro.toString();
            document.getElementById("labelValorMontoCuotaPrestamo").innerHTML = MontoCuota.toString();
            document.getElementById("labelValorMontoInteresPrestamo").innerHTML = MontoInteres.toString();
            document.getElementById("labelValorFechaVencimientoPrestamoVISTA").innerHTML = fechavencimiento.diaSemana + ", " + fechavencimiento.fecha;
            document.getElementById("labelValorFechaVencimientoPrestamo").innerHTML = fechavencimiento.fechaDateTime.toString();
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

        if (tipo === '1') { // Si es diaria
            fecha.setDate(fecha.getDate() + cantidad);
        } else if (tipo === '2') { // Si es semanal
            fecha.setDate(fecha.getDate() + (cantidad * 7));
        } else if (tipo === '3') { // Si es quincenal
            fecha.setDate(fecha.getDate() + cantidad);
        }

        // Obtener el nombre del día de la semana
        const diasDeLaSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        let diaSemana = diasDeLaSemana[fecha.getDay()];

        // Formatear la fecha en formato 'YYYY-MM-DD HH:mm:ss' (formato compatible con la base de datos)
        let anio = fecha.getFullYear();
        let mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
        let dia = fecha.getDate().toString().padStart(2, '0');
        let hora = fecha.getHours().toString().padStart(2, '0');
        let minuto = fecha.getMinutes().toString().padStart(2, '0');
        let segundo = fecha.getSeconds().toString().padStart(2, '0');

        let fechaFormateada = `${anio}-${mes}-${dia} ${hora}:${minuto}:${segundo}`;

        // Devolver tanto el formato legible para el usuario como el formato para la base de datos
        return {
            fecha: fecha.toLocaleDateString(), // Fecha en formato legible para el usuario
            diaSemana: diaSemana, // Día de la semana
            fechaDateTime: fechaFormateada // Fecha en formato compatible con la base de datos
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

    function validarprestamonulos(valor){
        let validar = true;
        if(valor === ""){
            document.getElementById("labelerrorprestamoinputMontoPrestamo").innerHTML = "Parametro Requerido.";
            validar = false;
        }else if(!validarDoublePrestamo(valor)){
            document.getElementById("labelerrorprestamoinputMontoPrestamo").innerHTML = "Formato no Admitido.";
            validar = false;
        } else if(document.getElementById("inputPrestamoSeleccionarCliente").value === ''){
            validar = false;
            document.getElementById("inputPrestamoSeleccionarCliente").style.backgroundColor = "#ffc0af";
        }



        if(validar){
            document.getElementById("labelerrorprestamoinputMontoPrestamo").style.display = "none";
            document.getElementById("inputMontoPrestamo").style.backgroundColor = "#ffffff";
        }else{
            // document.getElementById("inputMontoPrestamo").style.borderColor = "#c90003";
            document.getElementById("inputMontoPrestamo").style.backgroundColor = "#ffc0af";
            document.getElementById("labelerrorprestamoinputMontoPrestamo").style.display = "block";
        }
        return validar;
    }

    function validarDoublePrestamo(valor) {
        // Expresión regular mejorada para solo permitir números con decimales
        let regex = /^[+-]?(\d+(\.\d{1,2})?)$/;

        // Devuelve true solo si la cadena es un número válido con máximo 2 decimales
        return regex.test(valor);
    }

    function cerrarVentanaMantenimientoPrestamo(){
        const ventanaNuevoPrestamo = document.getElementById('ventana-content-NuevoPrestamo');
        const tablaPrestamos = document.getElementById('tablaPrestamos');
        tablaPrestamos.style.display = "block";
        ventanaNuevoPrestamo.style.display = "none";
        limpiarParametrosPrestamosMantenimiento();
    }

    function reciclarprestamoinicio(prestamoData){
        window.preguntarSI_NO("¿Estás seguro?", "¡podras revertir o eliminarlo permanentemente, en el menu de reciclaje!", 'Sí, Reciclar', 'No, Cancelar').then((result) => {
            if (result) {
                window.SweetProgressOpen1("Reciclando...", "Porfavor espere...");
                Livewire.dispatch('reciclarprestamoRecibeDesdeJS', [{
                    idprestamo: prestamoData["IdPrestamo"]
                }]);

                // Escuchar cuando el proceso ha terminado
                Livewire.on('TerminadoreciclarprestamoJS', (data) => {
                    window.SweetProgressClose1();
                    window.SweetAlertPrincipal2("success", "Reciclado", data[0]["message"]);
                });
            } else {
            }
        });
    }

    function handleButtonClick(event) {
        const prestamoData = JSON.parse(event.target.getAttribute('data-Prestamo'));
        event.stopPropagation(); // Evitar que el evento se propague y cierre el menú

        const buttonRect = event.target.getBoundingClientRect();
        const posX = buttonRect.left;
        const posY = buttonRect.bottom;

        const index = event.target.getAttribute('data-index'); // Obtener el índice del botón


        // Primero, aseguramos que el menú se cierre antes de mostrarlo en una nueva ubicación
        const contextMenu = document.getElementById('idmenuopcionesprestamo');
        contextMenu.style.display = 'none'; // Cerrar el menú antes de abrirlo en una nueva ubicación

        // Mostrar el menú en la posición del botón
        MonstrarMenuOpcionesPrestamo(posX, posY, buttonRect, prestamoData);

        // Establecer el data-index en el menú (esto puede ser útil si necesitas utilizarlo en el menú)
        const labels = contextMenu.querySelectorAll('label');
        labels.forEach(label => {
            label.setAttribute('data-index', index); // Asegúrate de que cada label tenga el índice correcto
        });
    }

    function MonstrarMenuOpcionesPrestamo(x, y, buttonRect, prestamoData) {
        const contextMenu = document.getElementById('idmenuopcionesprestamo');
        document.getElementById("idlabelAgregarPagoprestamo").style.display = "flex";
        document.getElementById("idlabeleditarprestamo").style.display = "flex";
        const menuWidth = contextMenu.offsetWidth;
        contextMenu.style.display = 'block';

        if(prestamoData["Estado"] === "Completado"){
            document.getElementById("idlabelAgregarPagoprestamo").style.display = "none";
            document.getElementById("idlabeleditarprestamo").style.display = "none";
        }else{
            document.getElementById("idlabelAgregarPagoprestamo").style.display = "flex";
            if(prestamoData["CuotasPagadas"] === "0"){
                document.getElementById("idlabeleditarprestamo").style.display = "flex";
            }
        }

        if(prestamoData["cuotaspagadas"] === '0'){
            document.getElementById("idtogglePagoCompletoPrestamoDetalle").style.display = "none";
        }else if(prestamoData["Estado"] === "Completado"){
            document.getElementById("idlabelAgregarPagoprestamo").style.display = "none";
        }else{
            document.getElementById("idlabeleditarprestamo").style.display = "none";
        }



        const menuHeight = contextMenu.offsetHeight;
        const windowWidth = window.innerWidth;
        const windowHeight = window.innerHeight;

        // Verificar si el menú se desbordará hacia la derecha
        if (x + menuWidth > windowWidth) {
            x -= menuWidth; // Ajusta la posición para no desbordar a la derecha

        }

        // Verificar si el menú se desbordará hacia abajo
        if (y + menuHeight > windowHeight) {
            // Si no hay suficiente espacio hacia abajo, mostramos el menú arriba del botón
            y = buttonRect.top - menuHeight;
        } else {
            // Si hay suficiente espacio hacia abajo, mostramos el menú debajo del botón
            y = buttonRect.bottom + 10;
        }

        // Mostrar el menú en la posición calculada
        contextMenu.style.left = `${x}px`;
        contextMenu.style.top = `${y}px`;

        // Agregar el listener para cerrar el menú cuando se haga clic fuera
        window.addEventListener('click', cerrarMenuOpcionesPrestamo);
    }

    // Cerrar el menú contextual si se hace clic fuera
    function cerrarMenuOpcionesPrestamo(event) {
        const contextMenu = document.getElementById('idmenuopcionesprestamo');
        // const target = event.target;
        contextMenu.style.display = 'none';

        // // Si el clic no es fuera del menú ni del botón de opciones, no cerramos el menú
        // if (!contextMenu.contains(target) && target.id !== 'btnOpcionesPrestamo') {
        //     contextMenu.style.display = 'none'; // Cierra el menú
        // }
    }

});
