<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes'; // Nombre correcto de la tabla

    // Relación con Tipo de Documento
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }


    // Relación con Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    // Relación con Municipio
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}
