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
        Schema::create('extra_reserva', function (Blueprint $table) {
            $table->primary(['reserva_id', 'extra_id']);
            $table->bigInteger('reserva_id')->unsigned();
            $table->bigInteger('extra_id')->unsigned();
            $table->foreign('reserva_id')
                ->references('id')
                ->on('reservas')->onDelete('cascade');
            $table->foreign('extra_id')
                ->references('id')
                ->on('extras');
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
        Schema::dropIfExists('reservas_extras');
    }
};
