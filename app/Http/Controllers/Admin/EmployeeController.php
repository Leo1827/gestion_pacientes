<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente; 
use App\Models\TipoDocumento;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    // view employee, relation model
    public function getPaciente(){
        $pacientes = Paciente::with(['tipoDocumento', 'departamento', 'municipio'])->paginate(5); 
        return view('admin.paciente.index', compact('pacientes')); 
    }
    // View table pacientes
    public function getAddPaciente(){
        $tiposDocumento = TipoDocumento::all();
        $departamentos = Departamento::all();

        return view('admin.paciente.add', compact('tiposDocumento','departamentos'));
    }
    // Form add pacientes
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
    // Form GET edit pacientes
    public function getEditPaciente($id) {
        $paciente = Paciente::findOrFail($id);
        $tiposDocumento = TipoDocumento::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::where('departamento_id', $paciente->departamento_id)->get();
    
        return view('admin.paciente.edit', compact('paciente', 'tiposDocumento', 'departamentos', 'municipios'));
    }
    // Form POST edit pacientes
    public function postEditPaciente(Request $request, $id) {
        $rules = [
            'tipo_documento_id' => 'required',
            'numero_documento' => 'required',
            'nombre1' => 'required',
            'nombre2' => 'nullable',
            'apellido1' => 'required',
            'apellido2' => 'nullable',
            'genero' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ];
    
        $messages = [
            'tipo_documento_id.required' => 'El tipo de documento es obligatorio',
            'numero_documento.required' => 'El número de documento es obligatorio',
            'nombre1.required' => 'El primer nombre es obligatorio',
            'apellido1.required' => 'El primer apellido es obligatorio',
            'genero.required' => 'El género es obligatorio',
            'departamento_id.required' => 'El departamento es obligatorio',
            'municipio_id.required' => 'El municipio es obligatorio',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->with('message', 'Se ha producido un error')
                ->with('typealert', 'danger')
                ->withInput();
        } else {
            try {
                $paciente = Paciente::findOrFail($id);
                $paciente->tipo_documento_id = $request->input('tipo_documento_id');
                $paciente->numero_documento = e($request->input('numero_documento'));
                $paciente->nombre1 = e($request->input('nombre1'));
                $paciente->nombre2 = e($request->input('nombre2'));
                $paciente->apellido1 = e($request->input('apellido1'));
                $paciente->apellido2 = e($request->input('apellido2'));
                $paciente->genero = $request->input('genero');
                $paciente->departamento_id = $request->input('departamento_id');
                $paciente->municipio_id = $request->input('municipio_id');
    
                if ($paciente->save()) {
                    return back()->with('message', 'Paciente actualizado correctamente')->with('typealert', 'success');
                }
            } catch (\Exception $e) {
                return back()->with('message', 'Error al actualizar paciente: ' . $e->getMessage())->with('typealert', 'danger');
            }
        }
    }
    // Form Delete
    public function pacienteDelete($id){
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return redirect()->back()->with([
                'message' => 'El paciente no existe.',
                'typealert' => 'error'
            ]);
        }

        $paciente->delete();

        return redirect()->route('employee')->with([
            'message' => 'Paciente eliminado correctamente.',
            'typealert' => 'success'
        ]);
    }
    
    
}
