<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCancleDataToCarWashBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_wash_bookings', function (Blueprint $table) {
            $table->string('cancle_message')->nullable()->default(null);
            $table->string('cancle_image')->nullable()->default(null);
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
             $table->dropColumn('cancle_message');
            $table->dropColumn('cancle_image');
        });
    }
}
