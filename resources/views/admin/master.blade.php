<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Evita el desbordamiento horizontal */
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 flex">

    @include('admin.layout.sidebar') 

    <!-- Contenido Principal -->
    <div id="content" class="flex-1 min-h-screen transition-all duration-300 md:ml-64">
        @include('admin.layout.header')
        <div class="p-6">@yield('content')</div>
        @include('admin.layout.footer')
    </div>

</body>
</html>

