<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMytransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mytransactions', function (Blueprint $table) {
            $table->id();
            $table->integer("acc_id");
            $table->integer("store_id");
            $table->integer("prod_id");
            $table->integer("prod_qty");
            $table->string("transaction_status");
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
        Schema::dropIfExists('mytransactions');
    }
}
