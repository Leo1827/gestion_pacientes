<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente; 
use App\Models\TipoDocumento;
use App\Models\Departamento;

class EmployeeController extends Controller
{
    // view employee, relation model
    public function getPaciente(){
        $pacientes = Paciente::with(['tipoDocumento', 'departamento', 'municipio'])->paginate(5); 
        return view('admin.paciente.index', compact('pacientes')); 
    }

    public function getAddPaciente(){
        $tiposDocumento = TipoDocumento::all();
        $departamentos = Departamento::all();

        return view('admin.paciente.add', compact('tiposDocumento','departamentos'));
    }

    public function postAddPaciente(Request $request){
        // Validar los datos recibidos
        $request->validate([
            'tipo_documento_id' => 'required',
            'numero_documento' => 'required',
            'nombre1' => 'required',
            'nombre2' => 'nullable',
            'apellido1' => 'required',
            'apellido2' => 'nullable',
            'genero' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ]);

        try {
            // Crear nuevo paciente
            $paciente = new Paciente();
            $paciente->tipo_documento_id = $request->tipo_documento_id;
            $paciente->numero_documento = $request->numero_documento;
            $paciente->nombre1 = $request->nombre1;
            $paciente->nombre2 = $request->nombre2;
            $paciente->apellido1 = $request->apellido1;
            $paciente->apellido2 = $request->apellido2;
            $paciente->genero = $request->genero;
            $paciente->departamento_id = $request->departamento_id;
            $paciente->municipio_id = $request->municipio_id;
            $paciente->save();

            return response()->json([
                'success' => true,
                'message' => 'Paciente agregado correctamente',
                'paciente' => $paciente
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al agregar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    
}
