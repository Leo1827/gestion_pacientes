<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //Relation
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'tipo_documento_id', 'numero_documento', 'municipio_id', 'fecha_nacimiento'];
    
    public function imagenes() {
        return $this->hasMany(ImagenPaciente::class);
    }
}
