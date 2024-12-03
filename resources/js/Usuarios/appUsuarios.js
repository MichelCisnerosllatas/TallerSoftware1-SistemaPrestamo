Livewire.on('mostrarErrorContraAlert', function () {
    Swal.fire({
        title: 'Error de Contraseña',
        text: 'Las Contraseñas no coinciden',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
});

Livewire.on('mostrarUsuarioCreadoAlert', function () {
    Swal.fire({
        title: 'Usuario Creado',
        text: 'Usuario Creado Exitosamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
});

Livewire.on('mostrarNumeroIgualAlert', function () {
    Swal.fire({
        title: 'Celular ya existe',
        text: 'Celular Existente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
});
