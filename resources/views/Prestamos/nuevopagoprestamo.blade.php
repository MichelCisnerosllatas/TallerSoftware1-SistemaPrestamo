<div id="modalNuevoPagoPrestmoDetalleSombra" class="modalNuevoPagoPrestmoDetalleSombra">
    <div class="modal-content">
        <!-- Título fuera del formulario -->
        <div class="modalpagoprestamodetalleHeader">
            <h2 id="modalTitle" class="modal-title">Nuevo Pago</h2>
            <button id="botonCancelarModalNuevopagoprestamodetalle2" type="button" class="buttonPrincipal1" style="min-height: 30px;">X</button>
        </div>

        <!-- Formulario con scroll -->
        <div class="modal-form-container">
            <div class="form-group">
                <label>Monto Devolucion:</label>
                <label id="MontodevolucionLabelModalNuevoPagoPrestamodetalle"></label>
            </div>

            <div class="form-group">
                <label for="MontoCuota">Monto Cuota:</label>
                <div>
                    <label>S/. </label>
                    <label id="MontoCuotaLabelModalNuevoPagoPrestamodetalle"></label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div style="display: flex;">
                    <label style="margin-right: 10px;">Pagados: </label>
                    <div>
                        <label>S/. </label>
                        <label id="lblmontopagadosNuevoPagoModal">0.00</label>
                    </div>
                </div>

                <div style="display: flex;">
                    <label style="margin-right: 10px;">Restantes: </label>
                    <div>
                        <label>S/. </label>
                        <label id="lblmontorestanteNuevoPagoModal">0.00</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="MontoPago">Monto Pago:</label>
                <input style="width: 200px;" type="number" class="inputMontoPagoPrestamoDetalle" pattern="^\d+(\.\d{0,2})?$" placeholder="0.00" id="idMontoPagoModalPrestamodetalle" disabled>

                {{--                <input style="width: 200px;" type="number" class="inputMontoPagoPrestamoDetalle" pattern="^\d+(\.\d{0,2})?$" placeholder="0.00" id="idMontoPagoModalPrestamodetalle">--}}
            </div>

            <!-- Toggle Switch -->
            <div id="idtogglePagoCompletoPrestamoDetalle" class="togglePagoCompletoPrestamoDetalle">
                <label for="toggleCheckbox" class="toggle-label">Perzonalizar Pago</label>

                <label class="switch">
                    <input type="checkbox" id="checkedPagoCompletoPrestamodetalle">
                    <span class="slider round"></span>
                </label>
            </div>

            <div id="IDinputIngresarCuotasNuevoPagoPrestamoDetalle" class="form-group" style="margin-top: 10px;">
                <label for="MontoPago">Ingrese las Cuotas:</label>
                <div style="display: flex; justify-content: space-between">
                    <button id="idbutoncuotadecremento" style="height: 40px" class="buttonPrincipal2">-</button>
                    <input id="idinputNumCuotasPersonalizadasPrestamoDetalle" style="width: 50px; height: 40px; text-align: center" value="2" readonly>
{{--                    <h4 style="display: flex; justify-content: center; align-items: center; height: 40px; width: 40px;" id="idinputNumCuotasPersonalizadasPrestamoDetalle">24</h4>--}}
{{--                    <input id="idinputNumCuotasPersonalizadasPrestamoDetalle" value="1" type="number" class="inputNumCuotasPersonalizadasPrestamoDetalle" placeholder="0" >--}}
                    <button id="idbutoncuotaincremento" style="height: 40px"  class="buttonPrincipal2">+</button>
                </div>
            </div>
        </div>



        <!-- Footer con botones de acción -->
        <div id="idDivErrorNuevoPagoPrestamoDetalle" class="modalpagoprestamodetalleFooter" style="height: 38px; padding: 5px; display: flex; justify-content: space-between; background-color: #ffbea9">
            <div>
                <p id="idparrafoerrorNuevoPagoPrestamoDetalle" style="font-size: 12px;">El Parametro es requerido</p>
            </div>
            <div>
                <button id="idbuttoncerrarcuadroError" style="background-color: transparent; color: var(--color-rojo); height: 100%; width: 20px; cursor: pointer; border: 0;">X</button>
            </div>
        </div>

        <div class="modalpagoprestamodetalleFooter">
            <button id="botonCancelarModalNuevopagoprestamodetalle1" class="buttonPrincipal2 modal-button" style="min-height: 30px; background: var(--color-rojo);">Cancelar</button>
            <button id="botonRegistrarpagoprestamodetalle" type="submit" class="buttonPrincipal2 modal-button" style="min-height: 30px">Registrar</button>
        </div>
    </div>
</div>
<!-- resources/views/prestamos.blade.php -->
{{--<div id="modalNuevoPrestamo" class="modal">--}}
{{--    <div class="modal-content">--}}
{{--        <span class="close">&times;</span>--}}
{{--        <h2>Nuevo Préstamo</h2>--}}
{{--        <form>--}}
{{--            <!-- Contenido del formulario -->--}}
{{--            <label for="nombre">Nombre:</label>--}}
{{--            <input type="text" id="nombre" name="nombre">--}}

{{--            <label for="monto">Monto:</label>--}}
{{--            <input type="text" id="monto" name="monto">--}}

{{--            <button type="submit">Guardar Préstamo</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
