<div class="contenido_Prestamos">
    <!-- Contenido Livewire (tabla) -->
    <div id="tablaPrestamos">
        @livewire('prestamo.prestamo')
    </div>

    <div id="ventana-content-NuevoPrestamo" class="ventana-content-NuevoPrestamo">
        <!-- Título fuera del formulario -->
        <div class="ventanaPrestamoHeader">
            <div style="display: flex;">
                <button id="botonCancelarventanaNuevoPrestamo2" type="button" class="buttonPrincipal1" style="min-height: 30px;">
                    <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="15" width="12.5" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                </button>
                <h2 id="ventanaTitle" class="ventana-title" style="padding: 0 10px;">Nuevo Prestamo</h2>
            </div>
            {{--                <button id="botonCancelarventanaNuevoPrestamo2" type="button" class="buttonPrincipal1" style="min-height: 30px;">X</button>--}}
        </div>

        <div class="ventana-form-container">
            <div class="container">
                <form>
                    <div class="divprestamoaleatorios">
                        <div class="divlabelsValoresPrestamos">
                            <label for="fname">Cliente:</label>
                        </div>
                        <div class="divlabelsPrestamos" style="display: flex">
                            <input type="hidden" id="inputIDPrestamo" disabled style="width: 40px;">
                            <input type="hidden" id="inputPrestamoSeleccionarClienteIDCliente" disabled style="width: 40px;">
                            <input type="text" id="inputPrestamoSeleccionarCliente" placeholder="Seleccione un Cliente" disabled>
                            <button id="btnPrestamoSeleccionarCliente" class="buttonPrincipal1" style="min-height: 40px; min-width: 40px; margin-left: 10px;">
                                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="divprestamoaleatorios">
                        <div class="divlabelsValoresPrestamos">
                            <label for="country">Interes</label>
                        </div>
                        <div class="divlabelsPrestamos">
                            <select id="selectinteresprestamo" wire:model="$interes" required>
                                <option value="5">5 %</option>
                                <option value="10">10 %</option>
                                <option value="15">15 %</option>
                                <option value="20" selected>20 %</option>
                                <option value="25">25 %</option>
                                <option value="30">30 %</option>
                                <option value="35">35 %</option>
                                <option value="40">40 %</option>
                                <option value="45">45 %</option>
                                <option value="50">50 %</option>
                            </select>
                        </div>
                    </div>
                    <div class="divprestamoaleatorios">
                        <div class="divlabelsValoresPrestamos">
                            <label for="country">Tipo de Cobro</label>
                        </div>
                        <div class="divlabelsPrestamos">
                            <select name="selectIdTipoCobroprestamo" id="selectIdTipoCobroprestamo" wire:model="$idtipocobro" required>
                                <option value="1" selected>Diario</option>
                                <option value="2" >Semanal</option>
                                <option value="3" >Quincenal</option>
                                <option value="4" >Mensual</option>
                            </select>
                        </div>
                    </div>

                    <div class="divprestamoaleatorios">
                        <div class="divlabelsValoresPrestamos">
                            <label for="country">Base:</label>
                        </div>
                        <div class="divlabelsPrestamos">
                            <select name="selectIdTipoFormateadaprestamo" id="selectIdTipoFormateadaprestamo" required>
                                <option value="1" selected>1 Mes</option>
                                <option value="2" >2 Meses</option>
                                <option value="3" >3 Meses</option>
                                <option value="4" >4 Menses</option>
                                <option value="5" >5 Meses</option>
                                <option value="6" >6 Meses</option>
                                <option value="7" >7 Menses</option>
                                <option value="8" >8 Meses</option>
                                <option value="9" >9 Meses</option>
                                <option value="10" >10 Menses</option>
                                <option value="11" >11 Meses</option>
                                <option value="12" >12 Meses</option>
                            </select>
                        </div>
                    </div>



                    <div class="divprestamoaleatorios">
                        <div class="divlabelsValoresPrestamos">
                            <label>Prestamo:</label>
                        </div>
                        <div class="divlabelsPrestamos" style="display: flex; align-items: center;">
                            <h1>S/.</h1>
                            <input type="text" id="inputMontoPrestamo" placeholder="0.00" style="font-size: 18px; font-weight: bold; margin-left: 20px;">
                        </div>
                    </div>
                    <div class="divprestamoaleatorios" style="display: flex; justify-content: space-evenly; height: 30px; margin-top: 10px;">
                        <button id="btnprestamoMono100" class="buttonPrincipal2">100.00</button>
                        <button id="btnprestamoMono200" class="buttonPrincipal2">200.00</button>
                        <button id="btnprestamoMono300" class="buttonPrincipal2">300.00</button>
                        <button id="btnprestamoMono500" class="buttonPrincipal2">500.00</button>
                        <button id="btnprestamoMono1000" class="buttonPrincipal2">1000.00</button>
                    </div>
                    <div class="divprestamoaleatorios">
                        <div class="divlabelsValoresPrestamos">
                            <label for="subject">Observacion:</label>
                        </div>
                        <div class="divlabelsPrestamos">
                            <textarea id="txtinputObservacionPrestamo" name="subject" placeholder="Escribe aqui..." style="height:200px"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container">
                <h3>Resultado del Prestamo</h3>

                <div style="display: flex; justify-content: space-between;">
                    <label>Cuotas:</label>
                    <label id="labelvalornumeroCuotaPrestamo" style="font-weight: bold">No Definido</label>
                </div>
                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <label>Monto Cuota:</label>
                    <label id="labelValorMontoCuotaPrestamo" style="font-weight: bold">S/. 0.00</label>
                </div>

                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <label>Fecha a Cobrar:</label>
                    <label id="labelValorFechacobroPrestamo" style="font-weight: bold">No Definido</label>
                </div>

                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <label>Monto Interes:</label>
                    <label id="labelValorMontoInteresPrestamo" style="font-weight: bold">S/. 0.00</label>
                </div>

                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <label>Fecha Vencimiento: </label>
                    <label id="labelValorFechaVencimientoPrestamo" style="font-weight: bold">No Definido</label>
                </div>

                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <label>Monto Total Recibir:</label>
                    <label id="labelValorMontoTotalRecibirPrestamo" style="font-weight: bold">S/. 0.00</label>
                </div>
            </div>
        </div>

        <!-- Footer con botones de acción -->
        <div class="ventanaPrestamoFooter">
            <button id="botonCancelarventanaNuevoPrestamo1" class="buttonPrincipal2 ventana-button" style="min-height: 30px; background: var(--color-rojo);">Cancelar</button>
            <button id="botonRegistrarPrestamo" type="submit" class="buttonPrincipal2 ventana-button" style="min-height: 30px">Registrar</button>
        </div>
    </div>

    <div id="modalListadoClientePrestamo" class="modalListadoClientePrestamoSombra">
        <div class="modal-content">
            <!-- Título fuera del formulario -->
            <div class="modalClienteHeader">
                <h2 id="modalTitle" class="modal-title">Seleccione un Cliente</h2>
                <button id="botonCancelarModalListadoClientePrestamo2" type="button" class="buttonPrincipal1" style="min-height: 30px; background: var(--color-rojo)">X</button>
            </div>

            <!-- Formulario con scroll -->
            <div class="modal-form-container">
                @livewire('cliente.seleccionar-cliente')
            </div>
        </div>
    </div>
</div>
{{--@include('Prestamos.nuevoPrestamo')--}}
