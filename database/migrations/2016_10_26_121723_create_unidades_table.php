<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_id')->unsigned();
            $table->integer('cidade_id')->unsigned();
            $table->string('nome', 150);
            $table->string('razao_social', 150);
            $table->string('cnpj', 30);
            $table->string('endereco', 100);
            $table->string('bairro', 70);
            $table->string('cep', 20);
            $table->string('telefone', 30);
            $table->string('celular', 30);
            $table->string('whatsapp', 30);
            $table->string('email', 100);
            $table->integer('tipo_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('cidade_id')->references('id')->on('cidade');
            $table->foreign('tipo_id')->references('id')->on('tipofranquia');
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
        Schema::dropIfExists('unidades');
    }
}
