<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimestampsTable extends Migration
{
    public function up()
    {
        Schema::create('timestamps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->timestamp('work_start_time')->nullable();
            $table->timestamp('work_end_time')->nullable();
            $table->timestamp('break_start_time')->nullable();
            $table->timestamp('break_end_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timestamps');
    }
}
