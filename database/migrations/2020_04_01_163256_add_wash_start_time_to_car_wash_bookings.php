<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWashStartTimeToCarWashBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_wash_bookings', function (Blueprint $table) {
            $table->timestamp('wash_start_time')->default(null)->nullable();
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
            $table->dropColumn('wash_start_time');            
        });
    }
}
