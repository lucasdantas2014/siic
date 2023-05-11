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
        Schema::create('problemas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->dateTime('data_resolvido')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('sala_id');
            $table->foreignId('tecnico_id')->nullable();
            $table->integer('status');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('sala_id')
                ->references('id')
                ->on('salas');

            $table->foreign('tecnico_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('problemas');
    }
};
