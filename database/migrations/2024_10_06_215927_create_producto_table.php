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
            $table->id('ven_id'); // ID autoincremental
            $table->string('vent_codigo'); // Código de la factura
            
            // Definir columna para clave foránea 'usuarios'
            $table->unsignedBigInteger('vent_usuario'); // Campo para la clave foránea usuarios
            // Definir la clave foránea de manera explícita para 'usuarios'
            $table->foreign('vent_usuario', 'fk_ventas_usuarios')
                  ->references('id')->on('users')

            // Definir columna para clave foránea 'productos' (si necesitas almacenar más que solo JSON)
            $table->unsignedBigInteger('vent_producto_id'); // Campo para la clave foránea productos
            // Definir la clave foránea de manera explícita para 'productos'
            $table->foreign('vent_producto_id', 'fk_ventas_productos')
                  ->references('prod_id')->on('producto')
                
            $table->date('vent_fecha'); // Fecha de la venta
            $table->time('vent_hora'); // Hora de la venta
            $table->timestamps(); // Campos created_at y updated_at
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

