<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');       
            $table->string('gerente');       
            $table->timestamps();
        });

        Schema::create('nivels', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');       
            $table->timestamps();
        });


        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->string('name_f');
            $table->string('name_s');
            $table->string('apellido_f');
            $table->string('apellido_s');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cedula');
            $table->unsignedBigInteger('nivel_id');

            $table->foreign('nivel_id')
                ->references('id')
                ->on('nivels')
                ->onDelete('cascade');

            $table->unsignedBigInteger('empresa_id');

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('empresas');
        Schema::dropIfExists('nivels');
        Schema::dropIfExists('users');
    }
}
