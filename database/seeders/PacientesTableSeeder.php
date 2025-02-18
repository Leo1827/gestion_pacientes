<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;
use App\Models\TipoDocumento;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Support\Str;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener registros existentes de las tablas relacionadas
        $tipoDocumento = TipoDocumento::first();
        $departamentos = Departamento::all(); // Obtener todos los departamentos

        if (!$tipoDocumento || $departamentos->isEmpty()) {
            echo "Asegúrate de que existan Tipos de Documento y Departamentos antes de ejecutar este seeder.\n";
            return;
        }

        foreach ($departamentos as $departamento) {
            // Obtener un municipio aleatorio dentro de ese departamento
            $municipio = Municipio::where('departamento_id', $departamento->id)->first();
            
            if (!$municipio) {
                continue; // Si no hay municipios en el departamento, pasar al siguiente
            }

            // Crear 5 pacientes para cada departamento
            for ($i = 1; $i <= 5; $i++) {
                Paciente::create([
                    'nombre1' => 'Paciente' . $i,
                    'nombre2' => 'Segundo' . $i,
                    'apellido1' => 'Apellido' . $i,
                    'apellido2' => 'SegundoApellido' . $i,
                    'genero' => 'Femenino', // Puedes hacer que sea aleatorio entre 'Masculino' y 'Femenino'
                    'tipo_documento_id' => $tipoDocumento->id,
                    'numero_documento' => Str::random(10),
                    'departamento_id' => $departamento->id,
                    'municipio_id' => $municipio->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
