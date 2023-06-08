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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coche_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->double("precio_total");
            $table->enum("estado",["pendiente","pagado"]);
            $table->foreign('coche_id')
                ->references('id')
                ->on('coches');
            $table->foreign('user_id')
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
        Schema::dropIfExists('reservas');
    }
};
