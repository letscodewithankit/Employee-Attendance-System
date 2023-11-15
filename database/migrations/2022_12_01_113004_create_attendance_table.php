<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->integer('day');
            $table->integer('month_id');
            $table->integer('year_id');
            $table->integer('employee_id');
            $table->integer('atten_detail_id');
            $table->string('status');
            $table->timestamps();
            $table->foreign('month_id')->references('id')->on('month')->cascadeOnDelete();
            $table->foreign('year_id')->references('id')->on('year')->cascadeOnDelete();
            $table->foreign('employee_id')->references('id')->on('employee')->cascadeOnDelete();
            $table->foreign('atten_detail_id')->references('id')->on('attendance_details')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};
