<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPromoFieldsToCarWashBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_wash_bookings', function (Blueprint $table) {
            $table->dateTime('wash_completed_date')->nullable()->default(null);
            $table->string('booking_promp')->nullable()->default(null);
            $table->string('booking_complete_image1')->nullable()->default(null);
            $table->string('booking_complete_image2')->nullable()->default(null);
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
            $table->dropColumn('wash_completed_date');
            $table->dropColumn('booking_promp');
            $table->dropColumn('booking_complete_image1');
            $table->dropColumn('booking_complete_image2');
        });
    }
}
