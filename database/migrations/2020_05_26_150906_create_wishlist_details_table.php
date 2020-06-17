<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_details', function (Blueprint $table) {
            $table->integer('wishlist_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('wishlist_id')->references('id')->on('wishlists');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlist_details');
    }
}
