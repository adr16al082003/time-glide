<?php

namespace App\Http\ImplementsManager;

class ClienteImplement{

    /**
     * [Description for create_cliente]
     *
     * @param mixed $conexion
     * @param string $nombre
     * @param integer $ci
     * @param string $ci_i
     * @param string $telf
     * @param string $direccion
     * @param mixed $genero
     * 
     * @return [type]
     * 
     */
    function create_cliente($conexion, $nombre, $ci, $ci_i, $telf, $direccion, $genero){

        $data_cli = [
            'nombre' => $nombre,
            'identificacion' => $ci,
            'identificacion_iso' => $ci_i,
            'telefonos' => $telf,
            'direcciones' => $direccion,
            'genero' => $genero
        ];

        $conexion->table('clientes')->insert($data_cli);

        return $data_cli;
    }

    function update_cliente($conexion, $id, $nombre, $ci, $ci_i, $telf, $direccion, $genero){

        $data_cli = [
            'id' => $id,
            'nombre' => $nombre,
            'identificacion' => $ci,
            'identificacion_iso' => $ci_i,
            'telefonos' => $telf,
            'direcciones' => $direccion,
            'genero' => $genero
        ];

        $conexion->table('clientes')->where('id', $id)->update($data_cli);

        return $data_cli;
    }

    function delete_cliente($conexion, $id){
        return $conexion->table('clientes')->where('id', $id)->delete();
    }
}