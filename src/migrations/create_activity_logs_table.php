<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->text('description');
            $table->string('ip', 64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('activity_logs');
    }
}