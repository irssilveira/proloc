<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_social',200);
            $table->string('nome_fantasia',250)->default('N');
            $table->string('cnpj_cpf',50);
            $table->string('inscricao_estadual',20);
            $table->string('cep',16)->default('N');
            $table->string('rua',200);
            $table->string('bairro',200);
            $table->string('cidade',200);
            $table->string('uf',2);
            $table->string('numero',10);
            $table->string('referencia',300);
            $table->decimal('limite',14,2);
            $table->string('forma_pagamento',8);
            $table->text('observacao');
            $table->date('data_nascimento')->nullable();
            $table->char('franqueado',1)->default('N');
            $table->string('unidade_franqueado',70)->default('N');
            $table->string('cep_correspondencia',15)->default('N');
            $table->string('endereco_correspondencia',150)->default('N');
            $table->string('bairro_correspondencia',150)->default('N');
            $table->string('cidade_correspondencia',150)->default('N');
            $table->string('estado_correspondencia',150)->default('N');
            $table->string('referencia_correspondencia',150)->default('N');
            $table->date('data_limite_credito');
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
        Schema::dropIfExists('cliente');
    }
}
