<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    //

    public function login(Request $request) {
        $this->validate($request, [
            'boleta' => 'required',
            'pass' => 'required'
        ]);

        $parametros =  [
            'boleta' => $request->boleta,
            'pass' => $request->pass
        ];

        $peticion = Http::get('http://localhost:3000/usuarios/login', $parametros);
        $respuesta = json_decode($peticion->getBody()->getContents());

        if($respuesta->estatus) {
            
            if($respuesta->registrado) {
                $datos = json_decode(json_encode($respuesta->usuario), true);
                $usuario = new Usuario($datos);

                Auth::login($usuario);

                return redirect(route('notificaciones'));
            }

            return view('auth.register', $parametros);

        }

    }

    public function registro(Request $request) {
        $this->validate($request, [
            'nombre' => 'required'
        ]);

        $data = [
            'boleta' => $request->boleta,
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'programa_id'=> $request->programa,
        ];

        $peticion = Http::post('http://localhost:3000/usuarios/create', $data);
        $respuesta = json_decode($peticion->getBody()->getContents());

        if($respuesta->status) {
            $datos = json_decode(json_encode($respuesta->usuario), true);
            $usuario = new Usuario($datos);

            Auth::login($usuario);

            return redirect(route('notificaciones'));
        }
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }
}
