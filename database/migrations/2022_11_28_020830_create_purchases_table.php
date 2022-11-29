<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->string("numero");
            $table->decimal("sub_total", 8, 4);
            $table->decimal("total", 8, 4);
            $table->decimal("igv", 8, 4);
            $table->boolean("estado");

            $table->unsignedBigInteger("provider_id");
            $table->foreign("provider_id")
                ->references("id")
                ->on("providers")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->unsignedBigInteger('employee_id');
            $table->foreign("employee_id")
                ->references("id")
                ->on("employees")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->unsignedBigInteger('voucher_type_id');
            $table->foreign("voucher_type_id")
                ->references("id")
                ->on("voucher_types")
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
        Schema::dropIfExists('purchases');
    }
}
