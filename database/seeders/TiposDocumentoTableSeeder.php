<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class TiposDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoDocumento::create(['nombre' => 'Cédula de Ciudadanía']);
        TipoDocumento::create(['nombre' => 'Tarjeta de identidad']);
    }
}
