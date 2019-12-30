<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addfieldstowasherdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('washer_details', function (Blueprint $table) {
            $table->string('requester_name')->nullable();
            $table->string('requester_email')->nullable();
            $table->string('requester_dob')->nullable();
            $table->string('requester_mobile')->nullable();
            $table->string('requester_front_pic')->nullable();
            $table->string('requester_back_pic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('washer_details', function (Blueprint $table) {
            //
        });
    }
}
