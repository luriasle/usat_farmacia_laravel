<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->string("serie");
            $table->string("numero");
            $table->decimal("sub_total", 8, 4);
            $table->decimal("total", 8, 4);
            $table->decimal("igv", 8, 4);
            $table->boolean("estado");

            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id")
                ->references("id")
                ->on("customers")
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
        Schema::dropIfExists('sales');
    }
}
