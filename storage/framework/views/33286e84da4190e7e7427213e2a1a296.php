<div>
    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div id="flash-message" class="bg-green-500 text-white p-2 rounded mb-4">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php if(session()->has('error')): ?>
        <div id="flash-error" class="bg-red-500 text-white p-2 rounded mb-4">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('livewire:load', function() {
                setTimeout(() => {
                    const flashMessage = document.getElementById('flash-message');
                    if (flashMessage) {
                        flashMessage.style.display = 'none';
                    }

                    const flashError = document.getElementById('flash-error');
                    if (flashError) {
                        flashError.style.display = 'none';
                    }
                }, 5000); // Desaparece después de 5 segundos

                // // Escuchar el evento para mostrar el SweetAlert
                // window.addEventListener('usuario-registrado', function () {
                //     Swal.fire({
                //         title: 'Registro Exitoso',
                //         text: 'El usuario ha sido registrado correctamente.',
                //         icon: 'success',
                //         confirmButtonText: 'Aceptar'
                //     }).then((result) => {
                //         if (result.isConfirmed) {
                //             window.location.href = '/login'; // Redirigir al login después de aceptar
                //         }
                //     });
                // });
            });
        </script>

        <!-- Formulario Reactivo Livewire -->
    <form wire:submit.prevent="CrearUsuarioPrincipal" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="nombre">Nombre Completo</label>
            <input
                wire:model.defer="nombre"
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="nombre"
                type="text"
                placeholder="Escriba aquí"
                required
            />

            <label class="block mb-2 text-sm font-bold text-gray-700" for="correo">Correo Electrónico</label>
            <input
                wire:model.defer="correo"
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="correo"
                type="email"
                placeholder="Escriba aquí"
            />

            <label class="block mb-2 text-sm font-bold text-gray-700" for="clave">Contraseña</label>
            <input
                wire:model.defer="clave"
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="clave"
                type="password"
                placeholder="Escriba aquí"
                required
            />

            <label class="block mb-2 text-sm font-bold text-gray-700" for="confirmarClave">Repita la Contraseña</label>
            <input
                wire:model.defer="confirmarClave"
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="confirmarClave"
                type="password"
                placeholder="Escriba aquí"
                required
            />
        </div>

        <div class="mb-6 text-center">
            <button
                type="submit"
                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Registrar Cuenta</span>
                <span wire:loading>Procesando...</span>
            </button>
        </div>
    </form>
</div>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/livewire/usuario/usuario-principal.blade.php ENDPATH**/ ?>