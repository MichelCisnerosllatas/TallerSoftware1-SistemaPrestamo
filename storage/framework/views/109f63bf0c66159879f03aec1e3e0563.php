<div id="tabreciclaje1" class="tab-content-item" style="display: flex; width: 100%">
    <!--[if BLOCK]><![endif]--><?php if(count($clientesReciclados) > 0): ?>
        <div class="divtablaclienteReciclado">
            <table>
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Foto</th>
                    <th>Nombre del Cliente</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $clientesReciclados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td>
                                <!--[if BLOCK]><![endif]--><?php if(!empty($cliente['Imagen'])): ?>
                                    <img src="<?php echo e($cliente['Imagen']); ?>" alt="Imagen Cliente" class="imagen-cliente" />
                                <?php else: ?>
                                    <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/usuarioazul_32.png" alt="Imagen Predeterminada" class="imagen-cliente" />
                                    
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </td>
                            <td><?php echo e($cliente['NombreCliente']); ?></td>
                            <td class="">
                                <button id="btnRestaurarClienteReciclaje" class="btneditarCliente"
                                        data-clienteReciclados="<?php echo e(json_encode($cliente)); ?>"
                                        data-indexReciclado="<?php echo e($index); ?>">
                                    <svg style="pointer-events: none" xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                                </button>

                                <button id="btnEliminarClienteReciclaje" class="btneliminarCliente"
                                        data-clienteReciclados="<?php echo e(json_encode($cliente)); ?>"
                                        data-indexReciclado="<?php echo e($index); ?>">
                                    <svg style="pointer-events: none" xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512">
                                        <path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                    </svg>
                                </button>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="noregistrosClienteReciclaje">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgclientes/nohayclientes.png" alt="Imagen Predeterminada" class="imagen-cliente" />
            <h2>No Hay Cliente Reciclados</h2>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>





<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/reciclaje/cliente-reciclaje.blade.php ENDPATH**/ ?>