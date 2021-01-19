<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Grupo;
use App\Models\Usuario;

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
        $peticion = Http::post('http://localhost:3000/grupos/create',["nombre"=>$req->input("nombre"),"descripcion"=>$req->input("descripcion")]);
        return redirect("/agrupamientos");
    }

    public function deleteGrupo(){
        $peticion = Http::delete('http://localhost:3000/grupos/delete',["id"=>Route::current()->parameter("id") ]);
        $respuesta = json_decode($peticion->getbody()->getContents());
        return redirect("/agrupamientos");
    }


    public function deleteUsuario(){
        $peticion = Http::delete('http://localhost:3000/usuarios/delete',[Route::current()->getParameter("id")]);
        $respuesta = json_decode($peticion->getbody()->getContents());
    }
}
