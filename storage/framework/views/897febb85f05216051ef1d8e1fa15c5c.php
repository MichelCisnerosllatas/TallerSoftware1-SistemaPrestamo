<div id="idtablaprestamoMostrarpagos">
    <!--[if BLOCK]><![endif]--><?php if(count($datosPagosPrestamos) > 0): ?>
        <div class="divtablaPagoprestamo">
            <table class="tabla-pagos">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Pagado</th>
                    <th>Fecha</th>
                </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $datosPagosPrestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $Pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($index + 1); ?></td> <!-- Muestra el índice incrementado -->
                            <td>S/. <?php echo e($Pago['MontoPago']); ?></td>
                            <td><?php echo e($Pago['FechaRegistro']); ?> <?php echo e($Pago['HoraRegistro']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="no-registrosPago">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/nohaypagos.png" alt="Imagen Predeterminada" />
            <h2>No Hay Pagos</h2>
        </div>

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/pagos/tablapagosprestamo.blade.php ENDPATH**/ ?>