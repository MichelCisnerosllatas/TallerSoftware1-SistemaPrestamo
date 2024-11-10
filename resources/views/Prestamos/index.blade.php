<div class="contenido_Prestamos">
    <div class="contenido_Prestamos1">
        <button id="btn_nuevoprestamo">Nuevo Prestamo</button>
        <label for="cars">Buscar Por:</label>
        <select name="cars" id="cars">
            <option value="volvo">Nombre</option>
            <option value="saab">Monto</option>
        </select>
    </div>

    <div class="contenido_Prestamos2">
        <input class="txtinput_prestamo" placeholder="Escribe Aqui ...">
    </div>

    <div class="contenido_Prestamos3">
        <label for="cars">Filtrar por:</label>
        <select>
            <option value="Todo">Todo</option>
            <option value="Activos">Activos</option>
            <option value="Inactivos">Inactivos</option>
            <option value="Pendiente">Pendiente</option>
        </select>
    </div>
</div>

<!-- Aquí se incluye el modal -->
@include('Prestamos.nuevoPrestamo')
