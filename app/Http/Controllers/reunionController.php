<?php

namespace App\Http\Controllers;

use App\Http\ImplementsManager\ReunionImplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reunionController extends Controller
{
    private $reunionimplements;

    function __construct(ReunionImplement $reunionimplements){
        $this->reunionimplements = $reunionimplements;
    }

    function create_reu(Request $request){
        try{
            $res = $this->reunionimplements->create_reu(DB::connection(), $request->fecha,
            $request->nombre,
            $request->descripcion);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    function update_reu(Request $request){
        try{
            $res = $this->reunionimplements->update_reu(DB::connection(), $request->id,
            $request->fecha,
            $request->nombre,
            $request->descripcion);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }

    function delete_reu(Request $request){
        try{
        $res = $this->reunionimplements->delete_reu(DB::connection(), $request->id);
        }catch(\Exception $e){
            return $e;
        }
        return response($res, 200)->header('Content-Type', 'application/json');
    }
}
