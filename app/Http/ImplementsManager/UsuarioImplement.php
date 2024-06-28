<?php 
namespace App\Http\ImplementsManager;

class UsuarioImplement{

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
    public function crear_usuario($conexion, $nombre_user, $user, $pass, $id_rol){
        dump($nombre_user);
        $data_user = [
            'nombre' => $nombre_user,
            'usuario'=> $user,
            'clave' => $pass,
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
    function update_user($conexion, $id_user, $nombre_user, $user, $pass, $id_ro){
        $data_user = [
            'id' => $id_user,
            'nombre' => $nombre_user,
            'usuario'=> $user,
            'clave' => $pass,
            'id_roles' => $id_ro
        ];
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
    function delete_user($conexion, $id_user){
        
        return  $conexion->table('usuarios')->where('id', $id_user)->delete();     
    }


}