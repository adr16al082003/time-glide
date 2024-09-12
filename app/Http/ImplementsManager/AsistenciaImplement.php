<?php

namespace App\Http\ImplementsManager;

class AsistenciaImplement {
    
    function create_asis($conexion, $id_c, $id_r){
        $data_asi = [
            'id_cliente' => $id_c,
            'id_reunion' => $id_r,
        ];
        $conexion->table('asistencias')->insert($data_asi);

        return $data_asi;
    }

    function delete_asis($conexion, $id_c, $id_r){
        return $conexion->table('asistencias')->where('id_cliente', $id_c)->where('id_reunion', $id_r)->delete();
    }

    function getAsis($conexion){
        return $conexion->select('SELECT 
        asistencias.id_cliente, 
        clientes.nombre AS nombre,
        clientes.identificacion AS cedula,
        clientes.telefonos AS telefono,
        clientes.genero AS genero,
        asistencias.id_reunion, 
        reuniones.fecha AS fecha,
        reuniones.nombre AS nombre_reunion,
        reuniones.descripcion AS descripcion
    FROM asistencias
    INNER JOIN clientes ON asistencias.id_cliente = clientes.id
    INNER JOIN reuniones ON asistencias.id_reunion = reuniones.id;
    ');
    }
}

