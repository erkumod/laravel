<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender_id')->nullable()->default(null);
            $table->unsignedInteger('receiver_id')->nullable()->default(null);
            $table->unsignedInteger('booking_id')->nullable()->default(null);
            $table->string('flag')->nullable()->default(null);
            $table->text('message')->nullable()->default(null);
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
        Schema::dropIfExists('booking_chats');
    }
}
