<?php
namespace App\Http\ImplementsManager;

class StatusImplement{
    /**
     * crea un estatus en la base de dato 
     *
     * @param mixed $conexion
     * @param string $nombre_rol
     * @param boolean $crear
     * @param boolean $actualizar
     * @param boolean $eliminar
     * 
     * @return array
     * 
     */
    public function create_status($conexion, $nombre_rol, $crear, $actualizar, $eliminar)
    {
        $data_rol = [
            'nombre' => $nombre_rol,
            'w' => $crear,
            'r' => $actualizar,
            'd' => $eliminar,
        ];

        $conexion->table('roles')->insert($data_rol);

        return $data_rol;
    }

    /**
     * actualiza los estatus en la base de dato
     *
     * @param mixed $conexion
     * @param int $id_r
     * @param string $nombre_rol
     * @param boolean $crear
     * @param boolean $actualizar
     * @param boolean $eliminar
     * 
     * @return array
     * 
     */
    function update_status($conexion, $id_r, $nombre_rol, $crear, $actualizar, $eliminar)
    {
        $data_rol = [
            'id' => $id_r,
            'nombre' => $nombre_rol,
            'w' => $crear,
            'r' => $actualizar,
            'd' => $eliminar,
        ];
        $conexion->table('roles')->where('id', $id_r)->update($data_rol);

        return $data_rol;
    }

    /**
     * eliminar estatu de la base de dato
     *
     * @param mixed $conexion
     * @param int $id_r
     * 
     * @return $conexion->table('roles')->where('id', $id_r)->delete();
     * 
     */
    function delete_status($conexion, $id_r){
        
        return  $conexion->table('roles')->where('id', $id_r)->delete();     
    }

    /**ver statu de la tabla
     * 
     *
     * @param mixed $conexion
     * 
     * @return $conexion->select()->get();
     * 
     */
    function getStatus($conexion){
        return $conexion->select()->get();
    }

}