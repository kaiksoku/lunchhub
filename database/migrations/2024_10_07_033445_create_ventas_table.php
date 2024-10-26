<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('ven_id'); // id autoincremental
            $table->string('vent_condigo'); // código de la factura
            $table->json('vent_productos'); // ID de productos seleccionados (almacenados como JSON)
            $table->foreignId('vent_usuario')->constrained('users'); // Relación con la tabla 'users'
            $table->date('vent_fecha'); // Fecha de creación
            $table->time('vent_hora'); // Hora de creación
            $table->timestamps(); // Incluye campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}

