<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('service_img');
            $table->longtext('service_short_des');
            $table->string('no_of_pices')->nullable();
            $table->string('actualWeight')->nullable();
            $table->string('service_price');
            $table->string('service_offer')->nullable();
            $table->string('available_city');
            $table->integer('service_cate_id');
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('food_services');
    }
}
