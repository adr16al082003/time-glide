<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\ImplementsManager\UsuarioImplement;
use Illuminate\Support\Facades\DB;


class userController extends Controller
{
    private $userimplements;
    function __construct(UsuarioImplement $userimplements)
    {
        $this->userimplement = $userimplements;
    }
    function crear_usuario(Request $request){
        try {
            $res = $this->userimplements->crear_usuario(DB::connection(), $request->nombre,
            $request->user,
            $request->pass,
            $request->id_rol);
        }catch(\Exception $e){
            dump($e);
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    //controlador de actualizar
    function update_user(Request $request){
        try {
            $res = $this->userimplements->create_user(DB::connection(), $request->id, 
            $request->nombre,
            $request->user,
            $request->pass,
            $request->id_ro);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    //controlador de eliminar

    function delete_user(Request $request){
        try{
            $res = $this->userimplements->delete_user(DB::connection(),$request->id);
    }catch(\Exception $e){
        return $e;
    }
        return response($res, 200)->header('Content-Type', 'application/json');

    }
}
