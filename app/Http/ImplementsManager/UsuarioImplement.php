<?php

namespace App\Http\ImplementsManager;

use Mockery\Undefined;

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
        $data_user['id'] = $conexion->table('usuarios')->insertGetId($data_user);

        return $this->getUser($conexion, $data_user['clave'], $data_user['usuario']);
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

        return $this->getUser($conexion, $data_user['clave'], $data_user['usuario']);
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

    /**
     * obtener usuario o todos los usuarios
     * 
     * @param mixed $conexion
     * @param string|null $clave
     * @param string|null $user
     * 
     * @return object|array
     * 
     * si no se envian parametros se obtiene todos los usuarios de lo contrario
     * solo se devuelve el usuario que coincide con los parametros de busqueda
     * 
     */
    function getUser($conexion, $clave = null, $user = null):array
    {
        //* query para obtener todos los usuarios
        $query = "SELECT
        usuarios.id,
        usuarios.nombre,
        usuarios.usuario,
        usuarios.clave,
        roles.nombre as cargo,
        roles.id as id_rol,
        JSON_OBJECT(
            'create', IF(roles.w = 1, 'true', 'false'),
            'edit', IF(roles.r = 1, 'true', 'false') ,
             'delete',IF(roles.d = 1, 'true', 'false')
        ) as permissions
        FROM usuarios
        INNER JOIN roles ON roles.id = usuarios.id_roles";

        //*valores para la busqueda , se evita injection sql 
        $values = [];

        //Se valida que sea difrete a null para concatenar el where de la consulta y llenar el arreglo
        if (!empty($clave) and !empty($user)) {
            $query .= " WHERE usuarios.clave = :clave and usuarios.usuario = :user";
            $values = ['clave' => $clave, 'user' => $user];
        }

        //Guardamos el resultado de la consulta 
        $users =  $conexion->select($query, $values);

        foreach ($users as $key => $value) {
            $users[$key]->permissions = json_decode($users[$key]->permissions);
        }

        return $users;
    }

    /**
     * validar credenciales de los usuario
     *
     * @param mixed $conexion
     * @param string $user
     * @param string $pass
     * 
     * @return object
     * 
     */
    function validateUser($conexion, $user, $clave)
    {
        $user_db =  $this->getUser($conexion, $clave, $user);

        if (count($user_db) > 0   and  trim($clave) == $user_db[0]->clave) {
            //encintamos la clave 
            $user_db[0]->clave = hash('sha256', $user_db[0]->clave);

            return $user_db[0];
        } else {
            throw new \Exception("credenciales incorrecta", 400);
        }
    }
}
