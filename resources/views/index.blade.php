<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Pacientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen px-6">
    
    <!-- Contenedor principal -->
    <div class="text-center max-w-3xl">
        <h1 class="text-4xl font-bold text-blue-600">Gestión de Pacientes</h1>
        <p class="mt-4 text-lg text-gray-700">
            Un sistema diseñado para administrar el registro de pacientes de manera eficiente. 
            Permite gestionar información como nombre, documento, género y ubicación, además de 
            ofrecer un inicio de sesión seguro basado en documento y clave.
        </p>

        <!-- Sección de funcionalidades -->
        <div class="mt-8 grid md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-blue-500">📋 CRUD de Pacientes</h2>
                <p class="text-gray-600 mt-2">Registra, edita, elimina y consulta la información de los pacientes fácilmente.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-green-500">📍 Ubicación por Departamentos</h2>
                <p class="text-gray-600 mt-2">Los municipios se cargan dinámicamente según el departamento seleccionado.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-yellow-500">🔐 Inicio de Sesión Seguro</h2>
                <p class="text-gray-600 mt-2">Acceso con documento y clave para garantizar la seguridad de la información.</p>
            </div>
        </div>

        <!-- Botón para acceder al sistema -->
        <div class="mt-8">
            <a href="{{ route('login') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-semibold transition">
               Acceder al Sistema
            </a>
        </div>
    </div>

</body>
</html>
