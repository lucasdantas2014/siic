<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->foreignId('user_id');
            $table->foreignId('chave_id');
            $table->string('outros_materiais')->nullable();
            $table->string('observacoes')->nullable();
            $table->dateTime('devolvido_em')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('chave_id')
                ->references('id')
                ->on('chaves');

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
        Schema::dropIfExists('pedidos');
    }
};
