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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('grade_7')->nullable();
            $table->string('grade_11')->nullable();
            $table->string('scholarship')->nullable();
            $table->string('stem')->nullable();
            $table->string('gas')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('age')->nullable();
            $table->string('last_school_attended')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('facebook')->nullable();
            $table->string('address')->nullable();
            $table->string('academic_awards')->nullable();
            $table->string('academic_average')->nullable();
            $table->string('english_grades')->nullable();
            $table->string('math_grades')->nullable();
            $table->string('science_grades')->nullable();
            $table->string('filipino_grades')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('fathers_occupation')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_occupation')->nullable();
            $table->string('guardians_name')->nullable();
            $table->string('guardians_occupation')->nullable();
            $table->string('parents_contact_no')->nullable();
            $table->string('parents_email')->nullable();
            $table->string('parents_facebook')->nullable();
            $table->string('is_paid')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
