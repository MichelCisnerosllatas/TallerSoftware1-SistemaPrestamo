<div>
    <!--[if BLOCK]><![endif]--><?php if($isAdministrador): ?>
        <div class="card-perfil">
            <div class="card-header-perfil">
                <i class="fas fa-building"></i> Perfil de la Empresa
            </div>
            <!-- Mostrar la empresa específica aquí -->
            <!--[if BLOCK]><![endif]--><?php if($empresa): ?>
                <div class="card-content-perfil">
                    <p><span>Nombre Empresa: </span><?php echo e($empresa->NombreEmpresa); ?></p>
                    <p><span>Identificación: </span><?php echo e($empresa->Identificacion); ?></p>
                    <p><span>Estado:</span>
                        <span class="<?php echo e($empresa->Estado == 'Activo' ? 'estado-activo' : 'estado-inactivo'); ?>">
                             <?php echo e($empresa->Estado); ?>

                    </span></p>
                    <p><span>Fecha Registro: </span><?php echo e($empresa->FechaRegistro); ?></p>
                    <p><span>Fecha Modificada</span><?php echo e($empresa->FechaModifica); ?> ---</p>
                </div>
            <?php else: ?>
                <h1>No hay datos</h1>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php else: ?>
        <!-- Botones de pestañas -->
        <div class="tab-buttons">
            <!--[if BLOCK]><![endif]--><?php if(!$isAdministrador): ?>
                <button
                    wire:click="setTab('list')"
                    class="<?php echo e($activeTab === 'list' ?  'active' : ''); ?>">
                    Listar Empresa
                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if(!$isAdministrador): ?>
                <button
                    wire:click="setTab('create')"
                    class="<?php echo e($activeTab === 'create' ? 'active' : ''); ?>">
                    Crear Empresa
                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($isAdministrador): ?> <!-- Mostrar solo si el usuario es administrador -->
            <button
                wire:click="setTab('perfil')"
                class="<?php echo e($activeTab === 'perfil' ? 'active' : ''); ?>">
                Perfil Empresa
            </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <!-- Contenido dinámico basado en la pestaña activa -->
        <!--[if BLOCK]><![endif]--><?php if($activeTab === 'list'): ?>
            <!-- Vista para Listar Empresa -->
            <div class="content-container">
                <!--[if BLOCK]><![endif]--><?php if(count($datosempresa)>0): ?>
                    <table>
                        <thead>
                        <tr>
                            <th>Tipo Empresa</th>
                            <th>Nombre Empresa</th>
                            <th>Identificación</th>
                            <th>Estado</th>
                            <th>Fecha Registro</th>

                        </tr>
                        </thead>
                        <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $datosempresa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($d['TipoEmpresa']); ?></td>
                                <td><?php echo e($d['NombreEmpresa']); ?></td>
                                <td><?php echo e($d['Identificacion']); ?></td>
                                <td><?php echo e($d['Estado']); ?></td>
                                <td><?php echo e($d['FechaRegistro']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                <?php else: ?>
                    <h1>No hay datos</h1>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php elseif($activeTab === 'create'): ?>

            <div class="content-container1">
                <h2>Crear Nueva Empresa</h2>
                <!-- Mostrar mensajes de éxito o error -->
                <form wire:submit.prevent="InsertarEmpresa">
                    <div class="mb-4">
                        <label for="IdTipoEmpresa">Tipo de Empresa </label>
                        <Select style="width: 100%;" class="select" wire:model="idtipoempresa" id="IdTipoEmpresa" required>
                            <option value="0" selected>Seleccione Tipo</option>
                            <option value="1">Privado</option>
                            <option value="2">Publico</option>
                        </Select>
                        <!--  <input wire:model="idtipoempresa" type="text" id="IdTipoEmpresa" required>  -->
                    </div>
                    <div class="mb-4">
                        <label for="NombreEmpresa">Nombre de la Empresa</label>
                        <input wire:model="nombreempresa" type="text" id="NombreEmpresa" required>
                    </div>
                    <div class="mb-4">
                        <label for="Identificacion" class="block text-sm font-medium">Número de RUC</label>
                        <input wire:model="identificacion" type="text" id="identificacion" required >
                    </div>
                    <button type="submit" wire:loading.attr="disabled">Guardar Empresa</button>
                    <!-- Mostrar mensaje de carga -->
                </form>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<script>
    document.addEventListener('livewire:load', function () {
        // Escuchar el evento 'logout-and-redirect'
        window.addEventListener('logout-and-redirect', function () {
            // Redirigir al login sin historial
            window.location.replace("<?php echo e(route('login')); ?>");
        });
    });
</script>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/empresa/gestionempresa.blade.php ENDPATH**/ ?>