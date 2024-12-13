document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('.div_contenedor').addEventListener('click', function (event) {

        let IdUsuarioSec = 0;


        if(event.target && event.target.id === 'btnreloadUsuarioSec'){
            if (window.Livewire) {
                Livewire.emit('listarUsuarioSecJS');
            } else {
                console.error('Livewire no está disponible');
            }
        }

        //solo muestra la ventana del Nuevo Usuario.
        if (event.target && event.target.id === 'botonNuevoUsuarioSec' || event.target && event.target.id === 'botonNuevoUsuarioSec2') {
            const ventanaNuevoUsuarioSec = document.getElementById('ventana-content-NuevoUsuarioSec');
            const tablaUsuarioSec = document.getElementById('tablaUsuarioSec');
            // limpiarParametrosPrestamosMantenimiento();
            tablaUsuarioSec.style.display = "none";
            ventanaNuevoUsuarioSec.style.display = "block";
        }

        //solo cierra la ventana del Nuevo Prestaamo.
        if (event.target && event.target.id === 'botonCancelarventanaNuevoUsuarioSec2' || event.target && event.target.id === 'botonCancelarventanaNuevoUsuarioSec1') {
            const ventanaNuevoUsuarioSec = document.getElementById('ventana-content-NuevoUsuarioSec');
            const tablaUsuarioSec = document.getElementById('tablaUsuarioSec');
            tablaUsuarioSec.style.display = "block";
            ventanaNuevoUsuarioSec.style.display = "none";
        }

        if (event.target && event.target.id === "btnEditarUsuarioSec") {
            const modalUsuarioSec = document.getElementById('ventana-content-NuevoUsuarioSec');
            const usuarioSecData = JSON.parse(event.target.getAttribute('datosUsuarios'));

            const index = event.target.getAttribute('datosUsuariosIndex');
            const modalTitleUserSec = document.getElementById('ventanaTitleUsuarioSec');
            const submitButton = document.getElementById('btnCrearNuevoUsuarioSec');

            modalTitleUserSec.textContent = 'Editar Usuario';  // Cambia el título
            submitButton.textContent = 'Guardar Cambios';  // Cambia el texto del botón
            //submitButton.id = 'botonGuardarCambiosCliente';  // Cambia el ID

            limpiarCamposModalNuevoUsuarioSec(modalUsuarioSec);
            abrirModalEditarUsuarioSec(modalUsuarioSec, usuarioSecData);
            EliminarUsuarioSec(event);
            // limpiarCamposModalNuevoCliente(modal);
            // abrirModalEditarCliente(modal, clienteData);
        }

        if(event.target && event.target.id === 'btnEliminarUsuarioSec'){
            const usuarioSecData = JSON.parse(event.target.getAttribute('datosUsuarios'));
            const index = event.target.getAttribute('datosUsuariosIndex');

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
                        // Mostrar el modal de carga mientras se procesa
                        Swal.fire({
                            title: 'Procesando...',
                            text: 'Estamos Reciclando el Usuario, por favor espera.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        Livewire.dispatch('reciclarUsuarioSecJS', [usuarioSecData]);

                        // Escuchar cuando el proceso ha terminado
                        Livewire.on('usuarioSecRecicladoExitosamente', () => {
                            Swal.close()
                            Swal.fire({
                                title: "Reciclado!",
                                text: "El Usuario ha sido Reciclado.",
                                icon: "success"
                            });
                            //cerrarModalNuevoCliente();
                        });
                    } else {
                        console.error('Livewire no está disponible');
                    }
                }
            });

        }

        if(event.target && event.target.id === 'btnbuscarUsuarioSec'){
            const searchTextUsuarioSec = document.getElementById('txtbuscarUsuarioSec').value;
            buscarUsuarioSec(searchTextUsuarioSec);
        }

        if(event.target && event.target.id === 'btnCrearNuevoUsuarioSec') {
            EnviarParametrosLivewireUsuarioSec();
        }

        if(event.target && event.target.id === 'btnEliminarUsuarioSec'){
            EliminarUsuarioSec(event);
        }
    });

    document.querySelector('.div_contenedor').addEventListener('change', function (event) {
        if (event.target && event.target.id === 'selectUsuarioSecFilas') {
            const selectUsuarioSecFilas = event.target;
            const valorSelect = selectClienteFilas.value;
            if (window.Livewire){
                Livewire.dispatch('selectUsuarioSecFilas', [valorSelect]);
            }
        }
    });


    function buscarUsuarioSec(buscar) {
        if (window.Livewire) {
            if (buscar.trim() === '') {
                Livewire.dispatch('listarUsuarioSecJS');
            } else {
                Livewire.dispatch('buscarUsuarioSecJS', [buscar]);
            }
        } else {
            console.log('Livewire no está disponible');
        }
    }

    function EnviarParametrosLivewireUsuarioSec(){
        const camposRequeridos = [
            'nombreUserSec',
            'apellidoUserSec',
            'correoUserSec',
            'celularUserSec',
            'direccionUserSec',
            'numdocUserSec',
            'claveUserSec',
            'confirmarClaveUserSec'
        ];

        let formIsValid = true;

        // Validar si los campos están vacíos
        camposRequeridos.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (!field.value.trim()) {
                field.classList.add('input-errorUsuarioSec'); // Resaltar en rojo
                formIsValid = false;
            } else {
                field.classList.remove('input-errorUsuarioSec'); // Eliminar error si está lleno
            }
        });

        // Mostrar error si el formulario no es válido
        if (!formIsValid) {
            Swal.fire({
                icon: 'error',
                title: 'Campos Vacíos',
                text: 'Por favor, completa todos los campos obligatorios.',
            });
            return; // Detener la ejecución si el formulario no es válido
        }
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Antes de registrar verifica muy bien los datos del prestamo',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, Registrar',
            cancelButtonText: 'No, Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {

                // Aquí obtienes el IdCliente del objeto que se pasa en el modal
                const datosUsuarioSec = {
                    nombreUserSec         : document.getElementById('nombreUserSec').value,
                    apellidoUserSec       : document.getElementById('apellidoUserSec').value,
                    correoUserSec         : document.getElementById('correoUserSec').value,
                    celularUserSec        : document.getElementById('celularUserSec').value,
                    direccionUserSec      : document.getElementById('direccionUserSec').value,
                    referenciaUserSec     : document.getElementById('referenciaUserSec').value,
                    claveUserSec          : document.getElementById('claveUserSec').value,
                    confirmarClaveUserSec : document.getElementById('confirmarClaveUserSec').value,
                    tipoDocumentoUserSec  : document.getElementById('tipoDocumentoUserSec').value,
                    numdocUserSec         : document.getElementById('numdocUserSec').value,
                    tipoRolUserSec        : document.getElementById('tipoRolUserSec').value,
                };


                // Verifica si Livewire está disponible antes de emitir el evento
                if (window.Livewire) {

                    Swal.fire({
                        title: 'Creando...',
                        text: 'Creando Usuario, por favor espere.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    Livewire.dispatch('mantenimientoUsuarioSecRecibedesdeJS', [datosUsuarioSec]);

                    // Escuchar cuando el proceso ha terminado
                    Livewire.on('terminadomantenimientoUsuarioSecJS', () => {
                        Swal.close();

                        CerrarVentanaMantenimientoUsuariosec();
                        LimpiarImputUsuarioSec();

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

    function CerrarVentanaMantenimientoUsuariosec(){

        const ventanacontentNuevoUsuarioSec = document.getElementById('ventana-content-NuevoUsuarioSec');
        const tablaUsuarioSec = document.getElementById('tablaUsuarioSec');


        ventanacontentNuevoUsuarioSec.style.display = 'none';
        tablaUsuarioSec.style.display = 'block';
    }

    function limpiarCamposModalNuevoUsuarioSec(modal) {
        const inputs = modal.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.value = '';
            input.classList.remove('input-errorUsuarioSec');
            input.classList.remove('error-messageUsuarioSec');
        });
    }
    function abrirModalEditarUsuarioSec(modalUsuarioSec, usuarioSecData) {
        if (!usuarioSecData) {
            console.error('El objeto usuarioSecData está indefinido o es nulo.');
            return;
        }

        // Validar cada propiedad antes de acceder
        document.getElementById('idPersonaUsuarioSec').value = usuarioSecData["IdPersona"] || '';
        document.getElementById('idUsuarioSec').value = usuarioSecData["IdUsuario"] || '';
        document.getElementById('nombre').value = usuarioSecData["Nombre"] || '';
        document.getElementById('apellido').value = usuarioSecData["Apellido"] || '';
        document.getElementById('correo').value = usuarioSecData["Correo"] || '';

        // Validar el array PersonaCelular
        document.getElementById('celular').value =
            usuarioSecData["PersonaCelular"] && usuarioSecData["PersonaCelular"][0]
                ? usuarioSecData["PersonaCelular"][0]['Celular']
                : '';

        document.getElementById('direccionCliente').value = usuarioSecData["Direccion"] || '';
        document.getElementById('referenciaCliente').value = usuarioSecData["Referencia"] || '';
        document.getElementById('claveUserSec').value = usuarioSecData['Clave'] || '';
        document.getElementById('confirmarClave').value = usuarioSecData['Clave'] || '';
        // document.getElementById('tipodoc').value = usuarioSecData["IdTipoDoc"] || '';
        // document.getElementById('numdoc').value = usuarioSecData["NumDoc"] || '';

        modalUsuarioSec.style.display = "block";

        window.addEventListener('click', function (event) {
            if (event.target === modalUsuarioSec) {
                cerrarModalNuevoUsuarioSec();
            }
        });
    }


    function cerrarModalNuevoUsuarioSec() {
        const modalUsuarioSec = document.getElementById('ventana-content-NuevoUsuarioSec');
        if (modalUsuarioSec) {
            modalUsuarioSec.style.display = "none"; // Ocultar el modal
        }
    }

    function LimpiarImputUsuarioSec(){
        document.getElementById('nombreUserSec').value = '';
        document.getElementById('apellidoUserSec').value = '';
        document.getElementById('correoUserSec').value = '';
        document.getElementById('celularUserSec').value = '';
        document.getElementById('direccionUserSec').value = '';
        document.getElementById('referenciaUserSec').value = '';
        document.getElementById('claveUserSec').value = '';
        document.getElementById('confirmarClaveUserSec').value = '';
        document.getElementById('tipoDocumentoUserSec').value = 2;
        document.getElementById('numdocUserSec').value = '';
    }

    function EliminarUsuarioSec(event){
        const datosLeidos = JSON.parse(event.target.getAttribute('datosUsuarios'));
        console.log(datosLeidos);
    }
    function miFuncionJavaScript(mensaje) {
        alert(`Mensaje recibido: ${mensaje}`);
        // Lógica adicional aquí
    }

    Livewire.on('mostrarSweetAlertUsuarioSecExiste', function () {
        Swal.fire({
            icon: "error",
            title: "El Usuario ya Existe",
            text: "Los datos ingresados, coinciden con un Usuario registrado, por favor verifique",
            // footer: '<a href="#">Why do I have this issue?</a>'
        });
    });
});
