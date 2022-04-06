<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesProject extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipodocumentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('objetivos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('nivel_id');

            $table->foreign('nivel_id')
                ->references('id')
                ->on('nivels')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('nivelconocimientos', function (Blueprint $table) {
            $table->id();
            $table->string('conocimientoBasico');
            $table->string('conocimiento');
            $table->string('participacionProcedimental');
            $table->string('valoracion');
            $table->unsignedBigInteger('nivel_id');

            $table->foreign('nivel_id')
                ->references('id')
                ->on('nivels')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('conocimineto');
            $table->string('procedimentales');
            $table->string('estudiantiles');
            $table->unsignedBigInteger('tipoDocumento_id');

            $table->foreign('tipoDocumento_id')
                ->references('id')
                ->on('tipodocumentos')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('nivel_id');
            $table->unsignedBigInteger('tipoDocumento_id');
    $table->string('ruta')->default('no_pdf.pdf');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('tipoDocumento_id')
                ->references('id')
                ->on('tipodocumentos')
                ->onDelete('cascade');
                $table->foreign('nivel_id')
                ->references('id')
                ->on('nivels')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('objetivo_id');
            $table->string('otrosObjetivos');
            $table->string('nivelEsperado');
            $table->string('nivelAlcanzado');
            $table->string('tarea');
            $table->string('area');
            $table->string('numeroSemana');
            $table->string('responsable');

            $table->foreign('documento_id')
                ->references('id')
                ->on('documentos')
                ->onDelete('cascade');
            $table->foreign('objetivo_id')
                ->references('id')
                ->on('objetivos')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('asigEstuEmp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');
                $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipodocumentos');
        Schema::dropIfExists('objetivos');
        Schema::dropIfExists('nivelconocimientos');
        Schema::dropIfExists('footers');
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('detalles');
        
        Schema::dropIfExists('asigEstuEmp');
    }
}
