<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Inicio de Sesión</h2>
        <form class="mt-4" method="POST" action="{{ url('/login') }}">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-600">Documento</label>
                <input type="text" name="documento" required class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-600">Contraseña</label>
                <input type="password" name="password" required class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
            </div>
            <button type="submit" class="w-full px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Ingresar</button>
        </form>
    </div>
</body>
</html>