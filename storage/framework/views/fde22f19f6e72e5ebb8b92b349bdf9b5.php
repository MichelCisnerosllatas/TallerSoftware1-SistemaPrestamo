<div class="contenido_Pagos">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pagos.pagos');

$__html = app('livewire')->mount($__name, $__params, 'lw-2828355726-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

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
                        <input type="text" id="celular" wire:model="celular" class="<?php $__errorArgs = ['celular'];
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
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/Pagos/index.blade.php ENDPATH**/ ?>