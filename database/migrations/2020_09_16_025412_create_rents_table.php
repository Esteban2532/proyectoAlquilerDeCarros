<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_salida');
            $table->date('fecha_regreso');
            $table->integer('documento');
            $table->string('nombre');
            $table->string('email');
            $table->string('medio_pago');
            $table->decimal('total', 11, 2);
            $table->integer('id_vehiculo')->unsigned();


            $table->timestamps();
            $table->foreign('id_vehiculo')->references('id')->on('vehicles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquilers');
    }
}
