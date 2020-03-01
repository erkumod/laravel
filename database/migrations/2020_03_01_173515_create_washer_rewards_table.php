<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWasherRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('washer_rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name')->nullable()->default(null);
            $table->dateTime('date')->nullable()->default(null);
            $table->string('delivery_time')->nullable()->default(null);
            $table->string('postal_code')->nullable()->default(null);
            $table->string('unit_number')->nullable()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->longText('reply_message')->nullable()->default(null);
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
        Schema::dropIfExists('washer_rewards');
    }
}
