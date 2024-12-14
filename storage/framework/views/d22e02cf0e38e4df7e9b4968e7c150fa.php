<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/Login.js'); ?>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col md:flex-row justify-between items-center w-full md:w-2/3 lg:w-1/2">
        <!-- Logo -->
        <div class="mb-6 md:mb-0">
            <img src="<?php echo e(asset('imagenes/Sistema/logoazul.png')); ?>" alt="Logo Cobranzapp" class="w-24 md:w-60">
        </div>

        <div class="w-full md:w-3/5">
            <h2 class="text-2xl font-semibold text-center mb-6">Inicio de Sesion</h2>

            <!-- Mensaje de Error -->
            <div id="error-messages"></div>

            <!-- Formulario de inicio de sesión -->
            <form id="login-form" method="POST" class="space-y-4">
                <input type="email" name="login" placeholder="Correo electronico" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="password" name="clave" placeholder="Contraseña" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="w-full py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 cursor-pointer transition duration-200">
                    ENTRAR
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="#" class="text-blue-500 hover:underline">Olvidastes tu contraseña?</a>
            </div>

            <div class="text-center mt-2">
                <span>No tienes Cuenta?
                    <a href="<?php echo e(route('registrousuario')); ?>" id="registro-enlace" class="text-blue-500 hover:underline">
                        Registrate aqui
                    </a>
                </span>
            </div>





        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/login.blade.php ENDPATH**/ ?>