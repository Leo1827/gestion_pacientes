<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;
use App\Models\TipoDocumento;
use App\Models\Municipio;
use Illuminate\Support\Str;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tipoDocumento = TipoDocumento::first(); // Tomar el primer tipo de documento
        $municipio = Municipio::first(); // Tomar el primer municipio

        for ($i = 1; $i <= 5; $i++) {
            Paciente::create([
                'nombre' => 'Paciente ' . $i,
                'apellido' => 'Apellido ' . $i,
                'tipo_documento_id' => $tipoDocumento->id,
                'numero_documento' => Str::random(10),
                'municipio_id' => $municipio->id,
                'fecha_nacimiento' => now()->subYears(rand(18, 60))->format('Y-m-d'),
            ]);
        }
    }
}
