<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->timestamps();

            $table->string('name')->default('001');
            $table->integer('price')->default(0);
            $table->integer('reg_price')->default(0);

            $table->text('description')->nullable();
            $table->unsignedInteger('quantity')->default(10);
            $table->boolean('featured')->default(false);
            $table->enum('stock_status',['instock','outofstock']);
            $table->mediumText('image')->nullable();
            // $table->mediumText('image1')->nullable();
            // $table->mediumText('image2')->nullable();

            $table->string('category')->default('001');


         $table->bigInteger('category_id')->unsigned()->nullable();
         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
};
