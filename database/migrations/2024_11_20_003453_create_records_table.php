<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCompleto');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('gradoEstudios')->nullable();
            $table->string('institucion');
            $table->string('departamento')->nullable();
            $table->string('direccionInstitucion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('tipoInstitucion');
            $table->string('telefonoOficina')->nullable();
            $table->string('celular')->nullable();
            $table->string('emailInstitucional')->nullable();
            $table->string('emailPersonal')->nullable();
            $table->string('lineaInvestigacion')->nullable();
            $table->string('nivelEducativo')->nullable();
            $table->string('usuario');
            $table->string('correo');
            $table->string('contrasena');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('records');
    }
};
