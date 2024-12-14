<div class="contenido_Clientes">
    @livewire('cliente.cliente')

    <div id="modalnuevocliente" class="modalNuevoClienteSombra">
        <div class="modal-content">
            <!-- Título fuera del formulario -->
            <div class="modalClienteHeader">
                <h2 id="modalTitle" class="modal-title">Nuevo Cliente</h2>
                <button id="botonCancelarModalNuevoCliente2" type="button" class="buttonPrincipal1" style="min-height: 30px;">X</button>
            </div>

            <!-- Formulario con scroll -->
            <div class="modal-form-container">
                <form id="formCliente">
                    <div class="modal-body-nuevociente">
                        <input type="hidden" id="idpersonacliente" value="0" placeholder="idpersonacliente">
                        <input type="hidden" id="idcliente" value="0" placeholder="IdCliente">
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
                        <input type="number" id="celular" wire:model="celular" class="@error('celular') input-error @enderror" required>
                        @error('celular') <span class="error-message">{{ $message }}</span> @enderror

                        <div class="input-group">
                            <div class="input-item">
                                <label for="tipodoc">Seleccione Distrito:</label>
                                <select class="select" id="selectIdDistrito" required>
                                    <option value="1441">Belen</option>
                                    <option value="1444" >Iquitos</option>
                                    <option value="1448">Punchana</option>
                                    <option value="1450">San juan bautista</option>
                                </select>
                            </div>
                            <div class="input-item">
                                <label for="direccionCliente">Dirección:</label>
                                <input type="text" id="direccionCliente" wire:model="direccionCliente">
                            </div>
                        </div>


{{--                        <label for="direccionCliente">Dirección:</label>--}}
{{--                        <input type="text" id="direccionCliente" wire:model="direccionCliente">--}}

                        <label for="referenciaCliente">Referencia:</label>
                        <input type="text" id="referenciaCliente" wire:model="referenciaCliente">

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
            <div class="modalClienteFooter">
                <button id="botonCancelarModalNuevoCliente1" class="buttonPrincipal2 modal-button" style="min-height: 30px; background: var(--color-rojo);">Cancelar</button>
                <button wire:submit.prevent="insertarCliente" id="botonRegistrarCliente" type="submit" class="buttonPrincipal2 modal-button" style="min-height: 30px">Registrar</button>
            </div>
        </div>
    </div>
</div>
