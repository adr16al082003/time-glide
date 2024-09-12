<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asistenciasv1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ROLES 
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 300)->nullable(false);
            $table->boolean('w')->comment('para crear');
            $table->boolean('r')->comment('leer');
            $table->boolean('d')->comment('borrar');
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 300)->nullable(false);
            $table->string('usuario', 300)->nullable(false);
            $table->string('clave', 500)->unique()->nullable(false);

            $table->foreignId('id_roles')->nullable(false)->reference('id')->on('roles')
                ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 300)->nullable(false);
            $table->integer('identificacion')->unique()->nullable(false);
            $table->enum('identificacion_iso', ['E', 'V', 'P']);
            $table->json('telefonos');
            $table->longText('direcciones');
            $table->enum('genero', ['F', 'M']);
            $table->string('parroquia', 300)->nullable(false);

            $table->foreignId('id_parroquia')->nullable(false)->reference('id')->on('parroquias')
                ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::create('reuniones', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha')->nullable(false);
            $table->string('nombre', 300)->nullable(false);
            $table->longText('descripcion');

            $table->foreignId('id_parroquia')->nullable(false)->reference('id')->on('parroquias')
                ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::create('asistencias', function (Blueprint $table) {
            $table->foreignId('id_cliente')->nullable(false)->reference('id')->on('clientes')
                ->onDelete('restrict')->onUpdate('cascade');

            $table->foreignId('id_reunion')->nullable(false)->reference('id')->on('reuniones')
                ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::create('parroquias', function (Blueprint $table) {
            $table->id();
            $table->string('parroquia')->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('reuniones');
        Schema::dropIfExists('asistencias');
        Schema::dropIfExists('parroquias');

    }
}
