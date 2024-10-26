<?php

namespace App\Http\ImplementsManager;

class ParroquiaImplement{

    /**
     * implemento para listar parroquia
     * @param mixed $conexion
     * @return mixed
     */
    function getParroquia($conexion){
        return $conexion->table('parroquia')->get();
    }

}