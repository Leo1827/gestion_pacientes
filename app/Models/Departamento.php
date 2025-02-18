<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    // Relation
    use HasFactory;
    protected $fillable = ['nombre'];

    public function municipios() {
        return $this->hasMany(Municipio::class);
    }
}
