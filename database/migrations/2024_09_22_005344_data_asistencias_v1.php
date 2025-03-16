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
                    ["name" => "Usuario", "view" => true, "create" => true, "update" => true, "delete" => true],
                    ["name" => "Clientes", "view" => true, "create" => true, "update" => true, "delete" => true],
                    ["name" => "Reuniones", "view" => true, "create" => true, "update" => true, "delete" => true],
                    ["name" => "Permisos", "view" => true, "create" => true, "update" => true, "delete" => true],
                    ["name" => "Reporte", "view" => true, "create" => true, "update" => true, "delete" => true],
                ]),
            ],
            [
                "nombre" => "Operador",
                "modules" => json_encode([
                    ["name" => "Usuario", "view" => false, "create" => false, "update" => false, "delete" => false],
                    ["name" => "Clientes", "view" => true, "create" => true, "update" => true, "delete" => false],
                    ["name" => "Reuniones", "view" => true, "create" => true, "update" => true, "delete" => false],
                    ["name" => "Permisos", "view" => false, "create" => false, "update" => false, "delete" => false],
                    ["name" => "Reporte", "view" => true, "create" => true, "update" => true, "delete" => false],
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
