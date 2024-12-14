<div class="contenido_Clientes">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cliente.cliente');

$__html = app('livewire')->mount($__name, $__params, 'lw-2957234346-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

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
                                <input type="text" id="nombre" wire:model="nombre" class="<?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error-message"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="input-item">
                                <label for="apellido">Apellido:</label>
                                <input type="text" id="apellido" wire:model="apellido" class="<?php $__errorArgs = ['apellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                                <?php $__errorArgs = ['apellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error-message"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" wire:model="correo">

                        <label for="celular">Celular:</label>
                        <input type="number" id="celular" wire:model="celular" class="<?php $__errorArgs = ['celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <?php $__errorArgs = ['celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error-message"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

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
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/Clientes/index.blade.php ENDPATH**/ ?>