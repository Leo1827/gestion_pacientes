@extends('admin.master')

@section('content')
<div class="container mx-auto p-6">
    
    <!-- Mensaje de éxito -->
    <div id="mensaje" class="hidden mt-4 p-4 bg-green-500 text-white rounded"></div>
    
    <h1 class="text-2xl mb-4 font-bold">Agregar Paciente</h1>

    <form id="formPaciente" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Tipo de documento -->
            <div>
                <label class="block">Tipo de Documento:</label>
                <select name="tipo_documento_id" id="tipo_documento" class="w-full border p-2 rounded">
                    <option value="">Seleccione...</option>
                    @foreach($tiposDocumento as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Número de documento -->
            <div>
                <label class="block">Número de Documento:</label>
                <input type="text" name="numero_documento" class="w-full border p-2 rounded">
            </div>

            <!-- Nombre 1 -->
            <div>
                <label class="block">Primer Nombre:</label>
                <input type="text" name="nombre1" class="w-full border p-2 rounded">
            </div>

            <!-- Nombre 2 -->
            <div>
                <label class="block">Segundo Nombre:</label>
                <input type="text" name="nombre2" class="w-full border p-2 rounded">
            </div>

            <!-- Apellido 1 -->
            <div>
                <label class="block">Primer Apellido:</label>
                <input type="text" name="apellido1" class="w-full border p-2 rounded">
            </div>

            <!-- Apellido 2 -->
            <div>
                <label class="block">Segundo Apellido:</label>
                <input type="text" name="apellido2" class="w-full border p-2 rounded">
            </div>

            <!-- Género -->
            <div>
                <label class="block">Género:</label>
                <select name="genero" class="w-full border p-2 rounded">
                    <option value="">Seleccione...</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">No Binario</option>
                    <option value="4">Otro</option>
                    <option value="5">Prefiero no decirlo</option>
                </select>
            </div>


            <!-- Departamento -->
            <div>
                <label class="block">Departamento:</label>
                <select name="departamento_id" id="departamento" class="w-full border p-2 rounded">
                    <option value="">Seleccione...</option>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Municipio -->
            <div>
                <label class="block">Municipio:</label>
                <select name="municipio_id" id="municipio" class="w-full border p-2 rounded">
                    <option value="">Seleccione un departamento primero...</option>
                </select>
            </div>
        </div>

        <!-- Botón -->
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Guardar Paciente
            </button>
        </div>
    </form>

</div>

<script>
    document.getElementById('departamento').addEventListener('change', function() {
        let departamentoId = this.value;
        let municipioSelect = document.getElementById('municipio');
        municipioSelect.innerHTML = '<option value="">Cargando...</option>';

        fetch(`/admin/municipios/${departamentoId}`)
            .then(response => response.json())
            .then(data => {
                console.log("Municipios recibidos:", data);
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

    // Add paciente
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("formPaciente").addEventListener("submit", function (e) {
            e.preventDefault(); // Evita que el formulario se envíe normalmente

            let formData = new FormData(this);

            fetch("{{ url('/admin/paciente/add') }}", {  // <----- URL corregida
                method: "POST",
                headers: {
                    "Accept": "application/json"  // <---- Indicar a Laravel que queremos JSON
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("mensaje").innerText = data.message;
                    document.getElementById("mensaje").classList.remove("hidden");
                    document.getElementById("mensaje").classList.add("bg-green-500", "text-white", "p-4", "rounded");

                    // Limpiar formulario
                    document.getElementById("formPaciente").reset();
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch(error => console.error("Error en la petición:", error));
        });
    });
</script>
>
@endsection
