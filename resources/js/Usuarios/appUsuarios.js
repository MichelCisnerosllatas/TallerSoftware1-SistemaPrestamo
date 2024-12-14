document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('.div_contenedor').addEventListener('click', function (event) {

        let IdUsuarioSec = 0;


        if(event.target && event.target.id === 'btnreloadUsuarioSec'){
            if (window.Livewire) {
                Livewire.dispatch('listarUsuarioSecJS');
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
    // function EnviarParametrosLivewireUsuarioSec() {
    //     const camposRequeridos = [
    //         'nombreUserSec',
    //         'apellidoUserSec',
    //         'correoUserSec',
    //         'celularUserSec',
    //         'direccionUserSec',
    //         'numdocUserSec',
    //         'claveUserSec',
    //         'confirmarClaveUserSec'
    //     ];
    //     let formIsValid = true;
    //
    //     camposRequeridos.forEach(fieldId => {
    //         const field = document.getElementById(fieldId);
    //         if (!field.value.trim()) {
    //             field.classList.add('input-errorUsuarioSec');
    //             formIsValid = false;
    //         } else {
    //             field.classList.remove('input-errorUsuarioSec');
    //         }
    //     });
    //
    //     const correoField = document.getElementById('correoUserSec');
    //     const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //     if (!correoRegex.test(correoField.value.trim())) {
    //         correoField.classList.add('input-errorUsuarioSec');
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Correo Inválido',
    //             text: 'Por favor, ingrese un correo electrónico válido.',
    //         });
    //         formIsValid = false;
    //     } else {
    //         correoField.classList.remove('input-errorUsuarioSec');
    //     }
    //
    //     const claveField = document.getElementById('claveUserSec');
    //     const confirmarClaveField = document.getElementById('confirmarClaveUserSec');
    //     if (claveField.value !== confirmarClaveField.value) {
    //         claveField.classList.add('input-errorUsuarioSec');
    //         confirmarClaveField.classList.add('input-errorUsuarioSec');
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Contraseñas No Coinciden',
    //             text: 'Por favor, asegúrese de que las contraseñas coinciden.',
    //         });
    //         formIsValid = false;
    //     } else {
    //         claveField.classList.remove('input-errorUsuarioSec');
    //         confirmarClaveField.classList.remove('input-errorUsuarioSec');
    //     }
    //
    //     if (claveField.value.length < 8) {
    //         claveField.classList.add('input-errorUsuarioSec');
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Contraseña Corta',
    //             text: 'La contraseña debe tener al menos 8 caracteres.',
    //         });
    //         formIsValid = false;
    //     } else {
    //         claveField.classList.remove('input-errorUsuarioSec');
    //     }
    //
    //     const tipoDocumento = document.getElementById('tipoDocumentoUserSec').value;
    //     const numDocField = document.getElementById('numdocUserSec');
    //     const numCelularField = document.getElementById('celularUserSec');
    //
    //     let maxLength = 8;
    //     if (tipoDocumento === '1') { // Carnet Extranjeria
    //         maxLength = 20;
    //     } else if (tipoDocumento === '2') { // Dni
    //         maxLength = 8;
    //     }
    //
    //     if (numCelularField.value.length !== 9) {
    //         numCelularField.classList.add('input-errorUsuarioSec');
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Número de Celular Incorrecto',
    //             text: 'El número de celular debe tener 9 dígitos.',
    //         });
    //         formIsValid = false;
    //     } else {
    //         numCelularField.classList.remove('input-errorUsuarioSec');
    //     }
    //
    //     if (numDocField.value.length !== maxLength) {
    //         numDocField.classList.add('input-errorUsuarioSec');
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Número de Documento Incorrecto',
    //             text: El número de documento debe tener ${maxLength} dígitos.,
    //         });
    //         formIsValid = false;
    //     } else {
    //         numDocField.classList.remove('input-errorUsuarioSec');
    //     }
    //
    //     if (!formIsValid) {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Formulario Incompleto',
    //             text: 'Por favor, complete todos los campos requeridos.',
    //         });
    //         return;
    //     }
    //
    //     Swal.fire({
    //         title: '¿Está seguro?',
    //         text: '¿Desea enviar los datos del usuario?',
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: 'Sí, enviar',
    //         cancelButtonText: 'No, cancelar'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             const datosUsuarioSec = {
    //                 nombreUserSec: document.getElementById('nombreUserSec').value,
    //                 apellidoUserSec: document.getElementById('apellidoUserSec').value,
    //                 correoUserSec: document.getElementById('correoUserSec').value,
    //                 celularUserSec: document.getElementById('celularUserSec').value,
    //                 direccionUserSec: document.getElementById('direccionUserSec').value,
    //                 referenciaUserSec: document.getElementById('referenciaUserSec').value,
    //                 claveUserSec: document.getElementById('claveUserSec').value,
    //                 confirmarClaveUserSec: document.getElementById('confirmarClaveUserSec').value,
    //                 tipoDocumentoUserSec: document.getElementById('tipoDocumentoUserSec').value,
    //                 numdocUserSec: document.getElementById('numdocUserSec').value,
    //                 tipoRolUserSec: document.getElementById('tipoRolUserSec').value,
    //             };
    //
    //             if (window.Livewire) {
    //                 Swal.fire({
    //                     title: 'Creando Usuario',
    //                     text: 'Creando el usuario...',
    //                     allowOutsideClick: false,
    //                     didOpen: () => {
    //                         Swal.showLoading();
    //                     }
    //                 });
    //                 Livewire.dispatch('maesdeJS', [datosUsuarioSec]);
    //                 Livewire.on('terminadomantenimientoUsuarioSecJS', () => {
    //                     Swal.close();
    //                     CerrarVentanaMantenimientoUsuariosec();
    //                     LimpiarImputUsuarioSec();
    //                 });
    //             } else {
    //                 console.error('Livewire no está disponible.');
    //             }
    //         }
    //     });
    // }

    function EnviarParametrosLivewireUsuarioSec() {
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

        // Validar formato de correo electrónico
        const correoField = document.getElementById('correoUserSec');
        const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!correoRegex.test(correoField.value.trim())) {
            correoField.classList.add('input-errorUsuarioSec'); // Resaltar en rojo
            Swal.fire({
                icon: 'error',
                title: 'Correo inválido',
                text: 'Por favor, ingresa un correo electrónico válido.',
            });
            return;
        } else {
            correoField.classList.remove('input-errorUsuarioSec');
        }

        // Validar coincidencia de contraseñas
        const claveField = document.getElementById('claveUserSec');
        const confirmarClaveField = document.getElementById('confirmarClaveUserSec');
        if (claveField.value !== confirmarClaveField.value) {
            claveField.classList.add('input-errorUsuarioSec');
            confirmarClaveField.classList.add('input-errorUsuarioSec');
            Swal.fire({
                icon: 'error',
                title: 'Contraseñas no coinciden',
                text: 'Por favor, asegúrate de que las contraseñas coincidan.',
            });
            return;
        } else {
            claveField.classList.remove('input-errorUsuarioSec');
            confirmarClaveField.classList.remove('input-errorUsuarioSec');
        }

        // Validar longitud de la contraseña
        if (claveField.value.length < 8) {
            claveField.classList.add('input-errorUsuarioSec');
            Swal.fire({
                icon: 'error',
                title: 'Contraseña demasiado corta',
                text: 'La contraseña debe tener al menos 8 caracteres.',
            });
            return;
        }

        // Validar longitud del campo "N° de Documento" según el tipo de documento
        const tipoDocumento = document.getElementById('tipoDocumentoUserSec').value;
        const numDocField = document.getElementById('numdocUserSec');
        const numCelular = document.getElementById('celularUserSec');
        const registroUnico = document.getElementById('numdocUserSec');

        let maxLength = 8; // Por defecto

        if (tipoDocumento === '1') {
            maxLength = 20;
        } else if (tipoDocumento === '2') {
            maxLength = 8;
        } else if (tipoDocumento === '3') {
            maxLength = 11;
        }

        if (numCelular.value.length !== 9) {
            numCelular.classList.add('input-errorUsuarioSec');
            Swal.fire({
                icon: 'error',
                title: 'Número de Celular Incorrecto',
                text: 'El número de celular debe tener 9 dígito ',
            });
            return;
        }else {
            Swal.fire({
                icon: 'error',
                title: 'Celular Excedido',
                text: 'El número de celular debe ser 9 dígito ',
            });
        }


        if (numDocField.value.length !== maxLength) {
            numDocField.classList.add('input-errorUsuarioSec');
            Swal.fire({
                icon: 'error',
                title: 'Número de documento inválido',
                text: 'El número de documento debe tener exactamente ${maxLength} dígitos para el tipo de documento seleccionado.',
            });
            return;
        } else {
            numDocField.classList.remove('input-errorUsuarioSec');
        }

        // Mostrar error si el formulario no es válido
        if (!formIsValid) {
            Swal.fire({
                icon: 'error',
                title: 'Campos Vacíos',
                text: 'Por favor, completa todos los campos obligatorios.',
            });
            return;
        }

        // Confirmación antes de enviar
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Antes de registrar verifica muy bien los datos del prestamo',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, Registrar',
            cancelButtonText: 'No, Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const datosUsuarioSec = {
                    nombreUserSec: document.getElementById('nombreUserSec').value,
                    apellidoUserSec: document.getElementById('apellidoUserSec').value,
                    correoUserSec: document.getElementById('correoUserSec').value,
                    celularUserSec: document.getElementById('celularUserSec').value,
                    direccionUserSec: document.getElementById('direccionUserSec').value,
                    referenciaUserSec: document.getElementById('referenciaUserSec').value,
                    claveUserSec: document.getElementById('claveUserSec').value,
                    confirmarClaveUserSec: document.getElementById('confirmarClaveUserSec').value,
                    tipoDocumentoUserSec: document.getElementById('tipoDocumentoUserSec').value,
                    numdocUserSec: document.getElementById('numdocUserSec').value,
                    tipoRolUserSec: document.getElementById('tipoRolUserSec').value,
                };

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

                    Livewire.on('terminadomantenimientoUsuarioSecJS', () => {
                        Swal.close();
                        CerrarVentanaMantenimientoUsuariosec();
                        LimpiarImputUsuarioSec();
                    });
                } else {
                    console.error('Livewire no está disponible');
                }
            } else {
                console.log('Acción cancelada');
            }
        });
    }

    // function EnviarParametrosLivewireUsuarioSec(){
    //     const camposRequeridos = [
    //         'nombreUserSec',
    //         'apellidoUserSec',
    //         'correoUserSec',
    //         'celularUserSec',
    //         'direccionUserSec',
    //         'numdocUserSec',
    //         'claveUserSec',
    //         'confirmarClaveUserSec'
    //     ];
    //
    //     let formIsValid = true;
    //
    //     // Validar si los campos están vacíos
    //     camposRequeridos.forEach(fieldId => {
    //         const field = document.getElementById(fieldId);
    //         if (!field.value.trim()) {
    //             field.classList.add('input-errorUsuarioSec'); // Resaltar en rojo
    //             formIsValid = false;
    //         } else {
    //             field.classList.remove('input-errorUsuarioSec'); // Eliminar error si está lleno
    //         }
    //     });
    //
    //     // Mostrar error si el formulario no es válido
    //     if (!formIsValid) {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Campos Vacíos',
    //             text: 'Por favor, completa todos los campos obligatorios.',
    //         });
    //         return; // Detener la ejecución si el formulario no es válido
    //     }
    //     Swal.fire({
    //         title: '¿Estás seguro?',
    //         text: 'Antes de registrar verifica muy bien los datos del prestamo',
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: 'Sí, Registrar',
    //         cancelButtonText: 'No, Cancelar'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //
    //             // Aquí obtienes el IdCliente del objeto que se pasa en el modal
    //             const datosUsuarioSec = {
    //                 nombreUserSec         : document.getElementById('nombreUserSec').value,
    //                 apellidoUserSec       : document.getElementById('apellidoUserSec').value,
    //                 correoUserSec         : document.getElementById('correoUserSec').value,
    //                 celularUserSec        : document.getElementById('celularUserSec').value,
    //                 direccionUserSec      : document.getElementById('direccionUserSec').value,
    //                 referenciaUserSec     : document.getElementById('referenciaUserSec').value,
    //                 claveUserSec          : document.getElementById('claveUserSec').value,
    //                 confirmarClaveUserSec : document.getElementById('confirmarClaveUserSec').value,
    //                 tipoDocumentoUserSec  : document.getElementById('tipoDocumentoUserSec').value,
    //                 numdocUserSec         : document.getElementById('numdocUserSec').value,
    //                 tipoRolUserSec        : document.getElementById('tipoRolUserSec').value,
    //             };
    //
    //
    //             // Verifica si Livewire está disponible antes de emitir el evento
    //             if (window.Livewire) {
    //
    //                 Swal.fire({
    //                     title: 'Creando...',
    //                     text: 'Creando Usuario, por favor espere.',
    //                     allowOutsideClick: false,
    //                     didOpen: () => {
    //                         Swal.showLoading();
    //                     }
    //                 });
    //                 Livewire.dispatch('mantenimientoUsuarioSecRecibedesdeJS', [datosUsuarioSec]);
    //
    //                 // Escuchar cuando el proceso ha terminado
    //                 Livewire.on('terminadomantenimientoUsuarioSecJS', () => {
    //                     Swal.close();
    //
    //                     CerrarVentanaMantenimientoUsuariosec();
    //                     LimpiarImputUsuarioSec();
    //
    //                 });
    //
    //             } else {
    //                 console.error('Livewire no está disponible');
    //             }
    //         } else {
    //             // Acción si elige "No"
    //             console.log('Acción cancelada');
    //
    //         }
    //     });
    //
    // }

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
        alert("Mensaje recibido: ${mensaje}");
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
