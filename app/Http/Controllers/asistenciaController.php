<?php

namespace App\Http\Controllers;

use App\Http\ImplementsManager\AsistenciaImplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class asistenciaController extends Controller
{
    private $asistenciaimplement;

    function __construct(AsistenciaImplement $asistenciaImplement){
        $this->asistenciaimplement = $asistenciaImplement;
    }

    function create_asis(Request $request){
        try{
            $res = $this->asistenciaimplement->create_asis(DB::connection(), $request->id_c,
            $request->id_r);
        }catch(\Exception $e){
            return $e;
        }
        return response($res,200)->header('content-type', 'application/json');
    }

    function delete_asis(Request $request){
        try{
            $this->asistenciaimplement->delete_asis(DB::connection(), $request->id_c,
            $request->id_r);
    }catch(\Exception $e){
        return $e;
    }
    return response(1,200)->header('content-type', 'application/json');
    }

    function getAsis(Request $request){
        try{
            $res = $this->asistenciaimplement->getAsis(DB::connection());
    }catch(\Exception $e){
        return $e;
    }
    return response($res,200)->header('content-type', 'application/json');
    }
}
