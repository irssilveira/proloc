<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frete', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->string('latitude_abertura',100);
            $table->string('longitude_abertura',100);
            $table->string('mapa_abertura',150);
            $table->string('contrato');
            $table->integer('km_inicial');
            $table->string('cliente',150);
            $table->string('telefone',19);
            $table->string('latitude_cliente',100);
            $table->string('longitude_cliente',100);
            $table->string('mapa_cliente',150);
            $table->integer('km_cliente');
            $table->string('observacao',250);
            $table->string('latitude_saida_cliente',100);
            $table->string('longitude_saida_cliente',100);
            $table->string('mapa_cliente_saida',150);
            $table->integer('km_cliente_saida');
            $table->string('observacao_saida',250);
            $table->string('latitude_fechamaento',100);
            $table->string('longitude_fechamento',100);
            $table->string('mapa_fechamento',150);
            $table->integer('km_fechamento');
            $table->string('observacao_fechamento',250);


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
        Schema::dropIfExists('frete');
    }
}
