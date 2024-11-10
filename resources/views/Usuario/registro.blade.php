<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro de Usuario</title>
    @livewireStyles
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans bg-gray-300">

    <!-- Header (fixed) -->
    <header class="w-full h-10 bg-blue-600 fixed top-0 left-0 flex items-center px-4" style="height: 40px;">
        <!-- Actualiza el botón de regresar -->
        <button id="btnregreso" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 320 512">
                <path fill="#ffffff" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/>
            </svg>
        </button>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('btnregreso').addEventListener('click', function (event) {
                    event.preventDefault(); // Evita la acción por defecto del enlace
                    window.location.replace('/login'); // Redirige a la página del login
                });
            });
        </script>
        <h1 class="text-white font-bold">Registro de Usuario</h1>
    </header>

    <!-- Container -->
    <div class="w-full px-0 mt-16">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-4/5 lg:w-full flex shadow-lg">
                <!-- Col (Imagen) -->
                <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-6/12 bg-cover rounded-l-lg" style="background-image: url('https://appcobranza.com/Sistema_Cobranza/Assets/app/bienvinidoempresa.jpg'); object-fit: cover;">
                </div>

                <!-- Col (Formulario - Componente Livewire) -->
                <div class="w-full lg:w-6/12 bg-white rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">CREAR CUENTA!</h3>

                    <!-- Invocar al componente de Livewire -->
                    @livewire('usuario.usuario-principal')
                </div>
            </div>
        </div>
    </div>

    @livewireScripts <!-- Incluir los scripts de Livewire -->
</body>
</html>
