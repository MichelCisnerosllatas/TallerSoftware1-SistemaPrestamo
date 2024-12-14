<div>
    <div class="div_text_titulousuario">
        <div>
            
            <button class="buttonPrincipal2" id="botonNuevoUsuarioSec">Nuevo Usuario</button>
            <input class="txtbuscarusuario" id="txtbuscarUsuarioSec" type="text" placeholder="Buscar">
            <button id="btnbuscarUsuarioSec" type="submit" class="buttonPrincipal1">
                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </button>
            <button id="btnreloadUsuarioSec" class="buttonPrincipal1">
                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M463.5 224l8.5 0c13.3 0 24-10.7 24-24l0-128c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8l119.5 0z"/></svg>
            </button>
        </div>

        <div>
            <label>Fila:</label>
            <select id="selectUsuarioSecFilas" class="select" style="min-width: 60px;">
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select>

            <button class="buttonPrincipal1"><</button>
            <button class="buttonPrincipal2">1</button>
            <button class="buttonPrincipal1">></button>
        </div>
    </div>
    <!--[if BLOCK]><![endif]--><?php if(count($usuarios) > 0): ?>
        <div class="divtablausuario">

            <table>
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre del Usuario</th>
                    <th>Rol de Usuario</th>
                    <th>Celular</th>
                    <th>DNI</th>
                    <th>Fecha Registro</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <!--[if BLOCK]><![endif]--><?php if(!empty($usuario['Imagen'])): ?>
                                <img src="<?php echo e($usuario['Imagen']); ?>" alt="Imagen Cliente" class="imagen-usuario" />
                            <?php else: ?>
                                <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/usuarioazul_32.png" alt="Imagen Predeterminada" class="imagen-usuario" />
                                
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td style="text-align: center;"><?php echo e($usuario['NombreCompleto']); ?></td>
                        <td><?php echo e($usuario['Rol']); ?></td>
                        <td> <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $usuario['PersonaCelular']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item['Celular']); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td><?php echo e($usuario['NumDoc']); ?></td>
                        <td style="text-align: center;"><?php echo e($usuario['FechaRegistro']); ?></td>

                        <td style="text-align: center">








                            <button class="btneliminarUsuarioSec" id="btnEliminarUsuarioSec"
                                    datosUsuarios = "<?php echo e(json_encode($usuario)); ?>"
                                    datosUsuariosIndex="<?php echo e($index); ?>">
                                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <div class="no-registrosUsuario">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgclientes/nohayclientes.png" alt="Imagen Predeterminada" class="imagen-usuario" />
            <h2>No Hay Usuarios</h2>
            <br>
            <button id="botonNuevoUsuarioSec" class="buttonPrincipal2" style="height: 40px;">Nuevo Usuario</button>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($mostrarModalUsuario): ?>
        <div class="modal-overlay-usuario">
            <div class="modal-content-usuario">
                <h2>Registro Exitoso</h2>
                <p>HOLA</p>
                <div class="modal-footer-usuario">
                    <button wire:click="cerrarModalUsuarioMant" class="modal-button">Aceptar</button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/usuario/gestion-usuario.blade.php ENDPATH**/ ?>