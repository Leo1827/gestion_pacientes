<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $rules = [
            'documento' => 'required|numeric', // Cambiado de email a documento
            'password' => 'required|min:8'
        ];
        $messages = [
            'documento.required' => 'El número de documento es requerido.',
            'documento.numeric' => 'El documento debe ser un valor numérico.',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('message', 'Se ha producido un error')
                ->with('typealert', 'danger');
        }

        // Auth documento
        if (Auth::attempt(['documento' => $request->input('documento'), 'password' => $request->input('password')], true)) {
            return redirect('/admin'); // Redirección a una página general después del login
        } else {
            return back()
                ->with('message', 'Documento o contraseña incorrectos')
                ->with('typealert', 'danger');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/login')->with('message', 'Su usuario fue suspendido.')->with('typealert', 'danger');
    }
}
