@extends('admin.master')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Gestión de Pacientes</h1>
    
    <div class="flex justify-end mb-4">
        <a href="{{ route('employeeAdd') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Agregar Paciente
        </a>
    </div>

    <!-- Contenedor para hacerlo responsive -->
    <div class="overflow-x-auto">
        @if ($pacientes->isEmpty())
            <p class="text-center text-gray-500 py-4">No hay pacientes registrados.</p>
        @else
            <!-- Tabla para pantallas grandes -->
            <table class="hidden md:table min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-200">
                    <tr class="text-left">
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Tipo Documento</th>
                        <th class="px-4 py-2 border">Número Documento</th>
                        <th class="px-4 py-2 border">Nombre</th>
                        <th class="px-4 py-2 border">Género</th>
                        <th class="px-4 py-2 border">Departamento</th>
                        <th class="px-4 py-2 border">Municipio</th>
                        <th class="px-4 py-2 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $loop->iteration + ($pacientes->currentPage() - 1) * $pacientes->perPage() }}</td>
                        <td class="px-4 py-2 border">{{ $paciente->tipoDocumento->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $paciente->numero_documento }}</td>
                        <td class="px-4 py-2 border">{{ $paciente->nombre1 }} {{ $paciente->nombre2 }} {{ $paciente->apellido1 }} {{ $paciente->apellido2 }}</td>
                        <td class="px-4 py-2 border">{{ $paciente->genero ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $paciente->departamento->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $paciente->municipio->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border flex justify-center space-x-2">
                            <a href="" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Editar
                            </a>
                            <form action="" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este paciente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tarjetas para pantallas pequeñas -->
            <div class="md:hidden space-y-4">
                @foreach ($pacientes as $paciente)
                <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-md">
                    <p><strong>#:</strong> {{ $loop->iteration + ($pacientes->currentPage() - 1) * $pacientes->perPage() }}</p>
                    <p><strong>Tipo Documento:</strong> {{ $paciente->tipoDocumento->nombre ?? 'N/A' }}</p>
                    <p><strong>Número Documento:</strong> {{ $paciente->numero_documento }}</p>
                    <p><strong>Nombre:</strong> {{ $paciente->nombre1 }} {{ $paciente->nombre2 }} {{ $paciente->apellido1 }} {{ $paciente->apellido2 }}</p>
                    <p><strong>Género:</strong> {{ $paciente->genero->nombre ?? 'N/A' }}</p>
                    <p><strong>Departamento:</strong> {{ $paciente->departamento->nombre ?? 'N/A' }}</p>
                    <p><strong>Municipio:</strong> {{ $paciente->municipio->nombre ?? 'N/A' }}</p>
                    <div class="mt-2 flex space-x-2">
                        <a href="" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                            Editar
                        </a>
                        <form action="" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este paciente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>


    <!-- Paginación -->
    <div class="mt-4 flex justify-center">
        {{ $pacientes->links() }}
    </div>
</div>
@endsection
