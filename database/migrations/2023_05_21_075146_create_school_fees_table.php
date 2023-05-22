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
        Schema::create('school_fees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('k1')->nullable();
            $table->string('k2')->nullable();
            $table->string('g1')->nullable();
            $table->string('g2')->nullable();
            $table->string('g3')->nullable();
            $table->string('g4')->nullable();
            $table->string('g5')->nullable();
            $table->string('g6')->nullable();
            $table->string('g7')->nullable();
            $table->string('g8')->nullable();
            $table->string('g9')->nullable();
            $table->string('g10')->nullable();
            $table->string('g11')->nullable();
            $table->string('g12')->nullable();
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
        Schema::dropIfExists('school_fees');
    }
};
