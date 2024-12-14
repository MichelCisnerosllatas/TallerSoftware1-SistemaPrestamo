<div class="contenido_Pagos">
    @livewire('pagos.pagos')

    <div id="modalNuevoPago" class="modalNuevoPagoSombra">
        <div class="modal-content">
            <!-- Título fuera del formulario -->
            <div class="modalPagosHeader">
                <h2 id="modalTitle" class="modal-title">Nuevo Pago</h2>
                <button id="botonCancelarModalNuevoPagos2" type="button" class="buttonPrincipal1" style="min-height: 30px;">X</button>
            </div>

            <!-- Formulario con scroll -->
            <div class="modal-form-container">
                <form id="formPagos">
                    <div class="modal-body-nuevoPagos">
                        <input type="hidden" id="idpersonaPago" value="0" placeholder="idpersonaPago">
                        <input type="hidden" id="idPago" value="0" placeholder="IdPago">
                        <div class="input-group">
                            <div class="input-item">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" wire:model="nombre" class="@error('nombre') input-error @enderror" required>
                                @error('nombre') <span class="error-message">{{ $message }}</span> @enderror
                            </div>
                            <div class="input-item">
                                <label for="apellido">Apellido:</label>
                                <input type="text" id="apellido" wire:model="apellido" class="@error('apellido') input-error @enderror" >
                                @error('apellido') <span class="error-message">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" wire:model="correo">

                        <label for="celular">Celular:</label>
                        <input type="text" id="celular" wire:model="celular" class="@error('celular') input-error @enderror" required>
                        @error('celular') <span class="error-message">{{ $message }}</span> @enderror

                        <label for="direccionPago">Dirección:</label>
                        <input type="text" id="direccionPago" wire:model="direccionPago">

                        <label for="referenciaPago">Referencia:</label>
                        <input type="text" id="referenciaPago" wire:model="referenciaPago">

                        <div class="input-group">
                            <div class="input-item">
                                <label for="tipodoc">Tipo de Documento:</label>
                                <select class="select" name="tipodoc" id="tipodoc" wire:model="tipodoc" required>
                                    <option value="1">Carnet Extranjeria</option>
                                    <option value="2" selected>Documento Nacional de Identidad</option>
                                    <option value="3">Registro Unico de Contribuyente</option>
                                    <option value="4">Otro Documento</option>
                                </select>
                            </div>
                            <div class="input-item">
                                <label for="numdoc">Número de Documento:</label>
                                <input type="number" id="numdoc" wire:model="numdoc" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer con botones de acción -->
            <div class="modalPagosFooter">
                <button id="botonCancelarModalNuevoPagos1" class="buttonPrincipal2 modal-button" style="min-height: 30px; background: var(--color-rojo);">Cancelar</button>
                <button wire:submit.prevent="insertarPago" id="botonRegistrarPago" type="submit" class="buttonPrincipal2 modal-button" style="min-height: 30px">Registrar</button>
            </div>
        </div>
    </div>
</div>
