<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    //Relation
    use HasFactory;
    protected $table = 'tipos_documento'; // Asegurar que sea el nombre correcto
    protected $fillable = ['nombre'];
}
