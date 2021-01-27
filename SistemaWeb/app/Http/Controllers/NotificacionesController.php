<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use App\Models\Notificacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class NotificacionesController extends Controller
{
    //
    public function index() {
        $notificaciones = $this->getNotificaciones();
        $grupos = $this->getGrupos();
        
        $array = [
            'notificaciones' => $notificaciones,
            'grupos' => $grupos,
        ];

        return view('notifications', $array);
    }
    
    public function getNotificaciones()
    {
        $notificaciones = [];
        $peticion = Http::get('http://localhost:3000/notificaciones/', [
            'usuario_id' => Auth::user()->id,
        ]);

        $respuesta = json_decode($peticion->getBody()->getContents());

        if ($respuesta->estatus) {
            foreach ($respuesta->notificaciones as $n) {
                $datos = Json_decode(json_encode($n), true);

                $fecha = Carbon::parse($datos['created_at']);
                $datos['fecha'] = $fecha->format('d/m/Y');

                $notificacion = new Notificacion($datos);
                $notificaciones[] = $notificacion;
            }
        }
        //dd($notificaciones);
        return $notificaciones;
    }

    public function getGrupos() {
        $grupos = [];
        $peticion = Http::get('http://localhost:3000/grupos/');
        $respuesta = json_decode($peticion->getBody()->getContents());

        if($respuesta->estatus) {
            foreach($respuesta->grupos as $g) {
                $grupo = [$g->id => $g->nombre];
                $grupos[] = $grupo;
            }
        }

        return $grupos;
    }

    public function enviar(Request $request) {
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        $sendData = [
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'grupo_id' => $request->grupo
        ];

        $peticion = Http::post('http://localhost:3000/notificaciones/', $sendData);
        $respuesta = json_decode($peticion);

        if($respuesta->estatus) {
            return redirect(route('notificaciones'));
        } 

        return Redirect::back()->withErrors([$respuesta->mensaje]);
    }
}
