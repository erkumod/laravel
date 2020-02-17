<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorNameMyCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_cars', function (Blueprint $table) {
            $table->string('color_name')->nullable()->default(null);
            $table->string('color_code')->nullable()->default(null);
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
            $table->dropColumn('color_name');
            // $table->dropColumn('color_code');
        });
    }
}
