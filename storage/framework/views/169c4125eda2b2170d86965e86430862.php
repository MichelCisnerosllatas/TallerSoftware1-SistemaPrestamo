<div class="dashboardTablaInicio">
    <div class="order">
        <div class="head">
            <h5>(<?php echo e($totalFilasPrestamoPorVencerce); ?>) Prestamos Proximos a Vencerse en <?php echo e($numerodedias); ?> dias</h5>
        </div>

        <!--[if BLOCK]><![endif]--><?php if(count($tablaPrestamoPorVencerce) > 0): ?>
            <table>
                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Fecha Vencimiento</th>
                    <th>Restante</th>
                </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tablaPrestamoPorVencerce; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($prestamo['Cliente']); ?></td>
                            <td><?php echo e($prestamo['FechaPlazo']); ?></td>
                            <td>S/. <?php echo e($prestamo['MontoRestante']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        <?php else: ?>
            <div style="display: flex; justify-content: center">
                <h5>No Hay Prestamo por venserce</h5>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if(count($tablaPrestamoVencimiento) > 0): ?>
        <div class="todo">
            <div class="listTitle">
                <h5>(<?php echo e($totalFilasPrestamoVencimiento); ?>) Prestamos Vencidos</h5>
            </div>

            <ul class="todo-list">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tablaPrestamoVencimiento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php echo e($prestamo['Estado'] == 'completed' ? 'completed' : 'not-completed'); ?>">
                        <div class="list-item-content">
                            <h5><?php echo e($prestamo['Cliente']); ?></h5> <!-- Título del préstamo -->
                            <p>Fecha: <?php echo e($prestamo['FechaPlazo']); ?></p> <!-- Descripción o subtítulo -->
                        </div>

                        <div class="trailing">
                            <h5>S/. <?php echo e($prestamo['MontoRestante']); ?></h5> <!-- Título del préstamo -->
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


    





























</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/inicio/prestamo-vencimiento.blade.php ENDPATH**/ ?>