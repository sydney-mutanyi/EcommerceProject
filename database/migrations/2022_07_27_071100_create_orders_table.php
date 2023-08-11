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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('user_id')->nullable();
            $table->string('name')->nullable(

            );
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('contact')->nullable();
            $table->integer('subtotal')->default(0);
            $table->integer('total')->default(0);
            $table->integer('transport')->default(0);
            $table->string('xy')->nullable();
            $table->date('deliverery_date')->nullable();

            $table->string('town')->nullable();
            $table->string('phone')->nullable();
            $table->string('lname')->nullable();
            $table->string('nationality')->nullable()->default('Kenya');


            $table->enum('status',['ordered','approved','delivered','cancelled'])->default('ordered');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
