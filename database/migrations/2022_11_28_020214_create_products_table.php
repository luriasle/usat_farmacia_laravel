<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string("descripcion");
            $table->decimal("stock", 8,4);
            $table->decimal("costo", 8, 4);
            $table->decimal("precio_venta", 8, 4);
            $table->string("registro_sanitario");
            $table->date("fecha_vencimiento");
            $table->boolean("estado");

            $table->unsignedBigInteger('presentation_id');
            $table->foreign("presentation_id")
                ->references("id")
                ->on("presentations")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->unsignedBigInteger('laboratory_id');
            $table->foreign("laboratory_id")
                ->references("id")
                ->on("laboratories")
                ->onDelete("cascade")
                ->onUpdate("cascade");

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
        Schema::dropIfExists('products');
    }
}
