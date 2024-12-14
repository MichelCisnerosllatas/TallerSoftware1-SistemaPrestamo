<div>
    <div id="div_text_tituloPrestamo" class="div_text_tituloPrestamo">
        <div>
            <button id="botonNuevoPrestamo" class="buttonPrincipal2">Nuevo Prestamo</button>
            <input id="txtbuscarprestamo" class="txtbuscarprestamo" type="text" placeholder="Buscar">
            <button wire:submit.prevent="buscarPrestamo" id="btnbuscarPrestamoInicio" type="submit" class="buttonPrincipal1">
                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </button>
            <button id="btnreloadPrestamoInicio" class="buttonPrincipal1">
                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M463.5 224l8.5 0c13.3 0 24-10.7 24-24l0-128c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8l119.5 0z"/></svg>
            </button>
        </div>

        <label>Total: <?php echo e($totalRegistrosPrestamo); ?>, paginas: <?php echo e($totalPaginasPrestamo); ?> </label>

        <div>
            <label>Fila:</label>
            <select id="selectPrestamoFilas" class="select" style="min-width: 60px;">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>

            <button wire:click="decrementPaginaPrestamo" class="buttonPrincipal1">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="8.75" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
            </button>
            <h3><?php echo e($paginaprestamo); ?></h3>
            <button wire:click="incrementPaginaPrestamo" class="buttonPrincipal1">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="8.75" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
            </button>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(count($datosPrestamos) > 0): ?>
        <div class="divtablaPrestamo">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Prestado</th>
                    <th>Fecha Registro</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $datosPrestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $Prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($Prestamo['IdPrestamo']); ?></td>
                        <td><?php echo e($Prestamo['Cliente']); ?></td>
                        <td>
                            <div class="prestamo-detalles">
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Prestado:</span>
                                    <span class="prestamo-valor">S/. <?php echo e($Prestamo['MontoPrestado']); ?></span>
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Interés:</span>
                                    <span class="prestamo-valor"><?php echo e($Prestamo['PorcentajeInteres']); ?>%</span>
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Devolución:</span>
                                    <span class="prestamo-valor"><?php echo e($Prestamo['MontoDevolucion']); ?></span>
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Monto Interés:</span>
                                    <span class="prestamo-valor">S/. <?php echo e($Prestamo['MontoInteres']); ?></span> <!-- Valor por defecto -->
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Monto Cuota:</span>
                                    <span class="prestamo-valor">S/. <?php echo e($Prestamo['MontoCuota']); ?></span> <!-- Valor por defecto -->
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Cuotas Total:</span>
                                    <span class="prestamo-valor"><?php echo e($Prestamo['Cuotas']); ?></span> <!-- Valor por defecto -->
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Cuotas Pagadas:</span>
                                    <span class="prestamo-valor"><?php echo e($Prestamo['CuotasPagadas']); ?></span> <!-- Valor por defecto -->
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Restante:</span>
                                    <span class="prestamo-valor">S/. <?php echo e($Prestamo['MontoRestante']); ?></span> <!-- Valor por defecto -->
                                </div>
                                <div class="prestamo-columna">
                                    <span class="prestamo-clave">Estado:</span>
                                    <span class="prestamo-valor" style="
                                        <?php if($Prestamo['Estado'] == 'Completado'): ?>
                                            color: green;
                                        <?php elseif($Prestamo['Estado'] == 'Eliminado'): ?>
                                            color: var(--color-rojo);
                                        <?php else: ?>
                                            color: var(--color-azul-marino);
                                        <?php endif; ?>
                                    ">
                                        <?php echo e($Prestamo['Estado']); ?>

                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fecha-registro">
                                <div class="fecha-clave">
                                    <span>Fecha: </span>
                                    <span class="prestamo-valor"><?php echo e($Prestamo['FechaRegistro']); ?></span>
                                </div>
                                <div class="hora-clave">
                                    <span>Hora: </span>
                                    <span class="prestamo-valor"><?php echo e($Prestamo['HoraRegistro']); ?></span>
                                </div>
                            </div>
                        </td>
                        <td class="accion-btn">
                            <button id="btnOpcionesPrestamo" class="buttonPrincipal2"
                                    data-Prestamo="<?php echo e(json_encode($Prestamo)); ?>"
                                    data-index="<?php echo e($index); ?>" style="min-width: 30px;">
                                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="20" width="5" viewBox="0 0 128 512">
                                    <path fill="#ffffff" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <div class="no-registrosPrestamo">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgprestamo/nohayprestamo.jpg" alt="Imagen Predeterminada" class="imagen-Prestamo" />
            <h2>No Hay Prestamos</h2>
            <button class="buttonPrincipal2" id="botonNuevoPrestamo1" style="height: 40px;">Nuevo Prestamo</button>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/prestamo/prestamo.blade.php ENDPATH**/ ?>