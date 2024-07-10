<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('onboardings', function (Blueprint $table) {
            $table->id();
            // $table->string('employee_id')->primary();
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->string('nickname', 20)->nullable();
            $table->string('department', 50)->nullable();
            $table->string('home_address');
            $table->string('provincial_address')->nullable();
            $table->tinyText('phone_number', 20);
            $table->string('landline_number', 30)->nullable();
            $table->string('employee_email', 100)->nullable();
            $table->string('gender', 20)->default('Female');
            $table->string('current_position');
            $table->text('profile_summary')->nullable();
            $table->string('high_school_school', 100);
            $table->string('high_school_course', 100);
            $table->string('high_school_date_graduated', 100);
            $table->string('college_school', 100);
            $table->string('college_course', 100);
            $table->string('college_date_graduated', 100);
            $table->string('vocational_school', 100)->nullable();
            $table->string('vocational_course', 100)->nullable();
            $table->string('vocational_date_graduated', 100)->nullable();
            $table->json('performance', 100)->nullable();
            $table->string('govt_professional_exam_taken')->nullable();
            $table->decimal('govt_professional_exam_taken_rating', 3, 2)->nullable();
            $table->json('trainings_seminars')->nullable();
            $table->decimal('age');
            $table->date('birth_date');
            $table->string('religion', 30);
            $table->string('birth_place', 100);
            $table->float('height', 8, 2); // Example precision and scale
            $table->float('weight', 8, 2); // Example precision and scale
            $table->string('civil_status', 20);
            $table->string('name_of_mother', 255);
            $table->string('name_of_father', 255);
            $table->string('spouse', 255)->nullable();
            $table->json('names_of_children')->nullable();
            $table->string('sss_num', 100)->nullable();
            $table->string('tin_num', 100)->nullable();
            $table->string('phic_num', 100)->nullable();
            $table->string('hdmf_num', 100)->nullable();
            $table->json('emergency_contact')->nullable();
            $table->string('emp_image')->nullable();
            $table->json('employee_history')->nullable();
            $table->string('files')->nullable();
            $table->date('start_of_employment');
            $table->date('end_of_employment')->nullable();
            $table->decimal('vacation_credits')->nullable();
            $table->decimal('sick_credits')->nullable();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboardings');
    }
};
