<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Departamento;
use Illuminate\Database\Seeder;
use App\Models\Municipio;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departamentos = [
            'Antioquia', 'Cundinamarca', 'Valle del Cauca', 'Santander', 'Bolívar'
        ];

        foreach ($departamentos as $dep) {
            $departamento = Departamento::create(['nombre' => $dep]);

            // Agregar 2 municipios por cada departamento
            Municipio::create(['nombre' => $dep . ' - Municipio 1', 'departamento_id' => $departamento->id]);
            Municipio::create(['nombre' => $dep . ' - Municipio 2', 'departamento_id' => $departamento->id]);
        }
    }
}
