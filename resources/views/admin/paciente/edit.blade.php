@extends('admin.master')

@section('content')
<div class="container mx-auto p-6">
    
    <!-- Mensajes de éxito o error -->
    @if(Session::has('message'))
        <div class="p-4 mb-4 rounded text-white 
            @if(Session::get('typealert') == 'success') bg-green-500 @elseif(Session::get('typealert') == 'error') bg-red-500 @else bg-yellow-500 @endif">
            {{ Session::get('message') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold text-center mb-6">Editar Paciente</h1>

    <form action="/admin/paciente/{{ $paciente->id }}/edit" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Tipo de documento -->
            <div>
                <label class="block font-medium text-gray-700">Tipo de Documento:</label>
                <select name="tipo_documento_id" id="tipo_documento" class="w-full border p-3 rounded">
                    <option value="">Seleccione...</option>
                    @foreach($tiposDocumento as $tipo)
                        <option value="{{ $tipo->id }}" {{ $paciente->tipo_documento_id == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Número de documento -->
            <div>
                <label class="block font-medium text-gray-700">Número de Documento:</label>
                <input type="text" name="numero_documento" value="{{ $paciente->numero_documento }}" 
                    class="w-full border p-3 rounded focus:ring focus:ring-blue-300">
            </div>

            <!-- Nombre 1 -->
            <div>
                <label class="block font-medium text-gray-700">Primer Nombre:</label>
                <input type="text" name="nombre1" value="{{ $paciente->nombre1 }}" 
                    class="w-full border p-3 rounded focus:ring focus:ring-blue-300">
            </div>

            <!-- Nombre 2 -->
            <div>
                <label class="block font-medium text-gray-700">Segundo Nombre:</label>
                <input type="text" name="nombre2" value="{{ $paciente->nombre2 }}" 
                    class="w-full border p-3 rounded focus:ring focus:ring-blue-300">
            </div>

            <!-- Apellido 1 -->
            <div>
                <label class="block font-medium text-gray-700">Primer Apellido:</label>
                <input type="text" name="apellido1" value="{{ $paciente->apellido1 }}" 
                    class="w-full border p-3 rounded focus:ring focus:ring-blue-300">
            </div>

            <!-- Apellido 2 -->
            <div>
                <label class="block font-medium text-gray-700">Segundo Apellido:</label>
                <input type="text" name="apellido2" value="{{ $paciente->apellido2 }}" 
                    class="w-full border p-3 rounded focus:ring focus:ring-blue-300">
            </div>

            <!-- Género -->
            <div>
                <label class="block font-medium text-gray-700">Género:</label>
                <select name="genero" class="w-full border p-3 rounded">
                    <option value="">Seleccione...</option>
                    <option value="1" {{ $paciente->genero == 1 ? 'selected' : '' }}>Masculino</option>
                    <option value="2" {{ $paciente->genero == 2 ? 'selected' : '' }}>Femenino</option>
                    <option value="3" {{ $paciente->genero == 3 ? 'selected' : '' }}>No Binario</option>
                    <option value="4" {{ $paciente->genero == 4 ? 'selected' : '' }}>Otro</option>
                    <option value="5" {{ $paciente->genero == 5 ? 'selected' : '' }}>Prefiero no decirlo</option>
                </select>
            </div>

            <!-- Departamento -->
            <div>
                <label class="block font-medium text-gray-700">Departamento:</label>
                <select name="departamento_id" id="departamento" class="w-full border p-3 rounded">
                    <option value="">Seleccione...</option>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" {{ $paciente->departamento_id == $departamento->id ? 'selected' : '' }}>
                            {{ $departamento->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Municipio -->
            <div>
                <label class="block font-medium text-gray-700">Municipio:</label>
                <select name="municipio_id" id="municipio" class="w-full border p-3 rounded">
                    <option value="">Seleccione un departamento primero...</option>
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}" {{ $paciente->municipio_id == $municipio->id ? 'selected' : '' }}>
                            {{ $municipio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Botón -->
        <div class="mt-6 flex justify-center">
            <button type="submit" class="w-full md:w-auto bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition">
                Actualizar Paciente
            </button>
        </div>
    </form>

</div>

<script>
    // El municipio carga con el departamento
    document.getElementById('departamento').addEventListener('change', function() {
        let departamentoId = this.value;
        let municipioSelect = document.getElementById('municipio');
        municipioSelect.innerHTML = '<option value="">Cargando...</option>';

        fetch(`/admin/municipios/${departamentoId}`)
            .then(response => response.json())
            .then(data => {
                // console.log("Municipios recibidos:", data); Json de municipios en consola
                municipioSelect.innerHTML = '<option value="">Seleccione...</option>';
                data.forEach(municipio => {
                    municipioSelect.innerHTML += `<option value="${municipio.id}">${municipio.nombre}</option>`;
                });
            })
            .catch(error => {
                console.error('Error cargando municipios:', error);
                municipioSelect.innerHTML = '<option value="">Error al cargar</option>';
            });
    });
</script>
    
@endsection
