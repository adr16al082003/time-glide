<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ImplementsManager\UsuarioImplement;
use Illuminate\Support\Facades\DB;

//!los nombres de las clases son en mayúscula  'UserController'
class userController extends Controller
{
    private $userimplements;

    function __construct(UsuarioImplement $userimplements)
    {
        $this->userimplements = $userimplements;
    }

    
    /**
     * crea el usuario
     *
     * @param Request $request
     * 
     * @return array
     * 
     */
    function crear_usuario(Request $request){
        try {
            $res = $this->userimplements->crear_usuario(DB::connection(), $request->nombre,
            $request->user,
            $request->pass,
            $request->id_rol);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    /**
     *Actualiza un usuario
     *
     * @param Request $request
     * 
     * @return array
     * 
     */
    function update_user(Request $request){
        try {
            $res = $this->userimplements->update_user(DB::connection(), $request->id, 
            $request->nombre,
            $request->user,
            $request->pass,
            $request->id_rol);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    /**
     *Elimina un usuario
     *
     * @param Request $request
     * 
     * @return number
     * 
     */
    function delete_user(Request $request){
        try{
            $res = $this->userimplements->delete_user(DB::connection(),$request->id);
    }catch(\Exception $e){
        return $e;
    }
        return response($res, 200)->header('Content-Type', 'application/json');

    }
}
