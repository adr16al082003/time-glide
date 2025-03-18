<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DataAsistenciasV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Datos de roles
        DB::table('roles')->insert([
            [
                "nombre" => "Administrador",
                "modules" => json_encode([
                    [ "id"=>1, "name" => "Usuario", "view" => true, "create" => true, "update" => true, "delete" => true],
                    [ "id"=>2, "name" => "Clientes", "view" => true, "create" => true, "update" => true, "delete" => true],
                    [ "id"=>3, "name" => "Reuniones", "view" => true, "create" => true, "update" => true, "delete" => true],
                    [ "id"=>4, "name" => "Permisos", "view" => true, "create" => true, "update" => true, "delete" => true],
                    [ "id"=>5, "name" => "Reporte", "view" => true, "create" => true, "update" => true, "delete" => true],
                ]),
            ],
            [
                "nombre" => "Operador",
                "modules" => json_encode([
                    [ "id"=>1, "name" => "Usuario", "view" => false, "create" => false, "update" => false, "delete" => false],
                    [ "id"=>2, "name" => "Clientes", "view" => true, "create" => true, "update" => true, "delete" => false],
                    [ "id"=>3, "name" => "Reuniones", "view" => true, "create" => true, "update" => true, "delete" => false],
                    [ "id"=>4, "name" => "Permisos", "view" => false, "create" => false, "update" => false, "delete" => false],
                    [ "id"=>5, "name" => "Reporte", "view" => true, "create" => true, "update" => true, "delete" => false],
                ]),   
            ],
        ]);


        //Data de usuarios
        DB::table('usuarios')->insert([
            [
                "nombre" => "Usuario Master",
                "usuario" => "admin",
                "clave" => "admin",
                "id_roles" => 1
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::table('roles')->truncate();
        DB::table('usuarios')->truncate();
    }
}
