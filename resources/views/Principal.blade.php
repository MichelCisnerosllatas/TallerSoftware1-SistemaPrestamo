<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Main Container -->
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-1/5 bg-blue-900 text-white p-4 flex flex-col">
        <!-- Scrollable Sidebar Content -->
        <div class="overflow-y-auto h-full">
            <!-- Menu Section -->
            <h2 class="text-lg font-bold mb-4">Menu</h2>
            <ul class="space-y-2">
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Dashboard</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Clientes</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Préstamos</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Pagos</a></li>
            </ul>

            <!-- Administración Section -->
            <h2 class="text-lg font-bold mt-8 mb-4">Administración</h2>
            <ul class="space-y-2">
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Caja</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Usuarios</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Roles</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Permisos</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Empresa</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-800">Reportes</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-4/5 flex flex-col">
        <!-- Header -->
        <div class="bg-blue-900 text-white p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <button class="rounded-full bg-gray-600 p-2">
                    <!-- Notification Icon -->
                    <span class="material-icons">notifications</span>
                </button>
                <div class="flex items-center space-x-2">
                    <img src="path/to/profile-pic.jpg" alt="User Image" class="w-8 h-8 rounded-full">
                    <span>Michel Cisneros</span>
                </div>
            </div>
        </div>

        <!-- Scrollable Main Content -->
        <div class="p-8 overflow-y-auto h-full">
            <div class="border-2 border-blue-500 rounded-lg h-full">
                <!-- Aquí va el contenido dinámico -->
            </div>
        </div>
    </div>
</div>

</body>
</html>
