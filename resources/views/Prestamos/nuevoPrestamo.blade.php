<!-- resources/views/prestamos.blade.php -->
<div id="modalNuevoPrestamo" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Nuevo Préstamo</h2>
        <form>
            <!-- Contenido del formulario -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">

            <label for="monto">Monto:</label>
            <input type="text" id="monto" name="monto">

            <button type="submit">Guardar Préstamo</button>
        </form>
    </div>
</div>
