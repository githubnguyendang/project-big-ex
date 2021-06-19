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
            $table->increments('pro_id');
            $table->Integer('pro_cate')->unsigned();
            $table->foreign('pro_cate')
                ->references('cate_id')
                ->on('category')
                ->onDelete('cascade');
            $table->string('pro_name');
            $table->string('pro_thumbnail');
            $table->string('pro_decrition');
            $table->Integer('pro_images');
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
