<div class="EtiquetaDasboardPrincipal">
    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <div id="cardpagosaldiaInicioIndicatorCircule" style="display: none;">
                <!-- Aquí va el contenido de tu indicador de carga -->
                <?php echo $__env->make('circuleprogressindicator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div id="divPagosDiariosDasboard">
                <label>Prestamos Al Dia</label>
                <h4>S/. <?php echo e($prestamodiario); ?></h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <label>Pagos Diarios</label>
            <h4>S/. <?php echo e($pagodiario); ?></h4>
        </div>
    </div>

    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <label>Prestamo Mensual</label>
            <h4>S/. <?php echo e($prestamomes); ?></h4>
        </div>
    </div>

    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <label>Pago Mensual</label>
            <h4>S/. <?php echo e($pagomes); ?></h4>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/inicio/inicio.blade.php ENDPATH**/ ?>