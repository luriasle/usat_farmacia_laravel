<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();

            $table->integer("cantidad");
            $table->decimal("costo", 8, 4);
            $table->decimal("precio", 8, 4);
            $table->decimal("importe", 8, 4);

            $table->unsignedBigInteger("sale_id");
            $table->foreign("sale_id")
                ->references("id")
                ->on("sales")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->unsignedBigInteger('product_id');
            $table->foreign("product_id")
                ->references("id")
                ->on("products")
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
        Schema::dropIfExists('sale_details');
    }
}
