<div class="contenido_Usuarios">
    <div id="tablaUsuarioSec">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('usuario.gestion-usuario');

$__html = app('livewire')->mount($__name, $__params, 'lw-594108838-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

    <div id="ventana-content-NuevoUsuarioSec" class="ventana-content-NuevoUsuarioSec">
        <!-- Título fuera del formulario -->
        <div class="ventanaUsuarioSecHeader">
            <div style="display: flex;">
                <button id="botonCancelarventanaNuevoUsuarioSec2" type="button" class="buttonPrincipal1" style="min-height: 30px;">
                    <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="15" width="12.5" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                </button>
                <h2 id="ventanaTitleUsuarioSec" class="ventana-titleUsuarioSec" style="padding: 0 10px;">Nuevo Usuario Secundario</h2>
            </div>
            
        </div>

        <div class="ventana-form-containerUsuarioSec">
            <div class="container">
                <form>
                    <input type="hidden" id="idPersonaUsuarioSec" value="0" placeholder="idPersonaUsuarioSec">
                    <input type="hidden" id="IdUsuarioSec" value="0" placeholder="IdUsuarioSec">
                    <div class="modal-body-usuario">
                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="nombre">Nombre:</label>
                                <input
                                    type="text"
                                    id="nombreUserSec">
                            </div>
                            <div class="input-item-usuario">
                                <label for="apellido">Apellido:</label>
                                <input
                                    type="text"
                                    id="apellidoUserSec">
                            </div>
                        </div>

                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="correo">Correo:</label>
                                <input
                                    type="email"
                                    id="correoUserSec">
                            </div>
                            <div class="input-item-usuario">
                                <label for="celular">Celular:</label>
                                <input
                                    type="number"
                                    id="celularUserSec">
                            </div>
                        </div>

                        <div class="input-group-usuario">
                            <div class="input-item-usuario">

                                <label for="direccion">Dirección:</label>
                                <input
                                    type="text"
                                    id="direccionUserSec">
                            </div>
                            <div class="input-item-usuario">

                                <label for="referencia">Referencia:</label>
                                <input
                                    type="text"
                                    id="referenciaUserSec">
                            </div>
                        </div>


                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="cars">Tipo de Documento:</label>
                                <select class="select" name="cars" id="tipoDocumentoUserSec">
                                    <option value="1">Carnet Extranjeria</option>
                                    <option value="2">Documento Nacional de Identidad</option>
                                    <option value="3">Registro Unico de Contribuyente</option>
                                    <option value="4">Otro Documento</option>
                                </select>
                            </div>
                            <div class="input-item-usuario">
                                <label for="numdoc">N° de Documento:</label>
                                <input
                                    type="number"
                                    id="numdocUserSec">
                            </div>
                        </div>


                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="cars">Rol:</label>
                                <select class="select" name="cars" id="tipoRolUserSec">
                                    <option value="4">Empleado</option>
                                    <option value="3">Administrador</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="clave">Contraseña:</label>
                                <input
                                    type="password"
                                    id="claveUserSec">
                            </div>
                            <div class="input-item-usuario">
                                <label for="confirmarClave">Confirmar Contraseña:</label>
                                <input
                                    type="password"
                                    id="confirmarClaveUserSec">
                            </div>
                        </div>
                    </div>


                </form>
            </div>


        </div>

        <!-- Footer con botones de acción -->
        <div class="ventanaUsuarioSecFooter">
            <button id="botonCancelarventanaNuevoUsuarioSec2" class="buttonPrincipal2 ventana-button" style="min-height: 30px; background: var(--color-rojo);">Cancelar</button>
            <button id="btnCrearNuevoUsuarioSec" type="submit" class="buttonPrincipal2 ventana-button" style="min-height: 30px">Registrar</button>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/Usuario/index.blade.php ENDPATH**/ ?>