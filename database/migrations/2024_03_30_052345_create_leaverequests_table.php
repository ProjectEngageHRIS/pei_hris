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
        Schema::create('leaverequests', function (Blueprint $table) {
            $table->bigIncrements('form_id');
            $table->uuid('uuid')->unique();
            $table->string('employee_id');
            $table->string('status')->default('reviewing');
            $table->string('supervisor_email', 100)->nullable();
            $table->date('application_date')->default(now());
            $table->string('mode_of_application', 20)->nullable();
            $table->dateTime('inclusive_start_date')->nullable();
            $table->dateTime('inclusive_end_date')->nullable();
            $table->string('full_or_half', 20)->nullable();
            $table->string('deduct_to', 20)->nullable();
            $table->decimal('num_of_days_work_days_applied')->nullable();
            $table->date('date_earned')->nullable();
            $table->text('earned_description')->nullable();
            $table->text('purpose_type')->nullable();
            $table->text('reason');
            $table->boolean('approved_by_hr')->nullable();
            $table->boolean('approved_by_president')->nullable();
            $table->dateTime('cancelled_at')->nullable();

            // Not Needed 
            // Details of application
            // $table->string('type_of_leave');
            // $table->string('type_of_leave_others')->default('Not Applicable')->nullable();
            // $table->string('type_of_leave_sub_category');
            // $table->string('type_of_leave_description')->default('Not Applicable')->nullable();

            // $table->string('commutation');
            // $table->longText('commutation_signature_of_appli')->charset('binary');

            // // Approve Requests
            // $table->string('office_department');
            // $table->decimal('total_earned_vaca', 10, 2)->nullable();
            // $table->decimal('less_this_appli_vaca', 10, 2)->nullable();
            // $table->decimal('balance_vaca', 10, 2)->nullable();
            // $table->decimal('total_earned_sick', 10, 2)->nullable();
            // $table->decimal('less_this_appli_sick', 10, 2)->nullable();
            // $table->decimal('balance_sick', 10, 2)->nullable();
            // $table->date('as_of_filling')->nullable();
            // $table->string('status_description')->nullable();
            // $table->string('days_with_pay')->nullable();
            // $table->string('days_without_pay')->nullable();
            // $table->string('others')->nullable();
            // $table->binary('auth_off_sig_b')->nullable();
            // $table->boolean('department_head_verdict')->nullable();
            // $table->string('head_disapprove_reason')->nullable();
            // $table->boolean('human_resource_verdict_a')->nullable();
            // $table->binary('auth_off_sig_a')->nullable();
            // $table->string('hr_a_disapprove_reason')->nullable();
            // $table->boolean('human_resource_verdict_cd')->nullable();
            // $table->string('hr_cd_disapprove_reason')->nullable();
            // $table->binary('auth_off_sig_c_and_d')->nullable();
            // $table->longText('leave_form')->charset('binary')->nullable();
            // $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaverequests');
    }
};
