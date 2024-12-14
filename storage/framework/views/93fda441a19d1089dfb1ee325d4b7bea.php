<div class="content-container-perfil1">
    <!--[if BLOCK]><![endif]--><?php if($isAdministrador): ?>
        <div class="card-perfil">
            <div class="card-header1">
                <i class="fas fa-building"></i> Perfil del Usuario
            </div>
            <div class="card-content1">
                <p><span>Nombre Completo: </span><?php echo e($usuario['NombreCompleto']); ?></p>
                <p><span>Rol: </span><?php echo e($usuario['Rol']); ?></p>
                <p><span>Correo: </span><?php echo e($usuario['Correo']); ?></p>
                <p><span>Documento: </span><?php echo e(isset($usuario['NumDoc']) && $usuario['NumDoc'] !== '' ? $usuario['NumDoc'] : 'No asignado'); ?></p>
                <p><span>Estado: </span>
                    <span class="<?php echo e($usuario['Estado'] == 'Activo' ? 'estado-activo' : 'estado-inactivo'); ?>">
                        <?php echo e($usuario['Estado']); ?>

                    </span>
                </p>
                <p><span>Fecha Registro: </span><?php echo e($usuario['FechaRegistro']); ?></p>
                <p><span>Fecha Modificada: </span><?php echo e(isset($usuario['FechaModifica']) && $usuario['FechaModifica'] !== '' ? $usuario['FechaModifica'] :'No modificado'); ?></p>
            </div>
        </div>
    <?php else: ?>
        <h1>Error: Usuario no autorizado</h1>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/usuario/perfil-usuario.blade.php ENDPATH**/ ?>