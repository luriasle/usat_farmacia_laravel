<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();

            $table->integer("cantidad");
            $table->decimal("costo", 8, 4);
            $table->decimal("importe", 8, 4);

            $table->unsignedBigInteger("purchase_id");
            $table->foreign("purchase_id")
                ->references("id")
                ->on("purchases")
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
        Schema::dropIfExists('purchase_details');
    }
}
