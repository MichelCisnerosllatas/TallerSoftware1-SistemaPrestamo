<div class="contenido_Empresa">
    <!-- <h3>Yo Soy EMPRESA</h3> -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('empresa.gestionempresa');

$__html = app('livewire')->mount($__name, $__params, 'lw-2792120737-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/Empresa/index.blade.php ENDPATH**/ ?>