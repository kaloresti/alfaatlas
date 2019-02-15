<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('incricao_estatudal');
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('nome_responsavel');
            $table->string('email_principal');
            $table->string('telefone');
            $table->string('celular');
            $table->string('cep');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('estado');
            $table->string('pais');
            $table->string('logradouro');
            $table->string('numero');
            $table->boolean('status');
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
        Schema::dropIfExists('clients');
    }
}
