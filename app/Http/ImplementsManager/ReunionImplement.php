<?php
namespace App\Http\ImplementsManager;

class ReunionImplement{

    function create_reu($conexion, $fecha, $nombre, $descripcion, $id_p){
        $data_reu = [
            'fecha' => $fecha,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'id_parroquia' => $id_p
        ];

        $conexion->table('reuniones')->insert($data_reu);

        return $data_reu;
    }

    function update_reu($conexion, $id, $fecha, $nombre, $descripcion, $id_p){
        $data_reu = [
            'id' => $id,
            'fecha' => $fecha,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'id_parroquia' => $id_p
        ];

        $conexion->table('reuniones')->where('id', $id)->update($data_reu);

        return $data_reu;
    }

    function delete_reu($conexion, $id){
        return $conexion->table('reuniones')->where('id', $id)->delete();
    }

    function getReu($conexion){
        return $conexion->table('reuniones')->get();
    }
}