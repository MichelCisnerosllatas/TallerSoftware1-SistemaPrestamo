document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.div_contenedor').addEventListener('click', function (event) {
        let idcliente = 0;
        if(event.target && event.target.id === 'btnreloadCliente'){
            if (window.Livewire) {
                Livewire.dispatch('listarClienteJS');
            } else {
                console.error('Livewire no está disponible');
            }
        }

        if (event.target && event.target.id === 'botonNuevoCliente' || event.target && event.target.id === 'botonNuevoCliente1') {
            const modal = document.getElementById('modalnuevocliente');

            const modalTitle = document.getElementById('modalTitle');
            const submitButton = document.getElementById('botonRegistrarCliente');

            // Cambiar el título y el texto del botón
            modalTitle.textContent = 'Nuevo Cliente';
            submitButton.textContent = 'Registrar';
            //submitButton.id = 'botonRegistrarCliente';  // Cambia el ID

            limpiarCamposModalNuevoCliente(modal);
            abrirModalNuevoCliente(modal);
        }

        if (event.target && event.target.id === "btnEditarCliente") {
            const modal = document.getElementById('modalnuevocliente');
            const clienteData = JSON.parse(event.target.getAttribute('data-cliente'));
            // document.getElementById('idcliente').value = clienteData["IdCliente"];

            const index = event.target.getAttribute('data-index');
            const modalTitle = document.getElementById('modalTitle');
            const submitButton = document.getElementById('botonRegistrarCliente');

            modalTitle.textContent = 'Editar Cliente';  // Cambia el título
            submitButton.textContent = 'Guardar Cambios';  // Cambia el texto del botón
            //submitButton.id = 'botonGuardarCambiosCliente';  // Cambia el ID

            limpiarCamposModalNuevoCliente(modal);
            abrirModalEditarCliente(modal, clienteData);
        }

        if (event.target && event.target.id === 'botonCancelarModalNuevoCliente1' || event.target && event.target.id === 'botonCancelarModalNuevoCliente2') {
            event.preventDefault();
            cerrarModalNuevoCliente();

            // Mostrar un SweetAlert después de cerrar el modal
            // Swal.fire({
            //     title: '¿Estás seguro?',
            //     text: '¿Quieres cancelar la acción?',
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonText: 'Sí, cancelar',
            //     cancelButtonText: 'No, volver'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         // Aquí puedes ejecutar algún código adicional si se confirma la acción
            //         console.log('Acción cancelada');
            //     } else {
            //         // Aquí puedes manejar lo que pasa si el usuario no confirma
            //         console.log('Acción no cancelada');
            //         abrirModalNuevoCliente(); // Si quieres abrir el modal nuevamente
            //     }
            // });
        }

        if (event.target && (event.target.id === 'botonRegistrarCliente' || event.target.id === 'botonGuardarCambiosCliente')) {
            event.preventDefault();
            if(validardatosParametrosClientes()){
                // Mostrar el modal de carga mientras se procesa
                let bool = window.validarcorreoglobal(document.getElementById('correo'));
                if(bool){
                    Swal.fire({
                        title: 'Procesando...',
                        text: 'Estamos registrando el préstamo, por favor espera.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();a
                        }
                    });

                    const fecha = new Date();
                    const fechaLocal = fecha.getFullYear() + "-" +
                        ("0" + (fecha.getMonth() + 1)).slice(-2) + "-" +
                        ("0" + fecha.getDate()).slice(-2) + " " +
                        ("0" + fecha.getHours()).slice(-2) + ":" +
                        ("0" + fecha.getMinutes()).slice(-2) + ":" +
                        ("0" + fecha.getSeconds()).slice(-2);

                    // Aquí obtienes el IdCliente del objeto que se pasa en el modal
                    const datosCliente = {
                        idpersona: document.getElementById('idpersonacliente').value,
                        idcliente: document.getElementById('idcliente').value,
                        nombre: document.getElementById('nombre').value,
                        apellido: document.getElementById('apellido').value,
                        correo: document.getElementById('correo').value,
                        celular: document.getElementById('celular').value,
                        iddistrito: document.getElementById('selectIdDistrito').value,
                        direccion: document.getElementById('direccionCliente').value,
                        referencia: document.getElementById('referenciaCliente').value,
                        tipodoc: document.getElementById('tipodoc').value,
                        numdoc: document.getElementById('numdoc').value,
                        fechaRegistro: fechaLocal,

                        //fechaRegistro: new Date().toISOString() // Fecha del navegador
                    };

                    // Verifica si Livewire está disponible antes de emitir el evento
                    if (window.Livewire) {
                        Livewire.dispatch('mantenimientoClienteDesdeJS', [datosCliente]);

                        // Escuchar cuando el proceso ha terminado
                        Livewire.on('clienteInsertadoExitosamente', () => {
                            Swal.close();
                            cerrarModalNuevoCliente();
                        });
                    } else {
                        console.error('Livewire no está disponible');
                    }
                }

                //cerrarModalNuevoCliente();
            }
        }

        if(event.target && event.target.id === 'btnEliminarCliente'){
            const clienteData = JSON.parse(event.target.getAttribute('data-cliente'));
            const index = event.target.getAttribute('data-index');

            Swal.fire({
                title: "¿Estas seguro de reciclar?",
                text: "¡podras revertir o eliminarlo permanentemente, en el menu de reciclaje!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, reciclar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    if (window.Livewire) {
                        Swal.fire({
                            title: 'Procesando...',
                            text: 'Estamos reciclando el cliente, por favor espera.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();  // Muestra el spinner de carga
                            }
                        });
                        Livewire.dispatch('reciclarClienteJS', [clienteData]);

                        // Escuchar cuando el proceso ha terminado
                        Livewire.on('clienteRecicladoExitosamente', () => {
                            Swal.close();
                            Swal.fire({
                                title: "Reciclado!",
                                text: "El Cliente ha sido Reciclado.",
                                icon: "success"
                            });
                            //cerrarModalNuevoCliente();
                        });
                    } else {
                        console.error('Livewire no está disponible');
                    }
                }
            });
            // Swal.fire({
            //     title: '¿Estás seguro?',
            //     text: '¿Quieres cancelar la acción?',
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonText: 'Sí, cancelar',
            //     cancelButtonText: 'No, volver'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         // Aquí puedes ejecutar algún código adicional si se confirma la acción
            //         console.log('Acción cancelada');
            //     } else {
            //         // Aquí puedes manejar lo que pasa si el usuario no confirma
            //         console.log('Acción no cancelada');
            //         //abrirModalNuevoCliente(); // Si quieres abrir el modal nuevamente
            //     }
            // });
        }

        if (event.target && event.target.id === 'btnbuscarCliente') {
            const searchText = document.getElementById('txtbuscarcliente').value;
            buscarCliente(searchText)
        }
    });

    document.querySelector('.div_contenedor').addEventListener('change', function (event) {
        if (event.target && event.target.id === 'selectClienteFilas') {
            const selectClienteFilas = event.target;
            const valorSelect = selectClienteFilas.value;
            if (window.Livewire){
                Livewire.dispatch('selectclientefilas', [valorSelect]);
            }
        }
    });

    document.querySelector(".div_contenedor").addEventListener('input', function (event) {
        if (event.target.id === 'celular') {

            let inputcelular = document.getElementById("celular"); //Obtenemos el Html del Input
            let numerocadena = inputcelular.value.length; //Obtenemos el numero de caracteres del Input

            //si es mayor a 9 no me deja escribir mas
            if(numerocadena > 9){
                inputcelular.value = inputcelular.value.slice(0.,9);
                numerocadena = inputcelular.value.length;
            }

            //si es menor de 9 caracteres me pit el fondo de rojo
            if(numerocadena !== 9){
                inputcelular.style.background = "#ffbfaa";
            }
            else{
                inputcelular.style.background = "#ffffff";
            }
        }
    });


    function buscarCliente(buscar) {
        if (window.Livewire) {
            if (buscar.trim() === '') {
                Livewire.dispatch('listarClienteJS');
            } else {
                Livewire.dispatch('buscarClienteJS', [buscar]);
            }
        } else {
            console.log('Livewire no está disponible');
        }
    }

    function limpiarCamposModalNuevoCliente(modal) {
        const inputs = modal.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.value = '';
            input.classList.remove('input-error');
            input.classList.remove('error-message');
        });
    }

    function abrirModalNuevoCliente(modal) {
        modal.style.display = "block"; // Mostrar el modal

        // Si el usuario hace clic fuera del modal, se cierra
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                cerrarModalNuevoCliente();
            }
        });
    }

    // Función para abrir el modal para editar un cliente
    function abrirModalEditarCliente(modal, clienteData) {
        document.getElementById('idpersonacliente').value = clienteData["IdPersona"];
        document.getElementById('idcliente').value = clienteData["IdCliente"];
        document.getElementById('nombre').value = clienteData["Nombre"];
        document.getElementById('apellido').value = clienteData["Apellido"];
        document.getElementById('correo').value = clienteData["Correo"];
        document.getElementById('celular').value = clienteData["Celular"];
        document.getElementById('direccionCliente').value = clienteData["Direccion"] == null ? "" : clienteData["Direccion"];
        document.getElementById('referenciaCliente').value = clienteData["Referencia"] == null ? "" : clienteData["Referencia"];
        document.getElementById('tipodoc').value = clienteData["TipoDoc"];
        document.getElementById('numdoc').value = clienteData["NumDoc"];

        modal.style.display = "block";
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                cerrarModalNuevoCliente();
            }
        });
    }

    function cerrarModalNuevoCliente() {
        const modal = document.getElementById('modalnuevocliente');
        if (modal) {
            modal.style.display = "none"; // Ocultar el modal
        }
    }

    function validardatosParametrosClientes() {
        const modal = document.getElementById('modalnuevocliente');
        const inputs = modal.querySelectorAll('input[required], select[required]');
        let esValido = true;

        inputs.forEach(input => {
            if (input.value.trim() === '') {
                input.classList.add('input-error');
                input.classList.add('error-message');

                esValido = false;
            } else {
                input.classList.remove('input-error');
                input.classList.remove('error-message');
            }
        });

        return esValido;
    }

    // function validarCorreoCliente(){
    //     let vlidr = false;
    //     const correoField = document.getElementById('correo');
    //     const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //     if (!correoRegex.test(correoField.value.trim())) {
    //         correoField.classList.add('input-error'); // Resaltar en rojo
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Correo inválido',
    //             text: 'Por favor, ingresa un correo electrónico válido.',
    //         });
    //     } else {
    //         vlidr = true;
    //         correoField.classList.remove('input-error');
    //     }
    //     return vlidr;
    // }

    Livewire.on('mostrarSweetAlertClienteRegistrado', function () {
        Swal.fire({
            title: 'Registro Exitoso',
            text: 'El cliente ha sido registrado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    });

    Livewire.on('mostrarSweetAlertClienteExiste', function () {
        Swal.fire({
            icon: "error",
            title: "El Cliente ya Existe",
            text: "Los datos ingresados, coinciden con un Cliente registrado, porfavor verifique",
            // footer: '<a href="#">Why do I have this issue?</a>'
        });
    });
});
