<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsBookedToMyCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_cars', function (Blueprint $table) {
            $table->boolean('is_booked')->default(false)->nullable();      

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_cars', function (Blueprint $table) {
            $table->dropColumn('is_booked');
        });
    }
}
