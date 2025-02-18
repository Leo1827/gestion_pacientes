<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente; 

class EmployeeController extends Controller
{
    // view employee, relation model
    public function getPaciente(){
        $pacientes = Paciente::with(['tipoDocumento', 'departamento', 'municipio'])->paginate(5); 
        return view('admin.paciente.index', compact('pacientes')); 
    }

    public function getAddPaciente(){
        return view('admin.paciente.add');
    }
}
