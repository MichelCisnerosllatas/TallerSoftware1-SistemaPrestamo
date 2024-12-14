<div class="tabs">
    <!-- Pestañas -->
    <div class="tab-buttonsReciclaje">
        <button id="idbotonclientesTabReciclaje">Clientes</button>
        <button style="display: none" id="idbotonprestamosTabReciclaje">Préstamos</button>
        <button style="display: none" id="idbotonpaosTabReciclaje">Pagos</button>
    </div>
</div>

<!-- Contenido de las Pestañas -->
<div class="tab-content">
    @livewire('reciclaje.cliente-reciclaje')

    <div id="tabreciclaje2" class="tab-content-item" style="display: none">
        @livewire('reciclaje.prestamo-reciclaje')
    </div>

    <div id="tabreciclaje3" class="tab-content-item" style="display: none">
    </div>
</div>

<style>
    .tab-buttonsReciclaje {
        display: flex;
        width: 100%; /* Asegura que el contenedor ocupe todo el ancho */
    }

    .tab-buttonsReciclaje button {
        flex: 1; /* Los botones ocuparán el mismo tamaño */
        text-align: center; /* Centra el texto en los botones */
        padding: 10px; /* Espaciado interno de los botones */
        border: none; /* Quita el borde por defecto */
        cursor: pointer; /* Añade el puntero de clic */
    }

    /* Colores de botones por defecto y al pasar el cursor */
    .tab-buttonsReciclaje button:first-child {
        background-color: var(--color-azul-marino);
        color: var(--color-blanco);
    }
    .tab-buttonsReciclaje button:not(:first-child) {
        background-color: var(--color-blanco);
        color: var(--color-azul-marino);
    }
    .tab-buttonsReciclaje button:hover {
        background-color: var(--color-celeste-claro-2);
        color: var(--color-negro);
    }
</style>
