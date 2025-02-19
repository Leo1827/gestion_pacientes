@extends('admin.master')

@section('content')
<div class="container mx-auto p-6">
    
    <!-- Tarjeta de bienvenida -->
    <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold">👋 ¡Bienvenido, {{ Auth::user()->name }}!</h1>
        <p class="mt-2 text-lg">Estás en el panel de administración del sistema de gestión de pacientes.</p>
    </div>

    

</div>
@endsection
