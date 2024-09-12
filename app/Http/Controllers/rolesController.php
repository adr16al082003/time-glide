<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ImplementsManager\StatusImplement;
use Illuminate\Support\Facades\DB;


class rolesController extends Controller
{
    private $statusimplement;

    /**
     * controlador de crear
     *
     * @param StatusImplement $statusimplement
     * 
     */
    function __construct(StatusImplement $statusimplement)
    {
        $this->statusimplement = $statusimplement;
    }
    function create_status(Request $request)
    {
        try {
            $res = $this->statusimplement->create_status(DB::connection(), $request->nombre,
            $request->crear, 
            $request->actualizar, 
            $request->eliminar);
        } catch (\Exception $e) {
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    // controlador de actualizar
    function update_status(Request $request){
        try{
            $res = $this->statusimplement->update_status(DB::connection(), $request->id,
            $request->nombre,
            $request->crear,
            $request->actualizar,
            $request->eliminar);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

// controlador de eliminar
    function delete_status($id){
        try{
            $res = $this->statusimplement->delete_status(DB::connection(), $id);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }
}
