<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentStatusToCarWashBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_wash_bookings', function (Blueprint $table) {
            $table->string('payment_status')->nullable()->default(null);
            $table->string('charge_id')->nullable()->default(null);
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
            $table->dropColumn('payment_status');
            $table->dropColumn('charge_id');
        });
    }
}
