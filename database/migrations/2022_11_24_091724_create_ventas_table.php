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
            $table->id();
            $table->string("serie");
            $table->string("numero");
            $table->decimal("sub_total", 8, 4);
            $table->decimal("total", 8, 4);
            $table->decimal("igv", 8, 4);
            $table->boolean("estado");
            $table->unsignedBigInteger('id_cliente');
            $table->foreign("id_cliente")
                ->references("id")
                ->on("clientes")
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
        Schema::dropIfExists('ventas');
    }
}
