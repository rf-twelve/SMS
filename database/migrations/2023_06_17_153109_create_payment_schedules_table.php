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
        Schema::create('payment_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('package')->nullable();
            $table->string('description')->nullable();
            $table->string('level_from')->nullable();
            $table->string('level_to')->nullable();
            $table->string('pre_school')->nullable();
            $table->string('grade_school')->nullable();
            $table->string('junior_hs')->nullable();
            $table->string('senior_hs')->nullable();
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
        Schema::dropIfExists('payment_schedules');
    }
};
