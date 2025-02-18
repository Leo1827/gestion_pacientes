<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenPaciente extends Model
{
    //Relation
    use HasFactory;
    protected $fillable = ['nombre_imagen', 'paciente_id'];
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
}
