<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFaqVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_faq_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->bigInteger('question_id')->nullable()->default(0);
            $table->boolean('upvote')->nullable()->default(false);
            $table->boolean('downvote')->nullable()->default(false);
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
        Schema::dropIfExists('user_faq_votes');        
    }
}
