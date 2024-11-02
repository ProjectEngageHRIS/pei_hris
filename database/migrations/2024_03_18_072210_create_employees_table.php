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
        Schema::create('employees', function (Blueprint $table) {
                $table->string('employee_id')->primary();
                $table->string('first_name', 500);
                $table->string('middle_name', 500);
                $table->string('last_name', 500);
                $table->string('nickname', 500)->nullable();
                $table->string('department', 500)->nullable();
                $table->string('inside_department', 500)->nullable();
                $table->string('employee_type',  500);
                $table->string('position',  500);
                $table->text('home_address');
                $table->text('provincial_address')->nullable();
                $table->string('phone_number', 500);
                $table->string('landline_number', 500)->nullable();
                $table->string('employee_email', 500)->nullable();
                $table->string('gender', 500)->default('Female');
                $table->string('current_position');
                $table->text('profile_summary')->nullable();
                $table->string('high_school_school', 500)->nullable();
                // $table->string('high_school_course', 500);
                $table->string('high_school_date_graduated', 500)->nullable();
                $table->string('college_school', 500)->nullable();
                $table->string('college_course', 500)->nullable();
                $table->string('college_date_graduated', 500)->nullable();
                $table->string('vocational_school', 500)->nullable();
                $table->string('vocational_course', 500)->nullable();
                $table->string('vocational_date_graduated', 500)->nullable();
                $table->json('performance')->nullable();
                $table->string('govt_professional_exam_taken')->nullable();
                $table->decimal('govt_professional_exam_taken_rating', 3, 2)->nullable();
                $table->json('trainings_seminars')->nullable();
                $table->decimal('age');
                $table->date('birth_date');
                $table->string('religion', 500);
                $table->string('birth_place', 500);
                $table->string('civil_status', 500);
                $table->string('name_of_mother', 500);
                $table->string('name_of_father', 500);
                $table->string('spouse', 500)->nullable();
                $table->longText('names_of_children')->nullable();
                $table->text('sss_num')->nullable();
                $table->text('tin_num')->nullable();
                $table->text('phic_num')->nullable();
                $table->text('hdmf_num')->nullable();
                $table->json('emergency_contact')->nullable();
                $table->string('emp_image')->nullable();
                $table->json('employee_history')->nullable();
                $table->string('files_link')->nullable();
                $table->string('files')->nullable();
                $table->date('start_of_employment');
                $table->date('end_of_employment')->nullable();
                $table->decimal('vacation_credits')->nullable();
                $table->decimal('sick_credits')->nullable();
                $table->string('payroll_status', 500)->nullable();
                $table->boolean('active')->default(1);
                $table->string('personal_email', 500)->nullable();
            // $table->string('address');

            // $table->integer('study_available_units')->nullable();
            // $table->integer('teach_available_units')->nullable();
            // $table->boolean('is_faculty');                         
            // $table->decimal('salary', 10, 2);
            // $table->decimal('cto', 8, 2);
            // $table->json('college_id')->nullable();
            // $table->json('department_id')->nullable();
            // $table->json('is_college_head')->nullable();
            // $table->json('is_department_head')->nullable();
            // $table->string('phone');


            // $table->binary('emp_image')->nullable();
            // $table->boolean('emp_diploma')->nullable();
            // $table->boolean('emp_tor')->nullable();
            // $table->boolean('emp_cert_of_trainings_seminars')->nullable();
            // $table->boolean('emp_auth_copy_of_csc_or_prc')->nullable();
            // $table->boolean('emp_auth_copy_of_prc_board_rating')->nullable();
            // $table->boolean('emp_med_certif')->nullable(); 
            // $table->boolean('emp_nbi_clearance')->nullable();
            // $table->boolean('emp_psa_birth_certif')->nullable();
            // $table->boolean('emp_psa_marriage_certif')->nullable();
            // $table->boolean('emp_service_record_from_other_govt_agency')->nullable();
            // $table->boolean('emp_approved_clearance_prev_employer')->nullable();
            // $table->boolean('other_documents')->nullable();

            // Account Creation


            // $table->integer('employee_role');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
