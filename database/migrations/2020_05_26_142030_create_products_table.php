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
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('more_image')->nullable();
            $table->string('frame');
            $table->string('rims');
            $table->string('tires');
            $table->string('weight');
            $table->string('weight_limit');
            $table->decimal('price', 12, 2);
            $table->integer('promotion')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('category_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('home_flag')->default(1);
            $table->tinyInteger('hot_flag')->default(1);
            $table->integer('view_count')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
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
