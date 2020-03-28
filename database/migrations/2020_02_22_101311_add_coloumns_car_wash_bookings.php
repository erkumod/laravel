<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnsCarWashBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_wash_bookings', function (Blueprint $table) {
            $table->string('user_name')->nullable();
            $table->string('model_name')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->string('model_img')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('brand_img')->nullable();
            $table->string('car_image')->nullable();
            $table->string('color_code')->nullable();
            $table->string('color_name')->nullable();
            $table->text('model_desc')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_wash_bookings', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('model_name');
            $table->dropColumn('brand_id');
            $table->dropColumn('model_img');
            $table->dropColumn('brand_name');
            $table->dropColumn('vehicle_no');
            $table->dropColumn('brand_img');
            $table->dropColumn('car_image');
            $table->dropColumn('color_code');
            $table->dropColumn('color_name');
            $table->dropColumn('model_desc');
            $table->dropColumn('type');
        });
    }
}
