document.querySelector('.div_contenedor').addEventListener('click', function(event) {
    // Solo ejecuta iniciarPrestamo() si el clic se hizo en el botón "Nuevo Prestamo"
    if (event.target && event.target.id === 'btn_nuevoprestamo') {
        abrirModal();
    }
});

function abrirModal() {
    const modal = document.getElementById('modalNuevoPrestamo');
    const closeBtn = document.querySelector('#modalNuevoPrestamo .close');

    modal.style.display = "block"; // Muestra el modal
    closeBtn.addEventListener('click', function () {
        modal.style.display = "none"; // Cierra el modal
    });

    // Si el usuario hace clic fuera del modal, lo cierra
    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
}
