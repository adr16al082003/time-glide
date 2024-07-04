<?php

namespace App\Http\ImplementsManager;

class UsuarioImplement
{

    /**
     * para crear usuario craete_user]
     *
     * @param mixed $conexion
     * @param string $nombre_user
     * @param string $user
     * @param string $pass
     * @param int $id_ro
     * 
     * @return array
     * 
     */
    public function crear_usuario($conexion, $nombre_user, $user, $pass, $id_rol)
    {
        $data_user = [
            'nombre' => $nombre_user,
            'usuario' => trim($user),
            'clave' => trim($pass),
            'id_roles' => $id_rol
        ];
        $conexion->table('usuarios')->insert($data_user);

        return $data_user;
    }

    /**
     * actualizzar usuario
     *
     * @param mixed $conexion
     * @param int $id_user
     * @param string $nombre_user
     * @param string $user
     * @param string $pass
     * @param int $id_ro
     * 
     * @return array
     * 
     */
    function update_user($conexion, $id_user, $nombre_user, $user, $pass, $id_rol)
    {
        $data_user = [
            'id' => $id_user,
            'nombre' => $nombre_user,
            'usuario' => trim($user),
            'clave' => trim($pass),
            'id_roles' => $id_rol
        ];

        //* 'id_roles' debería llamarse  'id_rol' modificar columna

        $conexion->table('usuarios')->where('id', $id_user)->update($data_user);

        return $data_user;
    }

    /**
     * borrar usuario
     *
     * @param mixed $conexion
     * @param int $id_user
     * 
     * @return $conexion->table('usuarios')->where('id', $id_user)->delete();     
     * 
     */
    function delete_user($conexion, $id_user)
    {

        return $conexion->table('usuarios')->where('id', $id_user)->delete();
    }

    function getUser($conexion)
    {
        
    return  $conexion->select('SELECT usuarios.id, usuarios.nombre, roles.nombre as cargo FROM `usuarios`
    INNER JOIN roles ON roles.id = usuarios.id_roles');

    }

    /**
     * validar credenciales de los usuario
     *
     * @param mixed $conexion
     * @param mixed $user
     * @param mixed $pass
     * 
     * @return [type]
     * 
     */
    function validateUser($conexion, $user, $pass)
    {
        $user_db = $conexion->selectOne('SELECT usuarios.id, usuarios.nombre, roles.nombre as cargo FROM `usuarios`
        INNER JOIN roles ON roles.id = usuarios.id_roles WHERE usuarios.usuario = :user and usuarios.clave = :clave', [
            'user' => $user,
            'clave' => $pass
        ]);

        if(!empty($user_db)  and  trim($pass) == $user_db->clave) {
            return $user_db;
        } else {
            throw new \Exception("credenciales incorrecta", 400);
        }

    }
}
