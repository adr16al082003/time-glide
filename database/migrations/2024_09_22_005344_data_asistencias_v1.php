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
        //Date de roles
        DB::table('roles')->insert([
            [
                "nombre" => "Administrador",
                "w" => 1,
                "r" => 1,
                "d" => 1
            ],
            [
                "nombre" => "Recepcionista",
                "w" => 1,
                "r" => 1,
                "d" => 0
            ]
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
