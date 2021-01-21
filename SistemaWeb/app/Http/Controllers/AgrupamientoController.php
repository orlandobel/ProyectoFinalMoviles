<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Grupo;
use App\Models\Usuario;
use Illuminate\Support\Facades\Redirect;

class AgrupamientoController extends Controller
{
    public function index(){
        $grupos = $this->getGrupos();
        $usuarios = $this->getUsuarios();

        $array = ['grupos'=>$grupos,'usuarios'=>$usuarios];
        return view("agrupamientos",$array);
    }

    public function getGrupos(){
        $grupos = [];
        $peticion = Http::get('http://localhost:3000/grupos/');

        $respuesta = json_decode($peticion->getbody()->getContents());
        if($respuesta -> estatus){
            foreach($respuesta->grupos as $datos){
                $dgrupo = json_decode(json_encode($datos), true);
                $grupo = new Grupo($dgrupo);
                $grupos[]=$grupo;
            }
        }
        return $grupos;
    }

    public function getUsuarios(){
        $usuarios = [];
        $peticion = Http::get('http://localhost:3000/usuarios/');

        $respuesta = json_decode($peticion->getbody()->getContents());
        if($respuesta -> status){
            foreach($respuesta->usuarios as $datos){
                $dusuario = json_decode(json_encode($datos), true);
                $usuario = new Usuario($dusuario);
                $usuarios[]=$usuario;
            }
        }
        return $usuarios;
    }

    public function createGrupo(Request $req){
        $sendData = [
            'nombre' => $req->nombre,
            'descripcion' => $req->descripcion
        ];
        $peticion = Http::post('http://localhost:3000/grupos/create',$sendData);
        $respuesta = json_decode($peticion);

        if($respuesta->estatus)
            return redirect(route('agrupamientos'));

        return Redirect::back()->whitErrors([$respuesta->mensaje]);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'nombre_editar' => 'required',
            'descripcion_editar' => 'required'
        ]);

        $sendData = [
            'grupo_id' => $request->id_editar,
            'nombre' => $request->nombre_editar,
            'descripcion' => $request->descripcion_editar
        ];

        $peticion = Http::put('http://localhost:3000/grupos/update', $sendData);
        $respuesta = json_decode($peticion);

        if($respuesta->estatus) 
            return redirect(route('agrupamientos'));

        return Redirect::back()->withErrors([$respuesta->mensaje]);
    }

    public function deleteGrupo($id){

        $peticion = Http::delete('http://localhost:3000/grupos/delete',["id"=>$id ]);
        $respuesta = json_decode($peticion->getbody()->getContents());

        if($respuesta->estatus)
            return redirect(route('agrupamientos'));

        return Redirect::back()->whitErrors([$respuesta->mensaje]);
    }


    public function deleteUsuario($id){
        $peticion = Http::delete('http://localhost:3000/usuarios/delete',[$id]);
        $respuesta = json_decode($peticion->getbody()->getContents());
        
        if($respuesta->estatus)
            return redirect(route('agrupamientos'));

        return Redirect::back()->whitErrors([$respuesta->mensaje]);
    }
}
