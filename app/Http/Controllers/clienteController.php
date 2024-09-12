<?php

namespace App\Http\Controllers;

use App\Http\ImplementsManager\ClienteImplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clienteController extends Controller
{
    
    private $clienteimplement;
    public function __construct(ClienteImplement $clienteimplement){
        $this->clienteimplement = $clienteimplement;
    }

    function create_cliente(Request $request){
        try{
            $res = $this->clienteimplement->create_cliente(DB::connection(),$request->nombre,
            $request->ci,
            $request->ci_i,
            $request->telf,
            $request->direccion,
            $request->genero);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    function update_cliente(Request $request){
        try{
            $res = $this->clienteimplement->update_cliente(DB::connection(), $request->id,
            $request->nombre,
            $request->ci,
            $request->ci_i,
            $request->telf,
            $request->direccion,
            $request->genero);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    function delete_cliente($id){
        try{
            $res = $this->clienteimplement->delete_cliente(DB::connection(),$id);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    function getCliente(Request $request){
        try{
            $res = $this->clienteimplement->getCliente(DB::connection());
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('content-type', 'application/json');
    }

    function validateCli(Request $request){
        try{
            $this->clienteimplement->validateCli(DB::connection(), $request->ci);
        }catch(\Exception $e){
            return $e;
        }
        return response(1, 200)->header('content-type', 'application/json');
    }

}
