<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class ChangeUserIdTypeToNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `notifications` CHANGE `user_id` `user_id` BIGINT UNSIGNED NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `user_notifications` CHANGE `user_id` `user_id` BIGINT UNSIGNED NULL DEFAULT NULL, CHANGE `notification_id` `notification_id` BIGINT UNSIGNED NULL DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `notifications` CHANGE `user_id` `user_id` VARCHAR(255) NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `user_notifications` CHANGE `user_id` `user_id` VARCHAR(255) NULL DEFAULT NULL, CHANGE `notification_id` `notification_id` VARCHAR(255) NULL DEFAULT NULL');
    }
}
