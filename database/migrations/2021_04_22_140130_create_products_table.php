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
            $table->integer('store_id');
            $table->integer('category_id');
            $table->string('category_name');
            $table->integer('prod_id');
            $table->string('prod_name');
            $table->string('prod_img');
            $table->double('prod_price', 8, 2);
            $table->string('prod_unit');
            $table->string('prod_desc');
            $table->string('prod_stock');
            $table->integer('prod_sales');
            $table->integer('prod_avail');
            $table->integer('prod_favorite');
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
